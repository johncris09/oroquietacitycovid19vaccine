<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validated extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
	public function index()
	{
		$data['page_title'] = "Validated";
		$this->load->view('admin/validated', $data);
    }
}
