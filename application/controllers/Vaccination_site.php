<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaccination_site extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
	public function index()
	{
		if( strtolower( $_SESSION['role_type'] )  == "super admin" ){
	    	$data['page_title'] = "Vaccination Site";
			$this->load->view('admin/vaccination_site', $data);
    	}else{
    		show_404();
    	}
    }


    public function add()
    {
    	if( strtolower( $_SESSION['role_type'] )  == "super admin" ){
	    	$data['page_title'] = "Add Vaccination Site";
			$this->load->view('admin/add_vaccination_site', $data);
    	}else{
    		show_404();
    	}	
    }
    

	public function get_vaccination_site()
	{ 
		$data = [];
		$vaccination_site = $this->vaccination_site_model->vaccination_site();
		foreach($vaccination_site as $row){
			// unset($row['password']);
			// $row['dateregistered'] = date('M d, Y h:i:s a', strtotime($row['dateregistered']));
			// $row['firstname'] = ucwords($row['first_name']);
			// $row['lastname'] = ucwords($row['last_name']);
			// $row['middlename'] = ucwords($row['middle_name']);
			// $row['extension'] = ucwords($row['extension']);
			$row['Actions']  = null;
			$data['data'][] = $row; 

		} 
		echo json_encode($data);
	}

	public function insert()
	{
		$data = array(
			'vaccination_site' => trim($this->input->post('vaccination_site')),
		); 

		$insert = $this->vaccination_site_model->insert($data);
		if($insert > 0){

            $log_data = array(
                'description' => 'added a new vaccination site whose name is "' . strtolower( $data['vaccination_site'] )  . '"',
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
				'message'  => 'Data already exists.',
				// 'message' => $this->db->error()['message'],
			);
		} 
		echo json_encode($data); 
	}

	public function edit($id)
	{
		if( strtolower( $_SESSION['role_type'] )  == "super admin"    ){
			$data['page_title'] = "Edit vaccination Site";
	    	$data['vaccination_site'] = $this->vaccination_site_model->get_vaccination_site($id);
			$this->load->view('admin/edit_vaccination_site', $data);
    	}else{
    		show_404();
    	}
    }



	public function update($id)
	{
		$data = array(
			'vaccination_site_id' => $id,
			'vaccination_site' => trim($this->input->post('vaccination_site')),
		);

		$update = $this->vaccination_site_model->update($data);
		if($update > 0){


            $log_data = array(
                'description' => 'updated a vaccination site whose name is "' . strtolower( $data['vaccination_site'] )  . '"',
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
		$delete = $this->vaccination_site_model->delete($id);

		if($delete){

            $log_data = array(
                'description' => 'deleted vaccination site whose name id is "' . $id . '"',
                'user_id' => $_SESSION['user_id'],
                'date' => date('Y-m-d H:i:s'),
            );

            $this->log_model->insert( $log_data );

            // delete also the assigned barangay
            $this->vaccination_site_model->delete_assign_barangay($id);

            
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




	public function delete_completely($id)
	{
		$delete = $this->vaccination_site_model->delete_completely($id);

		if($delete){

            $log_data = array(
                'description' => 'vaccination site completely deleted whose id is ' . $id,
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


    public function assign_barangay()
    {
    	if( strtolower( $_SESSION['role_type'] )  == "super admin" ){
	    	$data['page_title'] = "Assign Barangay";
	    	$data['vaccination_site'] = $this->vaccination_site_model->vaccination_site();
	    	$data['barangay'] = $this->barangay_model->barangay();
	    	$data['assign_barangay'] = $this->vaccination_site_model->assign_barangay();
	    	// print_r($data['assign_barangay']);
			$this->load->view('admin/assign_barangay', $data);
    	}else{
    		show_404();
    	}	
    }

    public function truncate_table()
    {
		$this->vaccination_site_model->truncate_table();
    }

    public function insert_assign_barangay()
    {
		// $data = array(
		// 	'vaccination_site' => $this->input->post('vaccination_site'),
		// 	'barangay' => $this->input->post('barangay'),
		// );

		


		// $insert = $this->vaccination_site_model->insert_assign_barangay($data);
		// if($insert > 0){

  //           // $log_data = array(
  //           //     'description' => 'added a new vaccination site whose name is "' . strtolower( $data['vaccination_site'] )  . '"',
  //           //     'user_id' => $_SESSION['user_id'],
  //           //     'date' => date('Y-m-d H:i:s'),
  //           // );

  //           // $this->log_model->insert( $log_data );


		// 	$data = array(
		// 		'response' => true,
		// 		'message'  => 'Data inserted successfully!',
		// 	);
  
		// }else{ 
		// 	$data = array(
		// 		'response' => false,
		// 		'message'  => 'Data already exists.',
		// 		// 'message' => $this->db->error()['message'],
		// 	);
		// }
		// $data = $_POST['data'];
		// $i = 0;
		// foreach ($_POST['data'] as $row) {
		// 	// $row[]
		// 	// $data[] = array(
		// 	// 	'vaccination_site' => $row['vaccination_site']

		// 	// );
		// 	// $data[] = $row[$i]['vaccination_site'];
		// 	$data[] = $row;
		// 	$i++;
		// }
		// $data = count( $_POST['data'] );
		
		// for( $i = 0 ; $i < count( $_POST['data'] ) ; $i++ ){
		// 	for ( $j = 0 ; $j < count( $_POST['data'][$i] ) ; $j++  ) {
		// 		// $data[] = $_POST['data'][$i][$j]['vaccination_site'];
		// 		print_r($_POST['data']);
		// 		// print_r($j);
		// 	}
		// 	// $data = $_POST['data'][$i];

		// 	// array_push($data, var)
		// 	// $data[] = $i;

		// }
		// $data = $_POST['data'][0];
		


		// create an array for batch insert
		for($i = 0 ; $i  < count( $_POST['data'] ) ; $i++){
			if( isset( $_POST['data'][$i][1]['barangay']  )){
				for($j = 0 ; $j  < count( $_POST['data'][$i][1]['barangay'] ) ; $j++){
					$data[] = array(
						 'vaccination_site' => $_POST['data'][$i][0]['vaccination_site'] ,
						 'barangay' => $_POST['data'][$i][1]['barangay'][$j]
					);
				}
			}else{
				echo 0;
			}
		}

		$this->vaccination_site_model->truncate_table(); // truncate first the table then
		$insert = $this->vaccination_site_model->insert_assign_barangay($data); // insert the data

		if($insert > 0){  
			$data = array(
				'response' => true,
				'message'  => 'Data inserted successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Data already exists.',
				// 'message' => $this->db->error()['message'],
			);
		}
    	echo json_encode( $data );
    }

    public function restore_vaccination_site($id)
	{
		$data = array(
			"vaccination_site_id" => $id,
			"deletestatus " => 0,
		);

		$update = $this->vaccination_site_model->update($data);
		if($update > 0){

            $log_data = array(
                'description' => 'restore a vaccination site whose id is ' . $id,
                'user_id' => $_SESSION['user_id'],
                'date' => date('Y-m-d H:i:s'),
            );

            $this->log_model->insert( $log_data );

			$data = array(
				'response' => true,
				'message'  => 'Data restored successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Data not restore!',
			);
		} 
		// $data = $data;
		echo json_encode($data); 
	}
}
