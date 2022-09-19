<?php

use function PHPUnit\Framework\isNull;

defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper("url");
        $this->load->view('pwaui/App_view');
    }
    public function openpost()
    {
        if (isset($_GET['url']) || !isNull($_GET['url'])) {
            $this->load->helper("url");
            $this->load->view('pwaui/App_Header');
            $this->load->view('pwaui/postshow', ['url' => $_GET['url']]);
            $this->load->view('pwaui/App_Footer');
        }
    }

    public function projectshow($p_name)
    {
        $this->load->model('db_model');
        $this->load->helper('url');
        $this->load->library(array('read_image_folder'));
        $project_data = $this->db_model->get_projects_data($p_name);
        if (count($project_data) != 0) {
            $data = array(
                'project_data' => $project_data,
            );
            $this->load->view('pwaui/App_Header');
            $this->load->view('pwaui/projectshow', $data);
            $this->load->view('pwaui/App_Footer');
        } else {
            show_404();
            //redirect(base_url());
        }
    }

    public function openprojects()
    {
        $this->load->helper("url");
        $this->load->model('db_model');
        $data = array('page_data' => $this->db_model->get_projects());
        $this->load->view('pwaui/App_Header');
        $this->load->view('pwaui/projects', $data);
        $this->load->view('pwaui/App_Footer');
    }

    public function openDonatePage()
    {
        $this->load->helper("url");

        $this->pay("komak");
    }

    public function pay($type_name, $ezafe = null)
    {
        $this->load->model('db_model');
        $type_data = $this->db_model->get_pay_type($type_name);
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'show_menu', 'db_type', 'jdf'));

        $all_type = null;
        if ($type_name == 'komak') {
            $obj = new db_type();
            $type_data = array($obj);
            $all_type = $this->db_model->get_types();
        } elseif (count($type_data) == 0 || !is_null($ezafe)) {
            show_404();
        }

        $this->form_validation->set_rules('amount', 'مبلغ', 'integer|required');
        $this->form_validation->set_rules('name', 'نام و نام خانوادگی', 'max_length[150]|required');
        $this->form_validation->set_rules('phone', 'تلفن', 'required|numeric|min_length[9]|regex_match[/^09[0-9]{9}$/]');
        $this->form_validation->set_rules('email', 'ایمیل', 'valid_email');
        if ($this->input->post('type') != null) {
            $this->form_validation->set_rules('type', 'نوع', 'callback_valid_type');
            $this->form_validation->set_message('valid_type', 'نوع انتخاب شده معتبر نیست');
        }

        // capcha validation
        $this->form_validation->set_rules('g-recaptcha-response', 'کپچا', 'callback_google_validate_captcha');
        $this->form_validation->set_message('google_validate_captcha', 'لطفا کپچا را برسی کنید');

        $data = array(
            'hadis_random_sadagheh' => $this->db_model->get_hadis('صدقه'),
            'type_data' => $type_data,
            'all_type' => $all_type,
            'setting' => $this->db_model->get_setting()
        );


        $this->load->helper('cookie');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pwaui/App_Header');
            $this->load->view('pwaui/donitef', $data);
            $this->load->view('pwaui/App_Footer');
        } else {

            $name = $this->input->post('name');
            $amount = $this->input->post('amount');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');

            $this->setco($name, $phone, $email);

            if ($type_data[0]->id == 0) {
                $type_data = $this->db_model->get_pay_type_id($this->input->post('type'));
            }
            $title = $type_data[0]->title;
            $typeid = $type_data[0]->id;

            $ar = $this->jdf->gregorian_to_jalali(date('Y'), date('n'), date('j'));
            $date = $ar[0] . '/' . $ar[1] . '/' . $ar[2];

            date_default_timezone_set('Asia/Tehran');

            $this->load->library('zarinpal', ['merchant_id' => $this->config->item('MID_Pay')]);
            //$this->zarinpal->sandbox();
            if ($this->zarinpal->request($amount, $title, base_url('index.php/App/verifaypay'))) {
                $authority = $this->zarinpal->get_authority();
                $this->db_model->insert_pay($name, $phone, $email, $amount, $typeid, ($date . '-' . date('H:i:s')), $this->db_model->get_format_authority($authority));

                // do database stuff
                $this->zarinpal->redirect();
            } else {
                // Unable to connect to gateway
                echo 'ارتباط با درگاه پرداخت انجام نشد !';
            }
        }
    }

    public function verifaypay()
    {
        $this->load->model('db_model');
        $this->load->helper('url');
        $this->load->library(['faktoor_image', 'show_menu']);
        $this->load->library('zarinpal', ['merchant_id' => $this->config->item('MID_Pay')]);
        $menu = $this->db_model->get_menus();

        $status = $this->input->get('Status', TRUE);
        $authority = $this->input->get('Authority', TRUE);

        // if ($status !== 'OK' or $authority === NULL) {
        //     // payment canceled by user
        // }

        //$this->zarinpal->verify($res[0]->amount, $authority)
        if ($status === 'OK' && $authority !== NULL) {
            $ref_id = $this->zarinpal->get_ref_id();
            // payment succeeded, do database stuff  
            $authority = $this->db_model->get_format_authority($authority);
            $res = $this->db_model->getpay($authority);
            $this->db_model->settruepardakht($authority);
            $type_title = $this->db_model->get_pay_typename($res[0]->type);

            //sucess , create faktoor
            $faktoor = $this->faktoor_image->create_factoor_image(
                $res[0]->name,
                $res[0]->amount,
                $type_title,
                $res[0]->date,
                $authority
            );

            $this->load->view('pwaui/App_Header');
            $this->load->view('formsuccess', array('faktoor' => $faktoor, 'menus' => $menu, 'setting' => $this->db_model->get_setting()));
            $this->load->view('pwaui/App_Footer');
        } else {
            $error = $this->zarinpal->get_error();
            // payment failed
            $this->load->view('pwaui/App_Header');
            $this->load->view('formFailed', ['menus' => $menu, 'error' => $error, 'setting' => $this->db_model->get_setting()]);
            $this->load->view('pwaui/App_Footer');
        }
    }

    private function setco($name, $phone, $email)
    {
        set_cookie('name', $name, 365 * 24 * 60);
        set_cookie('phone', $phone, 365 * 24 * 60);
        set_cookie('email', $email, 365 * 24 * 60);
    }

    //vlidate method
    public function valid_type($val)
    {
        $this->load->model('db_model');
        $type_data = $this->db_model->get_pay_type_id($val);
        if (count($type_data) == 0) {
            return false;
        } else {
            return true;
        }
    }
    function google_validate_captcha()
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


    public function sandoogh()
    {
        $this->load->model('db_model');
        $this->load->helper(array('form', 'url', 'cookie'));
        $this->load->library(array('form_validation', 'jdf'));

        // form validation
        $this->form_validation->set_rules('name', 'نام و نام خانوادگی', 'max_length[100]|required');
        $this->form_validation->set_rules('adres', 'آدرس', 'max_length[400]|required');
        $this->form_validation->set_rules('phone', 'تلفن', 'required|numeric|min_length[9]|regex_match[/^09[0-9]{9}$/]');
        $this->form_validation->set_rules('email', 'ایمیل', 'valid_email');

        // capcha validation
        $this->form_validation->set_rules('g-recaptcha-response', 'کپچا', 'callback_google_validate_captcha');
        $this->form_validation->set_message('google_validate_captcha', 'لطفا کپچا را برسی کنید');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pwaui/App_Header');
            $this->load->view('pwaui/sandoogh/sandooghf');
            $this->load->view('pwaui/App_Footer');
        } else {
            $name = $this->input->post('name');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $adres = $this->input->post('adres');
            $description = $this->input->post('description');

            $this->load->view('pwaui/App_Header');
            if ($this->db_model->insert_DSanDoogh(
                $name,
                $phone,
                $email,
                $adres,
                $description,
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
