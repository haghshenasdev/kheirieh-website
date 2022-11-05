<?php

use function PHPUnit\Framework\isNull;

defined('BASEPATH') or exit('No direct script access allowed');

class UsersSystem
{
	private $ci;
	public $route_main;
	protected $baseurl;
	public $route_account;
	public $route_login;
	public $route_registration;
	public $route_logout;

	public $isUserLoggedIn;

	public function __construct($params = ['users'])
	{
		$this->ci = &get_instance();
		// Load form validation ibrary & user model 
		$this->ci->load->library(['form_validation']);
		$this->ci->load->model('user');
		$this->ci->load->helper(array('form', 'cookie'));

		//config routs
		$this->route_main = $params[0];
		$this->baseurl = base_url("index.php/$this->route_main/");
		$this->route_account = $this->baseurl . "account";
		$this->route_login  = $this->baseurl . 'login';
		$this->route_registration  = $this->baseurl . 'registration';
		$this->route_logout  = $this->baseurl . 'logout';

		// User login status 
		$this->ci->isUserLoggedIn = $this->ci->session->userdata('isUserLoggedIn');
	}

	public function account()
	{
		$data = $userData = array();

		// If registration request is submitted 
		if ($this->ci->input->post('updateSubmit')) {
			$this->ci->form_validation->set_rules('phone', 'تلفن', 'required|numeric|min_length[9]|regex_match[/^09[0-9]{9}$/]');

			if ($data['user']['email'] != $this->ci->input->post('email')) {
				$this->ci->form_validation->set_rules('email', 'ایمیل', 'valid_email|is_unique[users.email]');
			}
			if ($data['user']['phone'] != $this->ci->input->post('phone')) {
				$this->ci->form_validation->set_rules('phone', 'تلفن', 'is_unique[users.phone]');
			}

			$this->ci->form_validation->set_rules('name', 'نام و نام خانوادگی', 'required');
			$this->ci->form_validation->set_rules('adres', 'آدرس', 'min_length[10]|max_length[250]');
			$this->ci->form_validation->set_rules('old_password', 'رمز عبور', 'required');

			$userData = array(
				'name' => strip_tags($this->ci->input->post('name')),
				'adres' => strip_tags($this->ci->input->post('adres')),
				'email' => strip_tags($this->ci->input->post('email')),
				'phone' => strip_tags($this->ci->input->post('phone'))
			);
			if ($this->ci->input->post('password') != '') {
				$this->ci->form_validation->set_rules('password', 'رمز عبور', 'required');
				$this->ci->form_validation->set_rules('conf_password', 'تکرار رمز عبور', 'required|matches[password]');
				$userData['password'] = md5($this->ci->input->post('password'));
			}

			if ($this->ci->form_validation->run() == true) {
				$id = $this->ci->session->userdata('userId');
				$con = array(
					'returnType' => 'single',
					'conditions' => array(
						'id' => $id,
						'password' => md5($this->ci->input->post('old_password')),
						'status' => 1
					)
				);
				$checkLogin = $this->ci->user->getRows($con);
				if ($checkLogin) {
					$update = $this->ci->user->update(
						$id,
						$userData
					);
					if ($update) {
						$data['success_msg'] = 'اطلاعات بروز رسانی شد';
					} else {
						$data['error_msg'] = 'مشکلی پیش آمد لطفا مجددا تلاش کنید.';
					}
				} else {
					$data['error_msg'] = 'رمز عبور قدیمی درست نیست!';
				}
			} else {
				$data['error_msg'] = 'لطفا همه قسمت های الزامی را پر کنید.';
			}
		}

		$data['user'] = $this->get_logined_user_data();

		return $data;
	}

