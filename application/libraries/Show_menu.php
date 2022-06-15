<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class show_menu
{
    public function is_inerlink_show_menus($url)
    {
        return base_url($url);
    }
}
