<?php

class form_controler extends CI_Controller
{
	public function pay($type_name, $ezafe = null)
	{
		$this->load->library('donatepay', ['form_controler']);
		$this->load->library(['show_menu']);
		$this->load->library('userssystem', ['form_controler']);

		$this->donatepay->pay_instance(
			$type_name,
			function ($data) {
				$this->load->view(
					'layout/myheader',
					[
						'title' => $data['type_data']->title,
						'menus' => $this->db_model->get_menus(),
						'isUserLoggedIn' => $this->userssystem->isUserLoggedIn
					]
				);
				$this->load->view('forms/donitef', $data);
				$this->load->view('layout/footer', [
					'setting' => $this->db_model->get_setting()
				]);
			},
			$ezafe
		);
	}
	public function verifaypay()
	{
		$this->load->library(['show_menu']);
		$this->load->library('userssystem', ['form_controler']);
		$this->load->library('donatepay', ['form_controler']);
		$this->donatepay->verifaypay_instance(
			function ($data) {
				$this->load->view(
					'layout/myheader',
					[
						'title' => $data['success'] ? 'پرداخت موفق' : 'پرداخت ناموفق',
						'menus' => $this->db_model->get_menus(),
					]
				);
				$this->load->view('forms/pay_valid_show', $data);
				$this->load->view('layout/footer',[
					'setting' => $this->db_model->get_setting()		
				]);
			}
		);
	}

	public function account()
	{
		$this->load->library('userssystem', ['form_controler']);
		$this->load->library(['show_menu']);

		$this->load->model('db_model');


		$data = array();
		if ($this->isUserLoggedIn) {

			$data = $this->userssystem->account();

			$this->load->view('layout/myheader', [
				'title' => 'حساب کاربری',
				'short_title' => 'حساب کاربری',
				'menus' => $this->db_model->get_menus(),
			]);
			$this->load->view('users/account', $data);
			$this->load->view('layout/footer', [
					'setting' => $this->db_model->get_setting()
				]);
		} else {
			//redirect('users/login');
			header("location: " . base_url('index.php/app/login'));
		}
	}

	public function login()
	{
		$this->load->library('userssystem', ['form_controler']);
		$this->load->library(['show_menu']);

		$this->load->model('db_model');

		$data = $this->userssystem->login();
		// Load view 
		$this->load->view('layout/myheader', [
			'title' => 'ورود',
			'short_title' => 'ورود',
			'menus' => $this->db_model->get_menus(),
		]);
		$this->load->view('users/login', $data);
		$this->load->view('layout/footer', [
					'setting' => $this->db_model->get_setting()
				]);
	}

	public function registration()
	{
		$this->load->library('userssystem', ['form_controler']);
		$this->load->library(['show_menu']);

		$this->load->model('db_model');

		
		$data = $this->userssystem->registration();

		// Load view 
		$this->load->view('layout/myheader', [
			'title' => 'ثبت نام',
			'short_title' => 'ثبت نام',
			'menus' => $this->db_model->get_menus(),
		]);
		$this->load->view('users/registration', $data);
		$this->load->view('layout/footer', [
					'setting' => $this->db_model->get_setting()
				]);
	}
	//vlidate method
	public function valid_type($val)
	{

		$type_data = $this->db_model->get_pay_type_id($val);
		if (count($type_data) == 0) {
			return false;
		} else {
			return true;
		}
	}
	public function google_validate_captcha()
	{
		$google_captcha = $this->input->post('g-recaptcha-response');
		$google_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $this->config->item('google_secret') . "&response=" . $google_captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
		if ($google_response . 'success' == false) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
}
