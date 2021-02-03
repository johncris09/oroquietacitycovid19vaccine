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

	public function insert()
	{
		$data = array(
			'last_name' => trim($this->input->post('lastname')),
			'first_name' => trim($this->input->post('firstname')),
			'middle_name' => trim($this->input->post('middlename')),
			'username' => trim($this->input->post('username')),
			'password' => trim($this->input->post('password')),
			'role_type' => trim($this->input->post('roletype')),
		); 

		$insert = $this->user_model->insert($data);
		if($insert > 0){
			$data = array(
				'response' => true,
				'message'  => 'Data inserted successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Data not inserted!',
				// 'message' => $this->db->error()['message'],
			);
		} 
		echo json_encode($data); 
	}

	public function edit($id)
	{
    	$data['page_title'] = "Edit User";
    	$data['user'] = $this->user_model->get_user($id);
		$this->load->view('admin/edit_user', $data);
	}


}