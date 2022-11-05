<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// Load form validation ibrary & user model 
		$this->load->library(['form_validation', 'show_menu', 'userssystem']);
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

			$data = $this->userssystem->account();

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
		$data = $this->userssystem->login();

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
		$data = $this->userssystem->registration();

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
		$this->userssystem->logout();
	}
}
