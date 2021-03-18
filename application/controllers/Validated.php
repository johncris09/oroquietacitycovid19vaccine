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

	public function insert()
	{

		// insert into record
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
			'validated_by' => $this->session->userdata('user_id'),
		); 


		$record_id = $this->validated_model->insert_validated($data);

		if($record_id){

            $log_data = array(
                'description' => 'added and validated a new record whose name is "' . $data['firstname']  . $data['middlename'] . $data['lastname'] . '"',
                'user_id' => $_SESSION['user_id'],
                'date' => date('Y-m-d H:i:s'),
            );

            $this->log_model->insert( $log_data );



			$data = array(
				'response' => true,
				'message'  => 'Data inserted successfully!',
			);

			// update validated column
			$this->validated_column($record_id);

			// insert into validated
			$this->insert_to_validated($record_id);
  
		}else{ 

			$data = array(
				'response' => false,
				'message'  => 'This value is already in the list.',
				// 'message' => $this->db->error()['message'],
			);
		} 
		
		// $arr = [];
		// if( !empty( $_POST['other-illness']) ) {
		// 	array_push($arr, $_POST['other-illness']);
		// 	// echo 1;
		// }
 
		echo json_encode( $data );
	}

	public function validated_column($id)
	{
		$data = array(
			'id' => $id,
			'validated' => 'Yes',
		);
		$this->record_model->update($data);
	}

	public function insert_to_validated($id)
	{
		$data = array(
			'record_id' => $id,
			'timestamp' => date('Y-m-d H:i:s'),
			'qr_code' => md5(date('Y-m-d H:i:s')),
		);
		$this->validated_model->insert($data);
	}

	public function edit($id)
	{
    	$data['page_title'] = "Edit Record";
    	$data['validated'] = $this->record_model->get_record($id);
		$this->load->view('admin/edit_validated', $data);
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
                'description' => 'updated a record whose name is "' . $data['firstname']  . $data['middlename'] . $data['lastname'] . '"',
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
}
