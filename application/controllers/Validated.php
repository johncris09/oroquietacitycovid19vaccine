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

    public function add()
    {
    	$data['page_title'] = "Add Record";
		$this->load->view('admin/add_validated', $data);
    }

	
	public function get_validated()
	{
		$validated = $this->validated_model->validated();
		if( $validated->num_rows() ){
			foreach( $validated->result_array() as $row ){
				$row['dateregistered'] = date('m/d/Y', strtotime($row['timestamp']));
				$row['time'] = date('h:i:s a', strtotime($row['timestamp']));
				$birthDate = date('m/d/Y', strtotime($row['birthdate']));
				$birthDate = explode("/", $birthDate);
				$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
				    ? ((date("Y") - $birthDate[2]) - 1)
				    : (date("Y") - $birthDate[2]));
				$row['age'] = $age;
				$row['lastname'] = ucwords($row['lastname']);
				$row['firstname'] = ucwords($row['firstname']);
				$row['middlename'] = ucwords($row['middlename']);
				$row['street'] = ucwords($row['street']);
				$row['Actions']  = null;
				$data['data'][] = $row; 

			}
		}else{
			$data['data'] = array();
		} 
		echo json_encode($data);
	}  
}
