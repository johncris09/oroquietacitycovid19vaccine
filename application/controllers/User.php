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
			'password' => md5(trim($this->input->post('password'))),
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



	public function update($id)
	{
		$data = array(
			'user_id' => $id,
			'last_name' => trim($this->input->post('lastname')),
			'first_name' => trim($this->input->post('firstname')),
			'middle_name' => trim($this->input->post('middlename')),
			'username' => trim($this->input->post('username')),
			'role_type' => trim($this->input->post('roletype')),
		);

		$update = $this->user_model->update($data);
		if($update > 0){
			$data = array(
				'response' => true,
				'message'  => 'Data updated successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Data not updated!',
				// 'message' => $this->db->error()['message'],
			);
		} 
		echo json_encode($data); 
	}

	public function delete($id)
	{
		$delete = $this->user_model->delete($id);

		if($delete){
			$data = array(
				'response' => true,
				'message'  => 'Data deleted successfully!',
			);
		}else{
			$data = array(
				'response' => false,
			);
		}

		echo json_encode($data);
	}

	public function auth_delete()
	{
		$data = array(
			'user_id' => $_SESSION['user_id'],
			'username' => $_SESSION['username'],
			'password' => md5($_POST['password'])
		);

		$data = $this->user_model->auth_delete($data);

		echo json_encode($data);
	}

	public function change_password($id)
	{
    	$data['page_title'] = "Change Password";
    	$data['user'] = $this->user_model->get_user($id);
		$this->load->view('admin/change_password', $data);
	}

	public function update_password()
	{
		$data = array(
			'user_id' => $_SESSION['user_id'],
			'password' => md5($_POST['current_password'])
		);
		$check_password = $this->user_model->check_password($data);
		if( $check_password ){
			$data = array(
				'user_id' => $_SESSION['user_id'],
				'password' => md5($_POST['confirm_password']),
			);

			$update = $this->user_model->update($data);
			if($update > 0){
				$data = array(
					'response' => true,
					'message'  => 'Password Changed successfully!',
				);
	  
			}else{ 
				$data = array(
					'response' => false,
					'message'  => 'Password not canged!',
					// 'message' => $this->db->error()['message'],
				);
			} 
		}else{
			$data = array(
					'response' => false,
					'message'  => 'Password not match!',
					// 'message' => $this->db->error()['message'],
				);
			
		}
		// $data = $check_password;
		echo json_encode($data);
	}

}
