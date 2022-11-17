<?php

class faktoor extends CI_Controller
{
	public function download()
	{
		$this->load->library('faktoor_image');
		$this->load->model('db_model');
		$this->load->library('userssystem', ['app']);

		if(!$this->userssystem->isUserLoggedIn) return;
		$userdata = $this->userssystem->get_logined_user_data();

		$sabtid = $this->input->post('sabtid');
		$paydata = $this->db_model->getpay($sabtid)[0];

		$this->faktoor_image->createAndDownload(
			[
				'name' => $userdata['name'],
				'amount' => $paydata->amount,
				'type_name' => $this->db_model->get_pay_typename($paydata->type),
				'date' => $paydata->date,
				'sabtid' => $paydata->sabtid,
			]
		);
	}
}
