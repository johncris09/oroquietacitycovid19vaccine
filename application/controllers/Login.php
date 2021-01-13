<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();
    }
    
	public function index()
	{
		$data['page_title'] = "Login";
		$this->load->view('login', $data);
    }
    
    
}