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
	
	public function get_encoder_log()
	{ 
		$log = $this->log_model->encoder_log();
		if( $log->num_rows() ){
			foreach( $log->result_array() as $row ){
				unset($row['password']);
				$row['time'] = date('h:i:s a', strtotime($row['date'])); 
				$row['date'] = date('m/d/Y', strtotime($row['date'])); 
				$row['user'] = ucwords( $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] );
				$row['Actions']  = null;
				$data['data'][] = $row;
			}
		}else{
			$data['data'] = array();
		}
		echo json_encode($data);
	}
}
