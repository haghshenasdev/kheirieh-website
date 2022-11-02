<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// Load form validation ibrary & user model 
		$this->load->library(['form_validation', 'show_menu']);
		$this->load->model('user');
		$this->load->helper(array('form', 'cookie'));
		$this->load->model('db_model');
		// User login status 
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
	}

	public function index()
	{
		if ($this->isUserLoggedIn) {
			header("location: " . base_url('index.php/users/account'));
		} else {
			//redirect('/users/login'); 
			header("location: " . base_url('index.php/users/login'));
		}
	}

	public function account()
	{
		$data = array();
		if ($this->isUserLoggedIn) {

			$data = $userData = array();

			$con = array(
				'id' => $this->session->userdata('userId')
			);
			$data['user'] = $this->user->getRows($con);

			// If registration request is submitted 
			if ($this->input->post('updateSubmit')) {
				$this->form_validation->set_rules('phone', 'تلفن', 'required|numeric|min_length[9]|regex_match[/^09[0-9]{9}$/]');

				if ($data['user']['email'] != $this->input->post('email')) {
					$this->form_validation->set_rules('email', 'ایمیل', 'valid_email|is_unique[users.email]');
				}
				if ($data['user']['phone'] != $this->input->post('phone')) {
					$this->form_validation->set_rules('phone', 'تلفن', 'is_unique[users.phone]');
				}

				$this->form_validation->set_rules('name', 'نام و نام خانوادگی', 'required');
				$this->form_validation->set_rules('adres', 'آدرس', 'min_length[10]|max_length[250]');
				$this->form_validation->set_rules('old_password', 'رمز عبور', 'required');

				$userData = array(
					'name' => strip_tags($this->input->post('name')),
					'adres' => strip_tags($this->input->post('adres')),
					'email' => strip_tags($this->input->post('email')),
					'phone' => strip_tags($this->input->post('phone'))
				);
				if($this->input->post('password') != ''){
					$this->form_validation->set_rules('password', 'رمز عبور', 'required');
					$this->form_validation->set_rules('conf_password', 'تکرار رمز عبور', 'required|matches[password]');
					$userData['password'] = md5($this->input->post('password'));
				}

				if ($this->form_validation->run() == true) {
					$id = $this->session->userdata('userId');
					$con = array(
						'returnType' => 'single',
						'conditions' => array(
							'id' => $id,
							'password' => md5($this->input->post('old_password')),
							'status' => 1
						)
					);
					$checkLogin = $this->user->getRows($con);
					if ($checkLogin) {
						$update = $this->user->update(
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

			$data['user'] = $this->user->getRows($con);

			
			// Pass the user data and load view 
			$this->load->view('myheader', [
				'title' => 'حساب کاربری',
				'menus' => $this->db_model->get_menus(),
				'setting' => $this->db_model->get_setting(),
			]);
			$this->load->view('users/account', $data);
			$this->load->view('page-footer');
		} else {
			//redirect('users/login');
			header("location: " . base_url('index.php/users/login'));
		}
	}

	public function login()
	{
		$data = array();

		// Get messages from the session 
		if ($this->session->userdata('success_msg')) {
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if ($this->session->userdata('error_msg')) {
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		// If login request submitted 
		if ($this->input->post('loginSubmit')) {
			$this->form_validation->set_rules('phone', 'تلفن', 'required|numeric|min_length[9]|regex_match[/^09[0-9]{9}$/]');
			$this->form_validation->set_rules('password', 'رمز عبور', 'required');


			if ($this->form_validation->run() == true) {
				$con = array(
					'returnType' => 'single',
					'conditions' => array(
						'phone' => $this->input->post('phone'),
						'password' => md5($this->input->post('password')),
						'status' => 1
					)
				);
				$checkLogin = $this->user->getRows($con);
				if ($checkLogin) {
					$this->session->set_userdata('isUserLoggedIn', TRUE);
					$this->session->set_userdata('userId', $checkLogin['id']);
					header("location: " . base_url('index.php/users/account/'));
				} else {
					$data['error_msg'] = 'تلفن وارد شده یا رمز عبور درست نیست.';
				}
			} else {
				$data['error_msg'] = 'لطفا همه قسمت های الزامی را پر کنید.';
			}
		}


		// Load view 
		$this->load->view('myheader', [
			'title' => 'ورود به حساب کاربری',
			'menus' => $this->db_model->get_menus(),
			'setting' => $this->db_model->get_setting(),
		]);
		$this->load->view('users/login', $data);
		$this->load->view('page-footer');
	}

	public function registration()
	{
		$data = $userData = array();

		// If registration request is submitted 
		if ($this->input->post('signupSubmit')) {
			$this->form_validation->set_rules('name', 'نام و نام خانوادگی', 'required');
			$this->form_validation->set_rules('email', 'ایمیل', 'valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('adres', 'آدرس', 'min_length[10]|max_length[250]');
			$this->form_validation->set_rules('phone', 'تلفن', 'required|numeric|min_length[9]|regex_match[/^09[0-9]{9}$/]|is_unique[users.phone]');
			$this->form_validation->set_rules('password', 'رمز عبور', 'required');
			$this->form_validation->set_rules('conf_password', 'تکرار رمز عبور', 'required|matches[password]');

			$userData = array(
				'name' => strip_tags($this->input->post('name')),
				'adres' => strip_tags($this->input->post('adres')),
				'email' => strip_tags($this->input->post('email')),
				'password' => md5($this->input->post('password')),
				'phone' => strip_tags($this->input->post('phone'))
			);

			if ($this->form_validation->run() == true) {
				$insert = $this->user->insert($userData);
				if ($insert) {
					$this->session->set_userdata('success_msg', 'ثبت حساب شما با موفقیت انجام شده. لطفا وارد حساب کاربری خود شوید.');
					//redirect('users/login');
					header("location: " . base_url('index.php/users/login'));
				} else {
					$data['error_msg'] = 'مشکلی پیش آمد لطفا مجددا تلاش کنید.';
				}
			} else {
				$data['error_msg'] = 'لطفا همه قسمت های الزامی را پر کنید.';
			}
		}

		// Posted data 
		$data['user'] = $userData;

		// Load view 
		$this->load->view('myheader', [
			'title' => 'ایجاد حساب کاربری',
			'menus' => $this->db_model->get_menus(),
			'setting' => $this->db_model->get_setting(),
		]);
		$this->load->view('users/registration', $data);
		$this->load->view('page-footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('isUserLoggedIn');
		$this->session->unset_userdata('userId');
		$this->session->sess_destroy();
		// redirect('users/login/');
		header("location: " . base_url('index.php/users/login'));
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
		$checkEmail = $this->user->getRows($con);
		if ($checkEmail > 0) {
			$this->form_validation->set_message('email_check', 'The given email already exists.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
