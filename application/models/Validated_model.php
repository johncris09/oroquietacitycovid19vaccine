<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validated_model extends CI_Model
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
            ->order_by('timestamp','DESC')
        	->get('record')
        	->result_array();
    }



    public function validated()
    {
        return $this->db
            ->where('validated.record_id = record.id')
            ->where('record.validated', 'yes')
            ->order_by('validated.timestamp','DESC')
            ->get('record, validated');
            // ->result_array();
    }

    public function number_of_validated()
    {
        return $this->db
            ->where('validated', "yes")
            ->where('deletestatus', 0)
            ->get('record')
            ->num_rows();
    }


    public function insert($data)
    {
        $this->db->db_debug = false;
        $insert = $this->db->insert('validated', $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    }

    public function insert_validated($data)
    {
        $this->db->db_debug = false;
        $insert = $this->db->insert('record', $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return $this->db->insert_id();
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
        $this->db->where('record_id', $id); 
        if(!$this->db->delete('validated')){
            return false;
        }else{
            return true;
        }
    }



     public function validated_this_month($date)
    {
        return $this->db
            ->select('count(*) tot, timestamp')
            ->where('date(timestamp) =', $date)
            // ->where('date(timestamp) <=', $end_date)
            ->group_by('day(timestamp)')
            ->order_by('timestamp', 'asc')   
            ->get('validated')
            ->result_array();
    }


    
    public function validated_this_week($date)
    {
        return $this->db
            ->select('count(*) tot, timestamp')
            ->where('date(timestamp) =', $date)
            // ->where('date(timestamp) <=', $end_date)
            ->group_by('day(timestamp)')
            ->order_by('timestamp', 'asc')   
            ->get('validated')
            ->result_array();
    }



    public function validated_by_month($date)
    {
        return $this->db
            ->select('count(*) tot, timestamp')
            ->where('year(timestamp) =', date('Y'))
            ->where('month(timestamp) =', date('m', strtotime($date)))
            ->group_by('month(timestamp)')
            ->order_by('timestamp', 'asc')   
            ->get('validated')
            ->result_array();
    }

    public function validated_by_year($end_year)
    {
        return $this->db
            ->select('count(*) tot, timestamp')
            ->where('year(timestamp) <=', $end_year)
            ->group_by('year(timestamp)')
            ->order_by('timestamp', 'asc')   
            ->get('validated')
            ->result_array();
    }



    // Barangay Chart
     public function barangay_record_for_validated($barangay)
    {
        return $this->db
            ->select('count(*) tot, date_registered')
            ->where('barangay', $barangay)
            ->where('validated', "yes" )
            ->where('deletestatus', 0)
            ->group_by('barangay')   
            ->get('record')
            ->result_array();
    }


    public function validated_gender_statistic($gender)
    {
         return $this->db
            ->select('count(*) tot')
            ->where('gender', $gender)
            ->where('record.validated', 'yes')
            ->where('deletestatus', 0)
            ->get('record')
            ->result_array()[0]['tot'];
    }


    
    public function validated_age_statistic($age)
    {
         return $this->db
            ->select('count(*) tot')
            ->where($age)
            ->where('record.validated', 'yes')
            ->where('deletestatus', 0)  
            ->get('record')
            ->result_array()[0]['tot'];
    }
 
}
