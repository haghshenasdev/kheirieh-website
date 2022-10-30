<?php

use function PHPUnit\Framework\isNull;

defined('BASEPATH') or exit('No direct script access allowed');

class typedescription extends CI_Controller
{
    public function getdescriptionty($typeid)
    {
        $this->load->model('db_model');
        $typedata = $this->db_model->get_pay_type_id($typeid);
        if (array_key_exists(0, $typedata)) {
            $this->load->view('descriptionType', [
                'typedata' => $typedata[0],
                'subtype' => $this->db_model->get_pay_subtype($typeid)
            ]);
        }
    }
}
