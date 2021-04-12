<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recycle_bin extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
	public function index()
	{
		if( strtolower( $_SESSION['role_type'] )  == "super admin"  ){
			$data['page_title'] = "Recycle Bin";
			$this->load->view('admin/recycle_bin', $data);
    	}else{
    		show_404();
    	}
			
    }

    public function get_deleted_record()
    {
        $record = $this->record_model->get_deleted_record();
        if( $record->num_rows() ){
            foreach( $record->result_array() as $row ){
                $row['dateregistered'] = date('m/d/Y', strtotime($row['date_registered']));
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
        // print_r($data);

        echo json_encode($data);
    }

    public function get_deleted_user()
    {
        $user = $this->user_model->get_deleted_user();
        if( $user->num_rows() ){
            foreach($user->result_array() as $row){
                unset($row['password']);
                $row['dateregistered'] = date('M d, Y h:i:s a', strtotime($row['dateregistered']));
                $row['firstname'] = ucwords($row['first_name']);
                $row['lastname'] = ucwords($row['last_name']);
                $row['middlename'] = ucwords($row['middle_name']);
                $row['extension'] = ucwords($row['extension']);
                $row['Actions']  = null;
                $data['data'][] = $row; 

            }
        }else{
            $data['data'] = array();
        }

        echo json_encode($data);
    }

    public function get_deleted_vaccination_site()
    {
        $vaccination_site = $this->vaccination_site_model->get_deleted_vaccination_site();
        if( $vaccination_site->num_rows() ){
            foreach($vaccination_site->result_array() as $row){
                $row['Actions']  = null;
                $data['data'][] = $row;
            }
        }else{
            $data['data'] = array();
        }

        echo json_encode($data);
    }
}
