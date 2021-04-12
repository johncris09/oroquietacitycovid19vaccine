<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();

        if ( $this->session->userdata('user_id') ) {
            redirect('dashboard');
        }
    }
    
	public function index()
	{
		$data['page_title'] = "Login";
		$this->load->view('login', $data);
    }
    
	public function login()
	{
		$user_info = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        );
        
        $login = $this->user_model->login($user_info);

        if ($login > 0) {     

            // set session 
            $this->set_session($user_info);

            $log_data = array(
                'description' => 'logged in',
                'user_id' => $_SESSION['user_id'],
                'date' => date('Y-m-d H:i:s'),
            );

            $this->log_model->insert( $log_data );

            
            // update online status
            $online_status = array(
                'user_id' => $_SESSION['user_id'],
                'onlinestatus' => 1, 
            );
            $this->user_model->update( $online_status );


            $data["response"] = true;

        } else {
            $data["response"] = false;
            $data["message"] = 'Invalid Username/Password. Please try again.';
        }

        echo json_encode($data);
    }

    private function set_session($user_info)
    {
        $user_info = $this->user_model->get_user_info($user_info);
        unset($user_info['password']);
        $user_info['last_action'] = time();
        $this->session->set_userdata($user_info);   
    } 
    
}
