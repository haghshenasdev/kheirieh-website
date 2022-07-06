<?php

class form_controler extends CI_Controller
{
    public function pay($type_name, $ezafe = null)
    {
        $this->load->model('DB_model');
        $type_data = $this->DB_model->get_pay_type($type_name);
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'show_menu', 'db_type', 'jdf', 'cipaykish'));

        $all_type = null;
        if ($type_name == 'komak') {
            $obj = new db_type();
            $type_data = array($obj);
            $all_type = $this->DB_model->get_types();
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
            'menus' => $this->DB_model->get_menus(),
            'hadis_random_sadagheh' => $this->DB_model->get_hadis('صدقه'),
            'type_data' => $type_data,
            'all_type' => $all_type
        );



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('formp', $data);
        } else {

            $name = $this->input->post('name');
            $amount = $this->input->post('amount');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');

            if ($type_data[0]->id == 0) {
                $type_data = $this->DB_model->get_pay_type_id($this->input->post('type'));
            }
            $title = $type_data[0]->title;
            $typeid = $type_data[0]->id;

            $ar = $this->jdf->gregorian_to_jalali(date('Y'), date('n'), date('j'));
            $date = $ar[0] . '/' . $ar[1] . '/' . $ar[2];

            date_default_timezone_set('Asia/Tehran');
            $sabtid = $this->DB_model->insert_pay($name, $phone, $email, $amount, $typeid, ($date . '-' . date('H:i:s')));

            $pay = new cipaykish(base_url('index.php/form_controler/verifaypay'),$this->config->item('MID_Pay'));
            $pay->showpay($amount, $sabtid);
        }
    }

    public function verifaypay()
    {
        $this->load->model('DB_model');
        $this->load->helper('url');
        $this->load->library(['cipaykish','faktoor_image','show_menu']);
        $menu = $this->DB_model->get_menus();
        $pay = new cipaykish();
        $res = $pay->verifypay();
        if (! $res) {
            $this->load->view('formFailed' , ['menus' => $menu]);
        } else {

            ///for test
            //$res = ['RefNum' => '110-000000002'];
            ///

            $sabtid = $res['RefNum'];
            
            $this->DB_model->settruepardakht($sabtid);
            $res = $this->DB_model->getpay($sabtid);
            $type_title = $this->DB_model->get_pay_typename($res[0]->type);

            //sucess , create faktoor
            $faktoor = $this->faktoor_image->create_factoor_image(
                $res[0]->name,
                $res[0]->amount,
                $type_title,
                $res[0]->date,
                $sabtid
            );

            $this->load->view('formsuccess', array('faktoor' => $faktoor,'menus' => $menu));
        }
    }


    //vlidate method
    public function valid_type($val)
    {
        $this->load->model('DB_model');
        $type_data = $this->DB_model->get_pay_type_id($val);
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


}
