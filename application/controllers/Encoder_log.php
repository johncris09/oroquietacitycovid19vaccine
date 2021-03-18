<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encoder_log extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
	public function index()
	{
		$data['page_title'] = "Encoder's Log";
		$this->load->view('admin/encoder_log', $data);
    } 
}
