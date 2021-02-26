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
         // $this->db->cache_on();
        return $this->db
            ->where('deletestatus', 0)
            ->order_by('timestamp','DESC')
        	->get('record')
        	->result_array();
    }


    public function insert($data)
    { 
        $insert = $this->db->insert('record', $data); 
        if(!$insert && $this->db->error()['code'] == 1062){
            return 0;
        }else{
            return $insert;
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
        return $this->db->where('id', $data['id'])
            ->update('record', $data); 
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
            ->get('record')
            ->num_rows();
    }



    public function registered_today()
    {
        return $this->db
            ->where('deletestatus', 0)
            ->where('year(timestamp)', date('Y'))
            ->where('month(timestamp)', date('m'))
            ->where('day(timestamp)', date('d'))
            ->get('record')
            ->num_rows();
    }

    public function record_chart()
    {
        return $this->db
            ->select('count(*) tot, timestamp')
            ->where('deletestatus', 0)
            ->where('timestamp <= CURRENT_DATE() ')
            ->group_by('day(timestamp)')
            ->order_by('timestamp asc')
            ->get('record')
            ->result_array();


    }
    
    public function record_this_week($date)
    {
        return $this->db
            ->select('count(*) tot, timestamp')
            ->where('date(timestamp) =', $date)
            // ->where('date(timestamp) <=', $end_date)
            ->group_by('day(timestamp)')
            ->order_by('timestamp', 'asc')   
            ->get('record')
            ->result_array();
    }

     public function record_this_month($date)
    {
        return $this->db
            ->select('count(*) tot, timestamp')
            ->where('date(timestamp) =', $date)
            // ->where('date(timestamp) <=', $end_date)
            ->group_by('day(timestamp)')
            ->order_by('timestamp', 'asc')   
            ->get('record')
            ->result_array();
    }


    public function record_by_month($date)
    {
        return $this->db
            ->select('count(*) tot, timestamp')
            ->where('year(timestamp) =', date('Y'))
            ->where('month(timestamp) =', date('m', strtotime($date)))
            ->group_by('month(timestamp)')
            ->order_by('timestamp', 'asc')   
            ->get('record')
            ->result_array();
    }


    public function record_by_year($end_year)
    {
        return $this->db
            ->select('count(*) tot, timestamp')
            ->where('year(timestamp) <=', $end_year)
            ->group_by('year(timestamp)')
            ->order_by('timestamp', 'asc')   
            ->get('record')
            ->result_array();
    }

    public function record_by_date_range($start_date, $end_date)
    {
        return $this->db
            ->select('count(*) tot, timestamp')
            ->where('date(timestamp) >=', $start_date)
            ->where('date(timestamp) <=', $end_date)
            ->group_by('day(timestamp)')
            ->order_by('timestamp', 'asc')   
            ->get('record')
            ->result_array();
    }

    public function gender_statistic($gender)
    {
         return $this->db
            ->select('count(*) tot')
            ->where('gender', $gender)
            ->where('deletestatus', 0)  
            ->get('record')
            ->result_array()[0]['tot'];
    }

    public function age_statistic($age)
    {
         return $this->db
            ->select('count(*) tot')
            ->where($age)
            ->where('deletestatus', 0)  
            ->get('record')
            ->result_array()[0]['tot'];
    }
}
