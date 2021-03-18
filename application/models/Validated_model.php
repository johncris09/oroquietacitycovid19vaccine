<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validated_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function record()
    {
        return $this->db
            ->where('deletestatus', 0)
            ->where('validated', 'no')
            ->order_by('timestamp','DESC')
        	->get('record')
        	->result_array();
    }



    public function validated()
    {
        return $this->db
            ->where('validated.record_id = record.id')
            ->where('record.validated', 'yes')
            ->order_by('validated.timestamp','DESC')
            ->get('record, validated');
            // ->result_array();
    }

    public function number_of_validated()
    {
        return $this->db
            ->where('validated', "yes")
            ->where('deletestatus', 0)
            ->get('record')
            ->num_rows();
    }
}
