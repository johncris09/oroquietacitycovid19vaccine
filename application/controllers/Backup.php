<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct(); 

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
	}

	public function index()
	{
		$data['page_title'] = "Back up";
		$data['db_name'] = $this->db->database;
		$this->load->view('admin/backup', $data);
	}

 
    
}
