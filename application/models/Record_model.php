<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Record_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function record()
    {
         // $this->db->cache_on();
        return $this->db
            ->where('deletestatus', 0)
        	->get('record')
        	->result_array();
    }


    public function insert($data)
    { 
        $insert = $this->db->insert('record', $data); 
        if(!$insert && $this->db->error()['code'] == 1062){
            return 0;
        }else{
            return $insert;
        }
    } 

    public function get_record($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('record')
            ->result_array()[0];
    }
    
    public function update($data)
    { 
        return $this->db->where('id', $data['id'])
            ->update('record', $data); 
    } 

    public function delete($id)
    {
        $data = array(
            'deletestatus' => 1
        );
        return $this->db->where('id', $id)
            ->update('record', $data);
    }


}
