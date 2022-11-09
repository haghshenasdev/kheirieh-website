<?php

class Project_C extends CI_Controller
{
    public function index($p_name)
    {
        $this->load->model('db_model');
        $this->load->library(array('show_menu','read_image_folder'));

        $project_data = $this->db_model->get_projects_data($p_name);

        if (count($project_data) != 0) {
			$project_data = $project_data[0];
            $data = array(
                'project_data' => $project_data,
                'setting' => $this->db_model->get_setting()
            );
            $this->load->view('layout/myheader',[
				'menus' => $this->db_model->get_menus(),
				'title' => $project_data['title'],
				'tags' => $project_data['tags'],
				'description' => $project_data['description'],
				'subject' => $project_data['title'],
			]);
            $this->load->view('project',$data);
            $this->load->view('layout/footer');
        }else {
            show_404();
        }
    }
}
