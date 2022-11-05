<?php

class db_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
    public function get_projects()
    {
        
        $query = $this->db->get('data_projects');

        return $query->result();
    }
    public function get_pay_type($type_name)
    {
        
        $query = $this->db->get_where('type', array('type_name' => $type_name));
        return $query->result();
    }
    public function get_pay_typename($typeid)
    {
        
        $query = $this->db->get_where('type', ['id' => $typeid]);
        return $query->result()[0]->title;
    }
    public function get_pay_type_id($id)
    {
        
        $query = $this->db->get_where('type', array('id' => $id));
        return $query->result();
    }
    public function get_pay_subtype($id)
    {
        
        $query = $this->db->get_where('type', array('sub' => $id));
        return $query->result();
    }
    public function get_types()
    {
        
        $query = $this->db->get('type');
        return $query->result();
    }

    public function get_setting()
    {
        
        $query = $this->db->get('setting');
        return $query->result();
    }

    public function get_menus()
    {
        
        $query = $this->db->get_where('menu', array('show' => '1'));

        return $query->result();
    }
    public function get_projects_data($page_name)
    {
        
        $query = $this->db->get_where('data_projects', array('page_name' => $page_name));

        return $query->result_array();
    }

    public function get_slide_show()
    {
        
        $query = $this->db->get_where('slide_show', [
            'is_active' => 1
        ]);

        return $query->result_array();
    }

    public function get_hadis($subject = null, $id = null)
    {
        
        if ($subject == null) {
            $query = $this->db->get('hadis');
        } else {
            $query = $this->db->get_where('hadis', array('subject' => $subject));
        }
        $result = $query->result_array();
        if ($id == null) {
            $id = random_int(1, count($result));
        }

        return $result[$id - 1];
    }
    public function insert_pay($data)
    {
        if ($data['sabtid'] == null) {
            $data['sabtid'] = $this->get_sabtid();
        }
        // $data = array(
        //     'sabtid' => $sabtid,
        //     'name' => $name,
        //     'phone' => $phone,
        //     'email' => $email,
        //     'amount' => $amount,
        //     'type' => $type,
        //     'date' => $date
        // );
        $this->db->insert('faktoors', $data);
        return $data['sabtid'];
    }
    public function getpay($sabtid)
    {
        
        $query = $this->db->get_where('faktoors', ['sabtid' => $sabtid]);
        return $query->result();
    }
    public function settruepardakht($sabtid)
    {
        
        $this->db->update('faktoors', ['ispardakht' => '1'], ['sabtid' => $sabtid]);
    }
    public function get_sabtid()
    {
        
        $c = $this->db->count_all('faktoors');
        return '110-' . sprintf("%'.09d", $c + 1);
    }
    public function get_format_authority($authority)
    {
        return '110-' . substr($authority, -9);
    }

    public function insert_DSanDoogh($name, $phone, $email, $adres, $description)
    {
        
        $data = array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'adres' => $adres,
            'description' => $description
        );
        return $this->db->insert('sandooghD', $data);
    }
}
