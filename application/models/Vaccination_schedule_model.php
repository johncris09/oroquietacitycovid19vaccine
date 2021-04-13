<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaccination_schedule_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function insert($data)
    {
        $this->db->db_debug = false;
        $insert = $this->db->insert('vaccination_schedule', $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    }

    public function delete_completely($id)
    {
        return $this->db
            ->where('schedule_id', $id)
            ->delete('vaccination_schedule');
    }


}
