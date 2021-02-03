<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login($data)
    {
    	$this->db->cache_off();
        return $this->db->where($data)
			->get('user')
			->num_rows();
    }


    public function get_user_info($data)
    {  
        $this->db->where($data);
        return $this->db->get('user')->result_array()[0];

    }

    public function user()
    {
         // $this->db->cache_on();
        return $this->db
            ->where('deletestatus', 0)
            ->get('user')
            ->result_array();
    }
    
}
