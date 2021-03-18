<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function log()
    {
        return $this->db
            ->where('log.user_id = user.user_id')
            ->where('log.deletestatus', 0)
            ->order_by('date','DESC')
        	->get('log, user');
        	// ->result_array();
    }  


}
