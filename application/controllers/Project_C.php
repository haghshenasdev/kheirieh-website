<?php

class Project_C extends CI_Controller
{
    public function index($p_name)
    {
        $this->load->model('DB_model');
        $this->load->helper('url');
        $this->load->library(array('show_menu','read_image_folder'));
        $project_data = $this->DB_model->get_projects_data($p_name);
        if (count($project_data) != 0) {
            $data = array(
                'project_data' => $project_data,
                'menus' => $this->DB_model->get_menus()
            );
            $this->load->view('project-page',$data);
        }else {
            show_404();
            //redirect(base_url());
        }
    }
}
