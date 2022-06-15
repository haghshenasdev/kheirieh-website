<?php

class Time_C extends CI_Controller
{
    public function get_now()
    {
        $this->load->library('jdf');
        echo $this->jdf->jdate(' تاریخ : Y/m/d  ساعت : H:i ');
    }
}
