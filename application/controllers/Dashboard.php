<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
	public function index()
	{
		$data['page_title'] = "Dashboard";
        $data['number_of_user'] = $this->user_model->number_of_user();
		$this->load->view('admin/dashboard', $data);
    }


}