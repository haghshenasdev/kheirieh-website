<?php
defined('BASEPATH') or exit('No direct script access allowed');

class read_image_folder
{
    public function get_images($page_name)
    {
        $directory = 'css/images/' . $page_name;
        $images = array_diff(glob($directory . "/*.jpg"), array('..', '.'));
        return $images;
         
    }
}