	public function login()
	{
		$data = array();

		// Get messages from the session 
		if ($this->ci->session->userdata('success_msg')) {
			$data['success_msg'] = $this->ci->session->userdata('success_msg');
			$this->ci->session->unset_userdata('success_msg');
		}
		if ($this->ci->session->userdata('error_msg')) {
			$data['error_msg'] = $this->ci->session->userdata('error_msg');
			$this->ci->session->unset_userdata('error_msg');
		}

		// If login request submitted 
		if ($this->ci->input->post('loginSubmit')) {
			//form validation
			$this->login_validation_rules();

			if ($this->ci->form_validation->run() == true) {
				//get user data
				$checkLogin = $this->getDataAndCheck_user_login();
				//check
				if ($checkLogin) {
					$this->start_logined_session($checkLogin);
					header("location: $this->route_account");
				} else {
					$data['error_msg'] = 'تلفن وارد شده یا رمز عبور درست نیست.';
				}
			} else {
				$data['error_msg'] = 'لطفا همه قسمت های الزامی را پر کنید.';
			}
		}

		return $data;
	}

	public function registration()
	{
		$data = $userData = array();

		// If registration request is submitted 
		if ($this->ci->input->post('signupSubmit')) {
			$this->ci->form_validation->set_rules('name', 'نام و نام خانوادگی', 'required');
			$this->ci->form_validation->set_rules('email', 'ایمیل', 'valid_email|is_unique[users.email]');
			$this->ci->form_validation->set_rules('adres', 'آدرس', 'min_length[10]|max_length[250]');
			$this->ci->form_validation->set_rules('phone', 'تلفن', 'required|numeric|min_length[9]|regex_match[/^09[0-9]{9}$/]|is_unique[users.phone]');
			$this->ci->form_validation->set_rules('password', 'رمز عبور', 'required');
			$this->ci->form_validation->set_rules('conf_password', 'تکرار رمز عبور', 'required|matches[password]');

			$userData = array(
				'name' => strip_tags($this->ci->input->post('name')),
				'adres' => strip_tags($this->ci->input->post('adres')),
				'email' => strip_tags($this->ci->input->post('email')),
				'password' => md5($this->ci->input->post('password')),
				'phone' => strip_tags($this->ci->input->post('phone'))
			);

			if ($this->ci->form_validation->run() == true) {
				$insert = $this->ci->user->insert($userData);
				if ($insert) {
					$this->ci->session->set_userdata('success_msg', 'ثبت حساب شما با موفقیت انجام شده. لطفا وارد حساب کاربری خود شوید.');
					//redirect('users/login');
					header("location: $this->route_login");
				} else {
					$data['error_msg'] = 'مشکلی پیش آمد لطفا مجددا تلاش کنید.';
				}
			} else {
				$data['error_msg'] = 'لطفا همه قسمت های الزامی را پر کنید.';
			}
		}

		// Posted data 
		$data['user'] = $userData;

		return $data;
	}

	public function logout($redirectUrl = null)
	{
		$this->ci->session->unset_userdata('isUserLoggedIn');
		$this->ci->session->unset_userdata('userId');
		$this->ci->session->sess_destroy();

		if (is_null($redirectUrl)) {
			$redirectUrl = $this->route_login;
		}
		// redirect('users/login/');
		header("location: " . $redirectUrl);
	}

	// Existing email check during validation 
	public function email_check($str)
	{
		$con = array(
			'returnType' => 'count',
			'conditions' => array(
				'email' => $str
			)
		);
		$checkEmail = $this->ci->user->getRows($con);
		if ($checkEmail > 0) {
			$this->ci->form_validation->set_message('email_check', 'The given email already exists.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function login_validation_rules()
	{
		$this->ci->form_validation->set_rules('phone', 'تلفن', 'required|numeric|min_length[9]|regex_match[/^09[0-9]{9}$/]');
		$this->ci->form_validation->set_rules('password', 'رمز عبور', 'required');
	}

	public function get_login_con_data()
	{
		return array(
			'returnType' => 'single',
			'conditions' => array(
				'phone' => $this->ci->input->post('phone'),
				'password' => md5($this->ci->input->post('password')),
				'status' => 1
			)
		);
	}

	public function start_logined_session($checkLogin)
	{
		$this->ci->session->set_userdata('isUserLoggedIn', TRUE);
		$this->ci->session->set_userdata('userId', $checkLogin['id']);
	}

	public function getDataAndCheck_user_login()
	{
		//get data from post
		$con = $this->get_login_con_data();
		return $this->ci->user->getRows($con);
	}

	public function get_logined_user_data()
	{
		$con = array(
			'id' => $this->ci->session->userdata('userId')
		);
		return $this->ci->user->getRows($con);
	}
}
