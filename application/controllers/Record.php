<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();
    }
    
	public function index()
	{
		$data['page_title'] = "Record";
		$this->load->view('admin/record', $data);
    }

    public function add()
    {
    	$data['page_title'] = "Add Record";
		$this->load->view('admin/add_record', $data);
    }

	
	public function get_record()
	{ 
		$data = [];
		$record = $this->record_model->record();
		foreach($record as $row){
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
			'birthdate' => $this->input->post('birthdate'), 
			'registeredvoter' => $this->input->post('registeredvoter'), 
			'governmentissuedid' => $this->input->post('governmentissuedid'), 
			'idnumber' => $this->input->post('idnumber'), 
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
			'pregnant' => $this->input->post('Pregnant'), 
			'breastfeed' => $this->input->post('Breastfeed'), 
			'ClinicalStudy' => $this->input->post('ClinicalStudy'),
		); 

		$insert = $this->record_model->insert($data);
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
		echo json_encode( $data ); 
	}

	public function edit($id)
	{
    	$data['page_title'] = "Edit Record";
    	$data['record'] = $this->record_model->get_record($id);
    	// print_r($data['record']);
		$this->load->view('admin/edit_record', $data);
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
			'birthdate' => $this->input->post('birthdate'), 
			'registeredvoter' => $this->input->post('registeredvoter'), 
			'governmentissuedid' => $this->input->post('governmentissuedid'), 
			'idnumber' => $this->input->post('idnumber'), 
			'occupation' => $this->input->post('occupation'), 
			'covidpositive' => $this->input->post('CovidPositive'), 
			'covidpositivecontact' => $this->input->post('CovidPositiveContact'), 
			'travelled' => $this->input->post('Travelled'), 
			'mingled' => $this->input->post('Mingled'), 
			'optionIllness_1' => implode (", ", $this->input->post('OptionIllness_1')),
			'dogbite' => $this->input->post('DogBite'), 
			'vaccinelast4weeks' => $this->input->post('VaccineLast4Weeks'), 
			'bloodtransfusion' => $this->input->post('BloodTransfusion'), 
			'takedrugs' => $this->input->post('TakeDrugs'), 
			'allergy' => $this->input->post('Allergy'), 
			'vaccinereaction' => $this->input->post('VaccineReaction'), 
			'optionIllness_2' => implode (", ", $this->input->post('OptionIllness_2')),
			'pregnant' => $this->input->post('Pregnant'), 
			'breastfeed' => $this->input->post('Breastfeed'), 
			'ClinicalStudy' => $this->input->post('ClinicalStudy'),
		); 

		$insert = $this->record_model->update($data);
		if($insert > 0){
			$data = array(
				'response' => true,
				'message'  => 'Data updated successfully!',
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

	public function delete($id)
	{
		$delete = $this->record_model->delete($id);

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

	public function view($id)
	{
    	$data['page_title'] = "View Record";
    	$data['record'] = $this->record_model->get_record($id);
		$this->load->view('admin/view_record', $data);
	}
}