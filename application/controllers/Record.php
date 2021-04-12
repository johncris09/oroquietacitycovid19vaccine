<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
	public function index()
	{
		$data['page_title'] = "Pre Registered";
		$this->load->view('admin/record', $data);
    }

    public function add()
    {
    	if( strtolower( $_SESSION['role_type'] )  == "super admin" || strtolower( $_SESSION['role_type'] )  == "sub admin" ){
	    	$data['page_title'] = "Add Pre Registered";
			$this->load->view('admin/add_record', $data);
    	}else{
    		show_404();
    	}
    }

	
	public function get_record()
	{ 
		$record = $this->record_model->record();
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

		echo json_encode($data);
	} 

	public function insert()
	{
		$data = array(
			'lastname' => trim($this->input->post('lastname')),
			'firstname' => trim($this->input->post('firstname')),
			'middlename' => trim($this->input->post('middlename')),
			'gender' => $this->input->post('gender'), 
			'contactnumber' => trim($this->input->post('contactnumber')),
			'purok' => $this->input->post('purok'), 
			'street' => trim($this->input->post('street')),
			'barangay' => trim($this->input->post('barangay')),
			'birthdate' => date('Y-m-d', strtotime($this->input->post('birthdate'))),
			'registeredvoter' => $this->input->post('registeredvoter'), 
			'governmentissuedid' => $this->input->post('governmentissuedid'), 
			'idnumber' => $this->input->post('idnumber'), 
			'date_registered' => date( 'Y-m-d', strtotime($this->input->post('date_registered')) ), 
			'position' => $this->input->post('position'),
			'occupation' => $this->input->post('occupation'), 
			'covidpositive' => $this->input->post('CovidPositive'), 
			'covidpositivecontact' => $this->input->post('CovidPositiveContact'), 
			'travelled' => $this->input->post('Travelled'), 
			'mingled' => $this->input->post('Mingled'), 
			'optionIllness_1' => !empty($_POST['OptionIllness_1']) ?  implode (", ", $this->input->post('OptionIllness_1'))  : '' ,
			'dogbite' => $this->input->post('DogBite'), 
			'vaccinelast4weeks' => $this->input->post('VaccineLast4Weeks'), 
			'bloodtransfusion' => $this->input->post('BloodTransfusion'), 
			'takedrugs' => $this->input->post('TakeDrugs'), 
			'allergy' => $this->input->post('Allergy'), 
			'vaccinereaction' => $this->input->post('VaccineReaction'), 
			'optionIllness_2' => !empty($_POST['OptionIllness_2']) ?  implode (", ", $this->input->post('OptionIllness_2'))  : ''  ,
			'other_illness' => $this->input->post('other_illness'),
			'pregnant' => $this->input->post('Pregnant'), 
			'breastfeed' => $this->input->post('Breastfeed'), 
			'ClinicalStudy' => $this->input->post('ClinicalStudy'),
			'encoded_by' => $this->session->userdata('user_id'),
		); 

		// $data['optionIllness_2'] = trim( $data['optionIllness_2'] . $_POST['other-illness'] );

		$insert = $this->record_model->insert($data);
		if($insert){


            $log_data = array(
                'description' => 'added a new record whose name is "' . strtolower($data['firstname'] . ' ' . $data['middlename'] . ' ' . $data['lastname']) . '"',
                'user_id' => $_SESSION['user_id'],
                'date' => date('Y-m-d H:i:s'),
            );

            $this->log_model->insert( $log_data );

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
		
		$arr = [];
		if( !empty( $_POST['other-illness']) ) {
			array_push($arr, $_POST['other-illness']);
			// echo 1;
		}
 
		echo json_encode( $data );
	}

	public function edit($id)
	{
		if( strtolower( $_SESSION['role_type'] )  == "super admin" || strtolower( $_SESSION['role_type'] )  == "sub admin" ){
	    	$data['page_title'] = "Edit Pre Registered";
	    	$data['record'] = $this->record_model->get_record($id);
			$this->load->view('admin/edit_record', $data);
    	}else{
    		show_404();
    	}

	}

	public function update($id)
	{
		$data = array(
			'id' => $id,
			'lastname' => trim($this->input->post('lastname')),
			'firstname' => trim($this->input->post('firstname')),
			'middlename' => trim($this->input->post('middlename')),
			'gender' => $this->input->post('gender'), 
			'contactnumber' => trim($this->input->post('contactnumber')),
			'purok' => $this->input->post('purok'), 
			'street' => trim($this->input->post('street')),
			'barangay' => trim($this->input->post('barangay')),
			'birthdate' => date('Y-m-d', strtotime($this->input->post('birthdate'))),
			'registeredvoter' => $this->input->post('registeredvoter'), 
			'governmentissuedid' => $this->input->post('governmentissuedid'), 
			'idnumber' => $this->input->post('idnumber'), 
			'date_registered' => date( 'Y-m-d', strtotime($this->input->post('date_registered')) ),
			'position' => $this->input->post('position'),
			'occupation' => $this->input->post('occupation'), 
			'covidpositive' => $this->input->post('CovidPositive'), 
			'covidpositivecontact' => $this->input->post('CovidPositiveContact'), 
			'travelled' => $this->input->post('Travelled'), 
			'mingled' => $this->input->post('Mingled'), 
			'optionIllness_1' => !empty($_POST['OptionIllness_1']) ?  implode (", ", $this->input->post('OptionIllness_1'))  : '' ,
			'dogbite' => $this->input->post('DogBite'), 
			'vaccinelast4weeks' => $this->input->post('VaccineLast4Weeks'), 
			'bloodtransfusion' => $this->input->post('BloodTransfusion'), 
			'takedrugs' => $this->input->post('TakeDrugs'), 
			'allergy' => $this->input->post('Allergy'), 
			'vaccinereaction' => $this->input->post('VaccineReaction'), 
			'optionIllness_2' => !empty($_POST['OptionIllness_2']) ?  implode (", ", $this->input->post('OptionIllness_2'))  : '' ,
			'other_illness' => $this->input->post('other_illness'),
			'pregnant' => $this->input->post('Pregnant'), 
			'breastfeed' => $this->input->post('Breastfeed'), 
			'ClinicalStudy' => $this->input->post('ClinicalStudy'),
		);
		

		$update = $this->record_model->update($data);
		if($update > 0){

            $log_data = array(
                'description' => 'updated a record whose name is "' . strtolower($data['firstname'] . ' ' . $data['middlename'] . ' ' . $data['lastname']) . '"',
                'user_id' => $_SESSION['user_id'],
                'date' => date('Y-m-d H:i:s'),
            );

            $this->log_model->insert( $log_data );

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
		$delete = $this->record_model->delete($id);

		if($delete){


            $log_data = array(
                'description' => 'deleted a record whose id is "' . $id . '"',
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

	public function view($id)
	{
    	$data['page_title'] = "View Record";
    	$data['record'] = $this->record_model->get_record($id);
		$this->load->view('admin/view_record', $data);
	}

	public function search($data)
	{
		$data = $this->record_model->search($data);
		echo json_encode($data);
	}
}
