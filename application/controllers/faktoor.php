<?php

class faktoor extends CI_Controller
{
	public function download()
	{
		$this->load->library('faktoor_image');
		$this->load->model('db_model');
		$this->load->library('userssystem', ['app']);

		$sabtid = $this->input->post('sabtid');
		$paydata = $this->db_model->getpay($sabtid,!$this->userssystem->isUserLoggedIn)[0];

		$this->faktoor_image->createAndDownload(
			[
				'name' => $paydata->name,
				'amount' => $paydata->amount,
				'type_name' => $this->db_model->get_pay_typename($paydata->type),
				'date' => $paydata->date,
				'sabtid' => $paydata->sabtid,
			]
		);
	}
}
