<?php

class Project_C extends CI_Controller
{
    public function index($p_name)
    {
        $this->load->model('db_model');
        $this->load->library(array('show_menu','read_image_folder'));
        $project_data = $this->db_model->get_projects_data($p_name);
        if (count($project_data) != 0) {
            $data = array(
                'project_data' => $project_data,
                'menus' => $this->db_model->get_menus(),
                'setting' => $this->db_model->get_setting()
            );
            $this->load->view('project-page',$data);
        }else {
            show_404();
            //redirect(base_url());
        }
    }
}
