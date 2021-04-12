<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function schedule()
    {
        return $this->db
            ->where('schedule.deletestatus', 0)
            ->where('schedule.vaccination_site = vaccination_site.vaccination_site_id')
            ->where('schedule.created_by= user.user_id')
            ->get('schedule, vaccination_site, user');
            // ->result_array();
    }
    
    
    public function insert($data)
    {
        $this->db->db_debug = false;
        $insert = $this->db->insert('schedule', $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return $this->db->insert_id();
        }
    }
 

    public function encoder_log()
    {
        return $this->db
            ->where('description like "%added a new record%"')
            ->where('log.user_id = user.user_id')
            ->order_by('unix_timestamp(`date`)','DESC')
            ->get('log, user');
    }


}
