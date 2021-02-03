<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
	public function index()
	{
		$data['page_title'] = "User";
		$this->load->view('admin/user', $data);
    }


    public function add()
    {
    	$data['page_title'] = "Add User";
		$this->load->view('admin/add_user', $data);
    }
    

	public function get_user()
	{ 
		$data = [];
		$user = $this->user_model->user();
		foreach($user as $row){
			unset($row['password']);
			$row['dateregistered'] = date('M d, Y h:i:s a', strtotime($row['dateregistered']));
			$row['firstname'] = ucwords($row['first_name']);
			$row['lastname'] = ucwords($row['last_name']);
			$row['middlename'] = ucwords($row['middle_name']);
			$row['extension'] = ucwords($row['extension']);
			$row['username'] = ucwords($row['username']);
			$row['Actions']  = null;
			$data['data'][] = $row; 

		} 
		echo json_encode($data);
	}

}