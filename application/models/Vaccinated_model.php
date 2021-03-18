<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaccinated_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login($data)
    {
    	$this->db->cache_off();
        return $this->db->where($data)
			->get('vaccinated')
			->num_rows();
    }


    public function get_vaccinated_info($data)
    {  
        $this->db->where($data);
        return $this->db->get('vaccinated')->result_array()[0];

    }

    public function vaccinated()
    {
         // $this->db->cache_on();
        return $this->db
            ->where('vaccinated.record_id = record.id')
            ->where('vaccinated.deletestatus', 0)
            ->get('vaccinated, record');
            // ->result_array();
    }

    public function insert($data)
    {
        $this->db->db_debug = false;
        $insert = $this->db->insert('vaccinated', $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    }


    public function get_vaccinated($id)
    {
        return $this->db
            ->where('vaccinated.record_id = record.id')
            ->where('vaccinated.deletestatus', 0)
            ->where('vaccinated_id', $id)
            ->get('vaccinated, record')
            ->result_array()[0];
    }

    
    public function update($data)
    { 
        return $this->db->where('vaccinated_id', $data['vaccinated_id'])
            ->update('vaccinated', $data);
    }


    public function delete($id)
    {
        $data = array(
            'deletestatus' => 1
        );
        return $this->db->where('vaccinated_id', $id)
            ->update('vaccinated', $data);
    }

    public function number_of_vaccinated()
    {
        return $this->db
            ->where('deletestatus', 0)
            ->get('vaccinated')
            ->num_rows();
    }

    public function auth_delete($data)
    {
        return $this->db
            ->where('vaccinated_id', $data['vaccinated_id'])
            ->where('password', $data['password'])
            ->get('vaccinated')
            ->num_rows();
    }

    public function check_password($data)
    {
        return $this->db
            ->where('vaccinated_id', $data['vaccinated_id'])
            ->where('password', $data['password'])
            ->get('vaccinated')
            ->num_rows();
    }
    
}
