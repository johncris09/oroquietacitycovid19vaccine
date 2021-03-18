<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller { 

    public function __construct()
    {
        parent:: __construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
	public function index()
	{
		$data['page_title'] = "Dashboard";
        $data['number_of_user'] = $this->user_model->number_of_user();
        $data['number_of_pre_registered'] = $this->record_model->number_of_record();
        $data['registered_today'] = $this->record_model->registered_today();
        $data['number_of_vaccinated'] = $this->vaccinated_model->number_of_vaccinated();
        $data['number_of_validated'] = $this->validated_model->number_of_validated();
        $data['number_of_online_user'] = $this->user_model->number_of_online_user();
		$this->load->view('admin/dashboard', $data);

    }

    public function signout()
    { 
        
        $all_sessions = $this->session->all_userdata();



        // unset all sessions
        foreach ($all_sessions as $key => $val) {
            $this->session->unset_userdata($key);
        }

         redirect('login');
    } 


    public function record_chart()
    {
        // $_POST['filter_by'] = 'week';
        $data = [];
        if($_POST['filter_by'] == 'this month'){
            $start_date = date('Y-m-d', strtotime('first day of this month'));
            $end_date   = date('Y-m-d', strtotime('today'));
            $today = (int)date('d', strtotime('today'));

            while (strtotime($start_date) <= strtotime($end_date)) {
                $date = $start_date;
                // echo (int)date('d', strtotime($date));
                // if($today == (int)date('d', strtotime($date))){
                //     break;
                // }else{
                //     continue;
                // }
                $record = $this->record_model->record_this_month($date); 
                if(!empty($record)){
                    $data['pre_registered'][]       = $record[0]['tot'];
                    $data['categories'][]           = date('d', strtotime($date));
                }else{
                    $data['pre_registered'][]       = 0;
                    $data['categories'][]           = date('d', strtotime($date));
                }


                $validated = $this->validated_model->validated_this_month($date); 
                if(!empty($validated)){
                    $data['validated'][]        = $validated[0]['tot'];
                }else{
                    $data['validated'][]        = 0;
                }
                $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($date)));
            }



            $start_date = date('Y-m-d', strtotime('first day of this month'));
            $from           = date('M. d, Y', strtotime($start_date));
            $to             = date('M. d, Y', strtotime($end_date));
            $data['range']  = $from . ' - ' . $to;

        }else if($_POST['filter_by'] == 'week'){

            $start_date = date('Y-m-d',  strtotime('previous ' . date('l',  strtotime('today')) . ' +1 day'));
            $end_date   = date('Y-m-d',  strtotime('today'));
            $begin      = new DateTime($start_date);
            $end        = new DateTime($end_date);
            $interval   = DateInterval::createFromDateString('1 day');
            $period     = new DatePeriod($begin, $interval, $end);
            foreach ($period as $dt) {
                $date   = $dt->format("Y-m-d");
                $record = $this->record_model->record_this_week($date);
                if(!empty($record)){
                    $data['pre_registered'][]         = $record[0]['tot'];
                    $data['categories'][]   = date('D', strtotime($date));
                }else{
                    $data['pre_registered'][]         = 0;
                    $data['categories'][]   = date('D', strtotime($date));
                }


                $validated = $this->validated_model->validated_this_week($date);
                if(!empty($validated)){
                    $data['validated'][]         = $validated[0]['tot'];
                }else{
                    $data['validated'][]         = 0;
                }
                
            }
            $from           = date('M. d, Y', strtotime($start_date));
            $to             = date('M. d, Y', strtotime($end_date));
            $data['range']  = $from . ' - ' . $to;

        }else if($_POST['filter_by'] == 'month'){ 
            $start_date = date('M. Y', strtotime(date('Y-01')));
            $end_date   = date('M. Y', strtotime(date('Y-12')));
            for($i = 1 ; $i <= 12; $i++){
                $date = date('Y-m-d', strtotime( date('Y') . '/' . $i . '/01'));
                if( date('m', strtotime('this month')) == $i ){
                    $record = $this->record_model->record_by_month($date);
                    if(!empty($record)){
                        $data['pre_registered'][]       = $record[0]['tot'];
                        $data['categories'][]           = date('M', strtotime($date));
                    }else{
                        $data['pre_registered'][]       = 0;
                        $data['categories'][]           = date('M', strtotime($date));
                    }


                    $validated = $this->validated_model->validated_by_month($date);
                    if(!empty($validated)){
                        $data['validated'][]       = $validated[0]['tot'];
                    }else{
                        $data['validated'][]       = 0;
                    }

                    break;

                }else{
                    $record = $this->record_model->record_by_month($date);
                    if(!empty($record)){
                        $data['pre_registered'][]         = $record[0]['tot'];
                        $data['categories'][]   = date('M', strtotime($date));
                    }else{
                        $data['pre_registered'][]         = 0;
                        $data['categories'][]   = date('M', strtotime($date));
                    }


                    $validated = $this->validated_model->validated_by_month($date);
                    if(!empty($validated)){
                        $data['validated'][]       = $validated[0]['tot']; 
                    }else{
                        $data['validated'][]       = 0;
                    }

                    continue;
                }
                
            }


            $from    = date('M. Y', strtotime($start_date));
            $to      = date('M. Y', strtotime($end_date));
            $data['range'] = $from . ' - ' . $to;

        }else if($_POST['filter_by'] == 'year'){
            $end_year = date('Y');

            $record = $this->record_model->record_by_year($end_year);
            foreach($record as $row){
                $data['pre_registered'][]     = $row['tot'];
                $data['categories'][] = date('Y', strtotime($row['date_registered']));
            }

            $validated = $this->validated_model->validated_by_year($end_year);
            foreach($validated as $row){
                $data['validated'][]     = $row['tot'];
            }

            $to = date('Y', strtotime($end_year));
            $data['range'] = $data['categories'][0] . ' - ' . $to;

        }else{

            $start_date = date('Y-m-d', strtotime(date($_POST['filter_by'][0])));
            $end_date   = date('Y-m-d', strtotime(date($_POST['filter_by'][1])));

            $record = $this->record_model->record_by_date_range($start_date, $end_date);
            $data['record'] = $record;
            foreach($record as $row){
                $data['data'][]     = $row['tot'];
                $data['categories'][] = date('m/d/y', strtotime($row['date_registered']));
            }

            $from    = date('M. d, Y', strtotime($start_date));
            $to      = date('M. d, Y', strtotime($end_date));
            $data['range'] = $from . ' - ' . $to;

        }


        echo json_encode($data);
    }

    public function gender_statistic()
    {
        $lst = ['male', 'female'];
        foreach ($lst as $gender) {
            $data['data'][] = (int)$this->record_model->gender_statistic($gender);
        }

        echo json_encode($data);
    }

    public function age_statistic()
    {
        $lst = [
            ' timestampdiff(year, birthdate, curdate()) >= 18 and timestampdiff(year, birthdate, curdate()) <= 25', 
            ' timestampdiff(year, birthdate, curdate()) >= 26 and timestampdiff(year, birthdate, curdate()) <= 35', 
            ' timestampdiff(year, birthdate, curdate()) >= 36 and timestampdiff(year, birthdate, curdate()) <= 59', 
            ' timestampdiff(year, birthdate, curdate()) > 60', 
        ];
        foreach ($lst as $age) {
            $data['data'][] = (int)$this->record_model->age_statistic($age);
        }

        echo json_encode($data);
    }



}
