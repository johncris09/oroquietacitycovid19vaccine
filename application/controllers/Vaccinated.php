<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaccinated extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
	public function index()
	{
		$data['page_title'] = "Vaccinated";
		$this->load->view('admin/vaccinated', $data);
    }


    public function add()
    {
    	$data['page_title'] = "Add Vaccinated";
		$this->load->view('admin/add_vaccinated', $data);
    }
	
	public function get_vaccinated()
	{ 
		
		$vaccinated = $this->vaccinated_model->vaccinated();
		if( $vaccinated->num_rows() ){
			foreach($vaccinated as $row){
				$row['lastname'] = ucwords($row['lastname']);
				$row['firstname'] = ucwords($row['firstname']);
				$row['middlename'] = ucwords($row['middlename']);
				$row['date_given'] = date('m/d/Y', strtotime($row['date_given']));
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
			'record_id' => trim($this->input->post('id')),
			'dose' => trim($this->input->post('dose')),
			'batch_number' => trim($this->input->post('batch_number')),
			'date_given' => trim($this->input->post('date_given')),
		); 

		$insert = $this->vaccinated_model->insert($data);

		if($insert){
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
 
		echo json_encode($data); 
	}

	public function edit($id)
	{
    	$data['page_title'] = "Edit Vaccinated";
    	$data['vaccinated'] = $this->vaccinated_model->get_vaccinated($id);
		$this->load->view('admin/edit_vaccinated', $data);
	}



	public function update($id)
	{
		$data = array(
			'vaccinated_id' => $id,
			'record_id' => trim($this->input->post('id')),
			'dose' => trim($this->input->post('dose')),
			'batch_number' => trim($this->input->post('batch_number')),
			'date_given' => trim($this->input->post('date_given')),
		);

		$update = $this->vaccinated_model->update($data);
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
		$delete = $this->vaccinated_model->delete($id);

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

}
