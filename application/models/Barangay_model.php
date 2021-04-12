<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangay_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function barangay()
    {
        return $this->db
            ->where('barangay.barangay_id not in (SELECT assign_barangay.barangay FROM `assign_barangay`
where assign_barangay.barangay)')
            ->get('barangay')
            ->result_array();
    }
}
