<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller { 

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
			$data['page_title'] = "Schedule";
			$this->load->view('admin/schedule', $data);
    	}else{
    		show_404();
    	}
			
    }


    public function add()
    {
    	if( strtolower( $_SESSION['role_type'] )  == "super admin" ){
	    	$data['page_title'] = "Create Schedule";
            $data['vaccination_site'] = $this->vaccination_site_model->vaccination_site();
			$this->load->view('admin/add_schedule', $data);
    	}else{
    		show_404();
    	}
    }


    public function get_schedule()
    { 
        $schedule = $this->schedule_model->schedule();
        if( $schedule->num_rows() ){
            foreach( $schedule->result_array() as $row ){
                unset($row['password']);
                $row['date'] = date('m/d/Y', strtotime($row['date']));
                $row['created_on'] = date('m/d/Y h:i:s a', strtotime($row['created_on']));
                $row['Actions']  = null;
                $data['data'][] = $row; 

            }
        }else{
            $data['data'] = array();
        }

        echo json_encode($data);
    } 



    public function generate()
    {
        $out = '';
        $counter = 0;
        $vaccination_site  = $_POST['vaccination_site'];
        // $vaccination_site  = 1;
        $barangay =  $this->barangay_model->get_barangay( $vaccination_site );

        foreach ($barangay as $row) {
            $brgy[] = $row['barangay'];
        }

        $record = $this->record_model->get_record_schedule( $brgy );
        foreach ($record as $row) {
            $out .= '
                <tr>
                    <td>'.++$counter.'</td>
                    <td>'. $row['barangay']  .'</td>
                    <td>'. $row['purok']  .'</td>
                    <td data-record-id="'.$row['id'].'">'. strtoupper($row['lastname']) . ', ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename'])  .'</td>
                    <td>'. $row['contactnumber'] .'</td>
                </tr>
            ';
        }

        $data = $out;

        echo json_encode($data);
    }

    public function insert()
    {
        // $data = $_POST;

        $data = array(
            'date' => date( 'Y-m-d', strtotime($this->input->post('date')) ),
            'vaccination_site' => $_POST['vaccination_site'],
            'created_by' => $_SESSION['user_id'],
            'created_on' =>  date('Y-m-d H:i:s'),
        );

        $schedule_id = $this->schedule_model->insert($data);

        
        if($schedule_id){

            foreach ($_POST['record_id'] as $row) {
                $vaccination_schedule = array(
                    'record_id' => $row,
                    'schedule_id ' => $schedule_id
                );
                $this->vaccination_schedule_model->insert($vaccination_schedule);
            }

            // $log_data = array(
            //     'description' => 'added a new record whose name is "' . strtolower($data['firstname'] . ' ' . $data['middlename'] . ' ' . $data['lastname']) . '"',
            //     'user_id' => $_SESSION['user_id'],
            //     'date' => date('Y-m-d H:i:s'),
            // );

            // $this->log_model->insert( $log_data );

            $data = array(
                'response' => true,
                'message'  => 'Data inserted successfully!',
            );
  
        }else{ 
            $data = array(
                'response' => false,
                'message'  => 'This value is already in the list.',
                // 'message' => $this->db->error()['message'],
            );
        }

        echo json_encode( $data);


    }

	
	public function delete($id)
	{
		$delete = $this->schedule_model->delete($id);

		if($delete){
			

			// remove vaccination schedule
			$this->vaccination_schedule_model->delete_completely($id);

			// log
            $log_data = array(
                'description' => 'deleted a schedule whose id is "' . $id . '"',
                'user_id' => $_SESSION['user_id'],
                'date' => date('Y-m-d H:i:s'),
            );

            $this->log_model->insert( $log_data );
            

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
}
