<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Record_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function record()
    {
        return $this->db
            ->where('deletestatus', 0)
            ->where('validated', 'no')
            ->order_by('date_registered','DESC')
        	->get('record');
        	// ->result_array();
    }



    public function validated()
    {
        return $this->db
            ->where('deletestatus', 0)
            ->where('validated', 'yes')
            ->order_by('date_registered','DESC')
            ->get('record')
            ->result_array();
    }
    
    public function insert($data)
    {
        $this->db->db_debug = false;
        $insert = $this->db->insert('record', $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    }

    public function get_record($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('record')
            ->result_array()[0];
    }
    
    public function update($data)
    {  
        $this->db->db_debug = false;
        $update = $this->db->where('id', $data['id'])
            ->update('record', $data); 
        if(!$update && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    } 

    public function delete($id)
    {
        $data = array(
            'deletestatus' => 1
        );
        return $this->db->where('id', $id)
            ->update('record', $data);
    }



    public function number_of_record()
    {
        return $this->db
            ->where('deletestatus', 0)
            ->where('validated ', "no")
            ->get('record')
            ->num_rows();
    }



    public function registered_today()
    {
        return $this->db
            ->where('deletestatus', 0)
            ->where('year(date_registered)', date('Y'))
            ->where('month(date_registered)', date('m'))
            ->where('day(date_registered)', date('d'))
            ->get('record')
            ->num_rows();
    }

    public function record_chart()
    {
        return $this->db
            ->select('count(*) tot, date_registered')
            ->where('deletestatus', 0)
            ->where('date_registered <= CURRENT_DATE() ')
            ->group_by('day(date_registered)')
            ->order_by('date_registered asc')
            ->get('record')
            ->result_array();


    }
    
    public function record_this_week($date)
    {
        return $this->db
            ->select('count(*) tot, date_registered')
            ->where('date(date_registered) =', $date)
            ->where('deletestatus', 0)
            // ->where('date(date_registered) <=', $end_date)
            ->group_by('day(date_registered)')
            ->order_by('date_registered', 'asc')   
            ->get('record')
            ->result_array();
    }

     public function record_this_month($date)
    {
        return $this->db
            ->select('count(*) tot, date_registered')
            ->where('date(date_registered) =', $date)
            ->where('deletestatus', 0)
            // ->where('date(date_registered) <=', $end_date)
            ->group_by('day(date_registered)')
            ->order_by('date_registered', 'asc')   
            ->get('record')
            ->result_array();
    }


    public function record_by_month($date)
    {
        return $this->db
            ->select('count(*) tot, date_registered')
            ->where('deletestatus', 0)
            ->where('year(date_registered) =', date('Y'))
            ->where('month(date_registered) =', date('m', strtotime($date)))
            ->group_by('month(date_registered)')
            ->order_by('date_registered', 'asc')   
            ->get('record')
            ->result_array();
    }


    public function record_by_year($end_year)
    {
        return $this->db
            ->select('count(*) tot, date_registered')
            ->where('deletestatus', 0)
            ->where('year(date_registered) <=', $end_year)
            ->group_by('year(date_registered)')
            ->order_by('date_registered', 'asc')   
            ->get('record')
            ->result_array();
    }

    public function record_by_date_range($start_date, $end_date)
    {
        return $this->db
            ->select('count(*) tot, date_registered')
            ->where('date(date_registered) >=', $start_date)
            ->where('date(date_registered) <=', $end_date)
            ->group_by('day(date_registered)')
            ->order_by('date_registered', 'asc')   
            ->get('record')
            ->result_array();
    }

    public function gender_statistic($gender)
    {
         return $this->db
            ->select('count(*) tot')
            ->where('gender', $gender)
            ->where('record.validated', 'no')
            ->where('deletestatus', 0)
            ->get('record')
            ->result_array()[0]['tot'];
    }


    public function age_statistic($age)
    {
         return $this->db
            ->select('count(*) tot')
            ->where($age)
            ->where('record.validated', 'no')
            ->where('deletestatus', 0)  
            ->get('record')
            ->result_array()[0]['tot'];
    }

    // Barangay Chart
     public function barangay_record_for_pre_registered($barangay)
    {
        return $this->db
            ->select('count(*) tot, date_registered')
            ->where('barangay', $barangay)
            ->where('validated', "no" )
            ->where('deletestatus', 0)
            ->group_by('barangay')   
            ->get('record')
            ->result_array();
    }
    

    public function search($data)
    {
        return $this->db
            ->query('SELECT * FROM validated, record WHERE (firstname LIKE "%'.$data.'%" or lastname LIKE  "%'.$data.'%" or middlename LIKE  "%'.$data.'%") and validated = "yes" and deletestatus = 0 and validated.record_id = record.id ')
            ->result_array();
            // ->like('lastname', $data)
            // ->or_like('firstname', $data)
            // ->or_like('middlename', $data)
            // ->where('validated', 'yes')
            // ->where('deletestatus', 0)
            // ->get_compiled_select('record');
            // ->result_array();
    }

    public function card_release($id)
    {

         return $this->db
            ->where('validated.record_id', $id)
            ->where('validated.record_id = record.id')  
            ->get('validated, record')
            ->result_array()[0];
    }

    public function get_record_schedule( $barangay )
    {
        // generate record schedule
        // SELECT * FROM `record` 
        // where record.validated = "yes"
        // and record.deletestatus = 0
        // and barangay in (select barangay.barangay from assign_barangay, barangay
        // where assign_barangay.barangay = barangay.barangay_id
        // and assign_barangay.vaccination_site = 1)
        // and record.id not in (SELECT vaccination_schedule.record_id FROM `vaccination_schedule`)
        // limit 500
        return $this->db 
            ->where("record.validated", "yes")  
            ->where("record.deletestatus", 0)  
            ->where_in("barangay.barangay", $barangay)
            ->where('record.id not in (SELECT vaccination_schedule.record_id FROM `vaccination_schedule`) ')
            ->where('barangay.barangay = record.barangay ')
            ->order_by('barangay.barangay,record.purok, record.lastname asc')
            ->limit('500')
            ->get("record, barangay")
            ->result_array();
    }

    public function get_deleted_record()
    {
        return $this->db
            ->where('deletestatus', 1)
            ->order_by('date_registered','DESC')
            ->get('record');
            // ->result_array();
    }
}
