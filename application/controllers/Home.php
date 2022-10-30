<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		// $this->load->helper(array('url'));
		$this->load->model('db_model');
		$this->load->library(array('show_menu','jdf','owghat'));
		
		$data = array(
			'page_data' => $this->db_model->get_projects(),
			'menus' => $this->db_model->get_menus(),
			'hadis_random' => $this->db_model->get_hadis(),
			'hadis_random_sadagheh' => $this->db_model->get_hadis('صدقه'),
			'setting' => $this->db_model->get_setting()
		);
		$this->load->view('index_view',$data);
	}
	// public function create_table(){
	// 	$this->load->model('db_model');
	// 	$this->db_model->create_table();
	// }
}
