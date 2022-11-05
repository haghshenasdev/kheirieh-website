<?php defined('BASEPATH') or exit('No direct script access allowed');

class DonatePay
{
	private $ci;

	public function __construct($params = [])
	{
		$this->ci = &get_instance();
		$this->ci->load->model('db_model');
	}

	public function pay_instance($type_name, $formView, $ezafe = null)
	{

		$type_data = $this->ci->db_model->get_pay_type($type_name);
		$this->ci->load->helper(array('form'));
		$this->ci->load->library(array('form_validation', 'db_type', 'jdf'));
		$this->ci->load->library('userssystem', ['app']);

		$all_type = null;
		if ($type_name == 'komak') {
			$obj = new db_type();
			$type_data = array($obj);
			$all_type = $this->ci->db_model->get_types();
		} elseif (count($type_data) == 0 || !is_null($ezafe)) {
			show_404();
		}

		if (!$this->ci->isUserLoggedIn) {
			$this->ci->userssystem->login_validation_rules();
		}

		$this->ci->form_validation->set_rules('amount', 'مبلغ', 'integer|required');

		if ($this->ci->input->post('type') != null) {
			$this->ci->form_validation->set_rules('type', 'نوع', 'callback_valid_type');
			$this->ci->form_validation->set_message('valid_type', 'نوع انتخاب شده معتبر نیست');
		}

		// capcha validation
		$this->ci->form_validation->set_rules('g-recaptcha-response', 'کپچا', 'callback_google_validate_captcha');
		$this->ci->form_validation->set_message('google_validate_captcha', 'لطفا کپچا را برسی کنید');

		$data = array(
			'hadis_random_sadagheh' => $this->ci->db_model->get_hadis('صدقه'),
			'type_data' => $type_data[0],
			'all_type' => $all_type,
		);

		if ($this->ci->form_validation->run()) {
			$amount = $this->ci->input->post('amount');

			$checkLogin_userdata = null;
			if (!$this->ci->isUserLoggedIn) {
				$checkLogin_userdata = $this->ci->userssystem->getDataAndCheck_user_login();
			} else {
				$checkLogin_userdata = $this->ci->userssystem->get_logined_user_data();
			}

			//////////////
			if ($checkLogin_userdata) {

				if (!$this->ci->isUserLoggedIn) {
					$this->ci->userssystem->start_logined_session($checkLogin_userdata);
				}

				$type_data = $this->gneriate_typedata($type_data);

				// init zarinpal
				$this->ci->load->library('zarinpal', ['merchant_id' => $this->ci->config->item('MID_Pay')]);
				$this->ci->zarinpal->sandbox();
				if ($this->ci->zarinpal->request($amount, $type_data->title, base_url('index.php/App/verifaypay'))) {
					$authority = $this->ci->zarinpal->get_authority();
					$this->ci->db_model->insert_pay([
						'userid' => $checkLogin_userdata['id'],
						'amount' => $amount,
						'sabtid' => $this->ci->db_model->get_format_authority($authority),
						'type' => $type_data->id,
					]);
					// do database stuff
					$this->ci->zarinpal->redirect();
				} else {
					// Unable to connect to gateway
					$data['error_msg'] = 'ارتباط با درگاه پرداخت انجام نشد !';
				}
			} else {
				$data['error_msg'] = 'رمز عبور و  شماره تلفن درست نیست !';
			}
		}


		$formView($data);
	}

	public function verifaypay()
	{

		$this->ci->load->library(['faktoor_image', 'show_menu']);
		$this->ci->load->library('zarinpal', ['merchant_id' => $this->ci->config->item('MID_Pay')]);

		$status = $this->ci->input->get('Status', TRUE);
		$authority = $this->ci->input->get('Authority', TRUE);

		// if ($status !== 'OK' or $authority === NULL) {
		//     // payment canceled by user
		// }

		//$this->ci->zarinpal->verify($res[0]->amount, $authority)
		if ($status === 'OK' && $authority !== NULL) {
			$ref_id = $this->ci->zarinpal->get_ref_id();
			// payment succeeded, do database stuff  
			$authority = $this->ci->db_model->get_format_authority($authority);
			$res = $this->ci->db_model->getpay($authority);
			$this->ci->db_model->settruepardakht($authority);
			$type_title = $this->ci->db_model->get_pay_typename($res[0]->type);

			//sucess , create faktoor
			$faktoor = $this->ci->faktoor_image->create_factoor_image(
				$res[0]->name,
				$res[0]->amount,
				$type_title,
				$res[0]->date,
				$authority
			);

			$this->ci->load->view('pwaui/App_Header');
			$this->ci->load->view('formsuccess', array('faktoor' => $faktoor, 'setting' => $this->ci->db_model->get_setting()));
			$this->ci->load->view('pwaui/App_Footer');
		} else {
			$error = $this->ci->zarinpal->get_error();
			// payment failed
			$this->ci->load->view('pwaui/App_Header');
			$this->ci->load->view('formFailed', [
				'error' => $error,
				'setting' => $this->ci->db_model->get_setting(),
			]);
			$this->ci->load->view('pwaui/App_Footer');
		}
	}

	private function setco($name, $phone, $email)
	{
		set_cookie('name', $name, 365 * 24 * 60);
		set_cookie('phone', $phone, 365 * 24 * 60);
		set_cookie('email', $email, 365 * 24 * 60);
	}

	private function gneriate_typedata($type_data)
	{
		if ($type_data[0]->id == 0) {
			$type_data = $this->ci->db_model->get_pay_type_id($this->ci->input->post('type'));
		}
		if (!is_null($this->ci->input->post("type_sub")) && $this->ci->input->post("type_sub") != 0) {
			$type_data = $this->ci->db_model->get_pay_type_id($this->ci->input->post('type_sub'));
		}

		return $type_data[0];
	}
}
