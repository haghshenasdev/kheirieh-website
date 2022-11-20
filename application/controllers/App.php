<?php

use function PHPUnit\Framework\isNull;

defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper("url");
		$this->load->model('db_model');
		// User login status 
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
		$this->load->library('userssystem', ['app']);
	}

	public function index()
	{
		$this->load->view('pwaui/App_view', [
			'hadis_random_sadagheh' => $this->db_model->get_hadis('صدقه'),
			'slideshows' => $this->db_model->get_slide_show()
		]);
	}
	public function openpost()
	{
		if (isset($_GET['url']) || !isNull($_GET['url'])) {

			require('././blog/wp-blog-header.php');
			$this->load->view(
				'pwaui/App_Header',
				[
					'head' => '
				<link rel="stylesheet" id="ari-fancybox-css" href="https://kheiriehemamali.ir/blog/wp-content/plugins/ari-fancy-lightbox/assets/fancybox/jquery.fancybox.min.css?ver=1.3.9" type="text/css" media="all">
				<link rel="stylesheet" href="https://kheiriehemamali.ir/blog/wp-content/themes/soft-blog/assets/css/blocks.min.css?ver=6.0.2" type="text/css" media="all">
                <script type="text/javascript" src="https://kheiriehemamali.ir/blog/wp-includes/js/jquery/jquery.min.js?ver=3.6.0" id="jquery-core-js"></script>
                <script type="text/javascript" src="https://kheiriehemamali.ir/blog/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2" id="jquery-migrate-js"></script>
                <script type="text/javascript" id="ari-fancybox-js-extra">
                   /* <![CDATA[ */
                   var ARI_FANCYBOX = {
                      "lightbox": {
                         "backFocus": false,
                         "trapFocus": false,
                         "thumbs": {
                            "hideOnClose": false
                         },
                         "touch": {
                            "vertical": true,
                            "momentum": true
                         },
                         "buttons": ["slideShow", "fullScreen", "thumbs", "close"],
                         "lang": "custom",
                         "i18n": {
                            "custom": {
                               "PREV": "Previous",
                               "NEXT": "Next",
                               "PLAY_START": "Start slideshow (P)",
                               "PLAY_STOP": "Stop slideshow (P)",
                               "FULL_SCREEN": "Full screen (F)",
                               "THUMBS": "Thumbnails (G)",
                               "CLOSE": "Close (Esc)",
                               "ERROR": "The requested content cannot be loaded. <br\/> Please try again later."
                            }
                         }
                      },
                      "convert": {
                         "images": {
                            "convert": true,
                            "post_grouping": true,
                            "convertNameSmart": true
                         }
                      },
                      "viewers": {
                         "pdfjs": {
                            "url": "https:\/\/kheiriehemamali.ir\/blog\/wp-content\/plugins\/ari-fancy-lightbox\/assets\/pdfjs\/web\/viewer.html"
                         }
                      }
                   };
                   /* ]]> */
                </script>
                <script type="text/javascript" src="https://kheiriehemamali.ir/blog/wp-content/plugins/ari-fancy-lightbox/assets/fancybox/jquery.fancybox.min.js?ver=1.3.9" id="ari-fancybox-js"></script>
             ' . "<link rel='stylesheet' href=" . get_stylesheet_uri() . ">"
				]
			);
			$this->load->view('pwaui/postshow', ['url' => $_GET['url']]);
			$this->load->view('pwaui/App_Footer');
		}
	}

	public function about()
	{
		$this->load->view('pwaui/App_Header');
		$this->load->view('pwaui/pages/about', ['setting' => $this->db_model->get_setting()]);
		$this->load->view('pwaui/App_Footer');
	}
	public function news()
	{
		$this->load->view('pwaui/App_Header');
		$this->load->view('pwaui/pages/news');
		$this->load->view('pwaui/App_Footer');
	}
	public function shop()
	{
		$this->load->view('pwaui/App_Header');
		$this->load->view('pwaui/pages/shop');
		$this->load->view('pwaui/App_Footer');
	}
	public function message()
	{
		$this->load->view('pwaui/App_Header');
		$this->load->view('pwaui/pages/message');
		$this->load->view('pwaui/App_Footer');
	}

	public function projectshow($p_name)
	{
		$this->load->helper('url');
		$this->load->library(array('read_image_folder'));
		$project_data = $this->db_model->get_projects_data($p_name);
		if (count($project_data) != 0) {
			$data = array(
				'project_data' => $project_data,
			);
			$this->load->view('pwaui/App_Header', [
				'head' => '
				<link rel="stylesheet" id="ari-fancybox-css" href="https://kheiriehemamali.ir/blog/wp-content/plugins/ari-fancy-lightbox/assets/fancybox/jquery.fancybox.min.css?ver=1.3.9" type="text/css" media="all">
                <script type="text/javascript" src="https://kheiriehemamali.ir/blog/wp-includes/js/jquery/jquery.min.js?ver=3.6.0" id="jquery-core-js"></script>
                <script type="text/javascript" src="https://kheiriehemamali.ir/blog/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2" id="jquery-migrate-js"></script>
                <script type="text/javascript" id="ari-fancybox-js-extra">
                   /* <![CDATA[ */
                   var ARI_FANCYBOX = {
                      "lightbox": {
                         "backFocus": false,
                         "trapFocus": false,
                         "thumbs": {
                            "hideOnClose": false
                         },
                         "touch": {
                            "vertical": true,
                            "momentum": true
                         },
                         "buttons": ["slideShow", "fullScreen", "thumbs", "close"],
                         "lang": "custom",
                         "i18n": {
                            "custom": {
                               "PREV": "Previous",
                               "NEXT": "Next",
                               "PLAY_START": "Start slideshow (P)",
                               "PLAY_STOP": "Stop slideshow (P)",
                               "FULL_SCREEN": "Full screen (F)",
                               "THUMBS": "Thumbnails (G)",
                               "CLOSE": "Close (Esc)",
                               "ERROR": "The requested content cannot be loaded. <br\/> Please try again later."
                            }
                         }
                      },
                      "convert": {
                         "images": {
                            "convert": true,
                            "post_grouping": true,
                            "convertNameSmart": true
                         }
                      },
                      "viewers": {
                         "pdfjs": {
                            "url": "https:\/\/kheiriehemamali.ir\/blog\/wp-content\/plugins\/ari-fancy-lightbox\/assets\/pdfjs\/web\/viewer.html"
                         }
                      }
                   };
                   /* ]]> */
                </script>
                <script type="text/javascript" src="https://kheiriehemamali.ir/blog/wp-content/plugins/ari-fancy-lightbox/assets/fancybox/jquery.fancybox.min.js?ver=1.3.9" id="ari-fancybox-js"></script>
             '
			]);
			$this->load->view('pwaui/projectshow', $data);
			$this->load->view('pwaui/App_Footer');
		} else {
			show_404();
			//redirect(base_url());
		}
	}

	public function openprojects()
	{
		$data = array(
			'page_data' => $this->db_model->get_projects()
		);
		$this->load->view('pwaui/App_Header');
		$this->load->view('pwaui/projects', $data);
		$this->load->view('pwaui/App_Footer');
	}

	public function openDonatePage()
	{
		$this->pay("komak");
	}

	public function pay($type_name, $ezafe = null)
	{
		$this->load->library('donatepay', ['app']);
		$this->donatepay->pay_instance(
			$type_name,
			function ($data) {
				$this->load->view(
					'pwaui/App_Header',
					[
						'title' => $data['type_data']->title,
						'short_title' => 'پرداخت و نیکو کاری',
						'isUserLoggedIn' => $this->userssystem->isUserLoggedIn
					]
				);
				$this->load->view('forms/donitef', $data);
				$this->load->view('pwaui/App_Footer');
			}
		);
	}
	public function verifaypay()
	{
		$this->load->library('donatepay', ['app']);
		$this->donatepay->verifaypay_instance(
			function ($data) {
				$this->load->view(
					'pwaui/App_Header',
					[
						'title' => '',
						'short_title' => $data['success'] ? 'پرداخت موفق' : 'پرداخت ناموفق',
						'customBackBtnclic' => "history.go(-2);",
					]
				);
				$this->load->view('forms/pay_valid_show', $data);
				$this->load->view('pwaui/App_Footer');
			}
		);
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
	//vlidate method end

	public function account()
	{
		$data = array();
		if ($this->isUserLoggedIn) {

			$data = $this->userssystem->account();

			$this->load->view('pwaui/App_Header', [
				'title' => 'حساب کاربری',
				'short_title' => 'حساب کاربری',
			]);
			$this->load->view('users/account', $data);
			$this->load->view('pwaui/App_Footer');
		} else {
			//redirect('users/login');
			header("location: " . base_url('index.php/app/login'));
		}
	}

	public function login()
	{
		$data = $this->userssystem->login();
		// Load view 
		$this->load->view('pwaui/App_Header', [
			'title' => 'ورود',
			'short_title' => 'ورود',
		]);
		$this->load->view('users/login', $data);
		$this->load->view('pwaui/App_Footer');
	}

	public function registration()
	{
		$data = $this->userssystem->registration();

		// Load view 
		$this->load->view('pwaui/App_Header', [
			'title' => 'ثبت نام',
			'short_title' => 'ثبت نام',
		]);
		$this->load->view('users/registration', $data);
		$this->load->view('pwaui/App_Footer');
	}

	public function logout()
	{
		$this->userssystem->logout();
	}

	public function sandoogh()
	{

		if (!$this->isUserLoggedIn) redirect($this->userssystem->route_login);

		$this->load->helper(array('form', 'cookie'));
		$this->load->library(array('form_validation', 'jdf'));

		$userdata = $this->userssystem->get_logined_user_data();
		$adresNull = ($userdata['adres'] == "" || $userdata['adres'] == null) ? true : false;

		// form validation
		if ($adresNull) $this->form_validation->set_rules('adres', 'آدرس', 'max_length[400]|required');

		// capcha validation
		$this->form_validation->set_rules('g-recaptcha-response', 'کپچا', 'callback_google_validate_captcha');
		$this->form_validation->set_message('google_validate_captcha', 'لطفا کپچا را برسی کنید');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('pwaui/App_Header', [
				'short_title' => 'درخواست صندوق صدقات', 
				'all_type' => $this->db_model->getSandooghdtypes()
			]);
			$this->load->view('pwaui/sandoogh/sandooghf', compact('adresNull'));
			$this->load->view('pwaui/App_Footer');
		} else {
			if ($adresNull) {
				$this->load->model('user');
				$this->user->update(
					$userdata['id'],
					['adres' => $this->input->post('adres')]
				);
			}

			$this->load->view('pwaui/App_Header');
			if ($this->db_model->insert_DSanDoogh(
				[
					'description' => $this->input->post('description'),
					'type' => $this->input->post('type'),
					'userid' => $userdata['id']
				]
			)) {
				$this->load->view('pwaui/sandoogh/sandooghfSucsses');
			} else {
				$this->load->view('pwaui/sandoogh/sandooghfDangerd');
			}
			$this->load->view('pwaui/App_Footer');
		}
	}
}

/* End of file App.php and path \application\controllers\app\App.php */
