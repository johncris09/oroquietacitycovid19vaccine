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

    public function insert($data)
    { 
        $insert = $this->db->insert('user', $data); 
        if(!$insert && $this->db->error()['code'] == 1062){
            return 0;
        }else{
            return $insert;
        }
    }


    public function get_user($id)
    {
        return $this->db
            ->where('user_id', $id)
            ->get('user')
            ->result_array()[0];
    }

    
    public function update($data)
    { 
        return $this->db->where('user_id', $data['user_id'])
            ->update('user', $data);
    }


    public function delete($id)
    {
        $data = array(
            'deletestatus' => 1
        );
        return $this->db->where('user_id', $id)
            ->update('user', $data);
    }
    
}
