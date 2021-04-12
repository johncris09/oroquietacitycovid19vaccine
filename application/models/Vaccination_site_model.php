<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaccination_site_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_info($data)
    {  
        $this->db->where($data);
        return $this->db->get('user')->result_array()[0];

    }

    public function vaccination_site()
    {
         // $this->db->cache_on();
        return $this->db
            ->where('deletestatus', 0)
            ->get('vaccination_site')
            ->result_array();
    }

   
    public function insert($data)
    {
        $this->db->db_debug = false;
        $insert = $this->db->insert('vaccination_site', $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    }


    public function get_vaccination_site($id)
    {
        return $this->db
            ->where('vaccination_site_id', $id)
            ->get('vaccination_site')
            ->result_array()[0];
    }

    
    public function update($data)
    { 
        $this->db->db_debug = false;
        $update = $this->db->where('vaccination_site_id', $data['vaccination_site_id'])
            ->update('vaccination_site', $data);
        if(!$update && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    }


    public function delete($id)
    {
        $data = array(
            'deletestatus' => 1
        );
        return $this->db->where('vaccination_site_id', $id)
            ->update('vaccination_site', $data);
    }
    public function truncate_table()
    {
        $this->db->truncate('assign_barangay');
    }

    public function insert_assign_barangay($data)
    {
        $this->db->db_debug = false;
        $insert = $this->db->insert_batch('assign_barangay', $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }

    }

    public function assign_barangay()
    {
        return $this->db
            ->where('assign_barangay.barangay = barangay.barangay_id')
            ->get('assign_barangay, barangay')
            ->result_array();
    }

    public function delete_assign_barangay($id)
    {
        return $this->db->where('vaccination_site', $id)
            ->delete('assign_barangay');
    }

    public function get_deleted_vaccination_site()
    {
        return $this->db
            ->where('deletestatus', 1)
            ->get('vaccination_site');
            // ->result_array();
    }
    
    public function delete_completely($id)
    {
        return $this->db
            ->where('vaccination_site_id', $id)
            ->delete('vaccination_site');
    }
    
}
