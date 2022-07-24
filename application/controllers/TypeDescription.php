<?php

use function PHPUnit\Framework\isNull;

defined('BASEPATH') OR exit('No direct script access allowed');

class typedescription extends CI_Controller {
    public function getdescriptionty($typeid){
        $this->load->model('db_model');
        $this->load->helper('url');
        $typedata = $this->db_model->get_pay_type_id($typeid);
        if (array_key_exists(0,$typedata)) {
            echo $typedata[0]->description;
        }
    }
}