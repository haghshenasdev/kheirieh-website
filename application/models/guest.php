<?php defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Model
{
    function __construct()
    {
        // Set table name 
        $this->table = 'guest_users';
    }

	public function insert($data)
	{
		// Insert member data 
		$insert = $this->db->insert($this->table, $data);

		// Return the status 
		return $insert ? $this->db->insert_id() : false;
	}
	public function found($data)
	{
		$res = $this->db->from($this->table)->where($data)->get()->result();
		return count($res) == 0 ? false : $res[0]->id;
	}

}
