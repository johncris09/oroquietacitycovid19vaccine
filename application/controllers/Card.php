<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();
    }
    
	public function index()
	{
		$data['page_title'] = "Card Release";
		$this->load->view('admin/search_person', $data);
    }
    
	public function release($id)
	{
		$data['page_title'] = "Card Release";
    	$data['record'] = $this->record_model->card_release($id);
    	// print_r($data['record']);
		$this->load->view('admin/card_release', $data);
    }

    public function add()
    {
    	$data['page_title'] = "Add Record";
		$this->load->view('admin/add_record', $data);
    }

	

	public function search($data)
	{
		$data = $this->record_model->search($data); 
		// foreach ($data as $row) {
		// 	$data['firstname'] = ucwords($row['firstname']);
		// 	$data['middlename'] = ucwords($row['middlename']);
		// 	$data['lastname'] = ucwords($row['lastname']);
		// 	$data['id'] = $row['id'];
		// }
		echo json_encode($data);
	}
}