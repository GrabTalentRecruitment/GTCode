<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        
        $this->config = array(
            'start_day' => 'monday',
            'show_next_prev'  => TRUE,
            'next_prev_url' => https_url( $this->lang->lang().'/recruiter/calendar' )
        );
        
        $this->config['template'] = '
            <div class="table-responsive">
            
                {table_open}<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered">{/table_open}
                
                {heading_row_start}<tr>{/heading_row_start}
                
                {heading_previous_cell}<th><a href="{previous_url}"><span class="fa fa-arrow-left"></span></a></th>{/heading_previous_cell}
                {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
                {heading_next_cell}<th><a href="{next_url}"><span class="fa fa-arrow-right"></span></a></th>{/heading_next_cell}
                
                {heading_row_end}</tr>{/heading_row_end}
                
                {week_row_start}<tr>{/week_row_start}
                {week_day_cell}<td class="days">{week_day}</td>{/week_day_cell}
                {week_row_end}</tr>{/week_row_end}
                
                {cal_row_start}<tr>{/cal_row_start}
                {cal_cell_start}<td>{/cal_cell_start}
                
                {cal_cell_content}
                    <div>{day}<br />{content}</div>
                {/cal_cell_content}
                {cal_cell_content_today}
                    <div class="highlight">{day}<br />{content}</div>
                {/cal_cell_content_today}
                
                {cal_cell_no_content}{day}{/cal_cell_no_content}
                {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}
                
                {cal_cell_blank}&nbsp;{/cal_cell_blank}
                
                {cal_cell_end}</td>{/cal_cell_end}
                {cal_row_end}</tr>{/cal_row_end}
                
                {table_close}</table>{/table_close}
            </div>
        ';
    }
    
    function calendar_generate($year, $month){
        
        $this->load->library('calendar',$this->config);
        
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        
        $calendar_data = $tmpcalendar_data = $candIntvwDet = array();
        
        $condition = "system_created_by = '".$recruiterEmail."'";
        $this->db->select('*')->from('candidate_interview')->where($condition);
        $query = $this->db->get();
        foreach( $query->result_array() as  $intervDet) {            
            $tmpjobName = $this->login_database->read_job_information( $intervDet['candidate_IntvwJobId'] );
            
            // Split Interview Date & Time
            $candinterviewDate = explode(" ", $intervDet['candidate_Pri_IntvwDateTime']);
            $candName = $this->login_database->read_candidate_information($intervDet['candidate_IntvwCandidId']);
            
            foreach( $candName as $candidDet) {
                $tmpcalendar_data[$candinterviewDate[0]] = $candidDet['candidate_firstname']." ".$candidDet['candidate_lastname'];
            }
        }
        foreach( $tmpcalendar_data as $key=>$rowData) {
            $cal_date = substr($key,8,2);
            $cal_month = substr($key,5,2);
            $cal_year = substr($key,0,4);
            if($cal_date < 10) {
                $cal_date = substr($cal_date,1,2);
            }
            $condition = "candidate_Pri_IntvwDateTime like '".$key."%'";
            $this->db->select('*')->from('candidate_interview')->where($condition);
            $query = $this->db->get();
            $calendar_data[$cal_year][$cal_month][$cal_date] = "<span class='badge'>".$query->num_rows()."</span>";
        }
                
        return $this->calendar->generate($year, $month, $calendar_data );
        
    }
}

/* End of file avature_signup_model.php */
/* Location: ./application/models/avature_signup_model.php */
