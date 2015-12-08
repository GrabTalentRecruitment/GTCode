<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Login_Database extends CI_Model {
    
    // 0. Site Admin Area - Start
    // Read data using username and password
    public function site_adminlogin($data) {
        
        $condition = "admin_email =" . "'" . $data['username'] . "' AND " . "admin_password =" . "'" . md5($data['password']) . "'";
        $this->db->select('*')->from('admin_login')->where($condition);
        $query = $this->db->get();        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    // Read data from database to show data in Site admin page
    public function read_admin_information($data) {
        
        $condition = "admin_email =" . "'" . $data . "'";
        $this->db->select('*')->from('admin_login')->where($condition)->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    // 1. Recruiter Area - Start
    // Force User to change password on first login.
    public function recruiterfirstlogin($data) {
        
        $condition = "employer_email =" . "'" . $data . "'";
        $this->db->select('*')->from('employer_login')->where($condition);
        $query = $this->db->get();        
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data using username and password
    public function employerlogin($data) {
        
        $condition = "employer_email =" . "'" . $data['username'] . "' AND " . "employer_password =" . "'" . md5($data['password']) . "'";
        $this->db->select('*')->from('employer_login')->where($condition);
        $query = $this->db->get();        
        if ($query->num_rows() > 0) { return true; } else { return false; }
    }
    
    // Read data from database to show all timezone
    public function get_candidate_cnt($arr_JobNum) {
        
        $this->db->select('count(*) as cnt')->from('candidate_application')->where_in('candidate_appln_job_id', $arr_JobNum);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    public function get_employer_information($rec_Info) {
        
        $condition = "employer_contact_email =" . "'" . $rec_Info . "'";
        $this->db->select('employer_code, employer_name, employer_contact_firstname, employer_contact_lastname, employer_contact_email, employer_active')->from('employers')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    } 
    
    // To check if employer exists - Used in Recruiter (Function name: changepasswd)
    public function check_employer($empEmail) {
        
        $condition = "employer_email =" . "'" . $data['username'] . "'";
        $this->db->select('*')->from('employer_login')->where($condition);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // 1. Recruiter Area - End
    
    // 2. Candidate Area - Start
    // Force User to change password on first login.
    public function candidatefirstlogin($data) {
        
        $condition = "candidate_email =" . "'" . $data . "'";
        $this->db->select('*')->from('candidate_login')->where($condition);
        $query = $this->db->get();        
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data using username and password
    public function candidatelogin($data) {
        
        $condition = "candidate_email =" . "'" . $data['emailaddress'] . "' AND " . "candidate_password =" . "'" . md5($data['password']) . "'";
        $this->db->select('*')->from('candidate_login')->where($condition);
        $query = $this->db->get();        
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
        
    // Insert registration data in database
    public function registration_insert($data) {
        
        // Query to check whether username already exist or not
        $condition = "candidate_email =" . "'" . $data['candidate_email'] . "'";
        $this->db->select('*')->from('candidate_login')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $this->db->insert('candidate_login', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }
    
    // Fetch Candidate Reference Id
    public function fetch_job_details($data) {
        
        $condition = "employer_contact_email =" . "'" . $data . "'";
        $this->db->select('employer_address, employer_description')->from('employers')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Update Candidate Profile
    public function profile_update($data,$candidemail) {
        
        // Query to check whether username already exist or not
        $condition = "candidate_email =" . "'" . $candidemail . "'";
        $this->db->select('*')->from('candidate_signup')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $this->db->where('candidate_email', $candidemail);
            $this->db->update('candidate_signup', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
    
    // Forgot Password Email check for candidate
    public function forgot_candpasswdemailchk($sess_array) {
        
        $condition = "candidate_email =" . "'" . $sess_array . "'";
        $this->db->select('*')->from('candidate_login')->where($condition);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Check forgot password email.
    public function forgot_emppasswdemailchk($sess_array) {
        
        $condition = "employer_email =" . "'" . $sess_array . "'";
        $this->db->select('*')->from('employer_login')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    // Posted jobs for Candidate
    public function candidate_job_dashboard($data) {
        
        $condition = "job_posted = 'on' AND (job_mandatory_skills LIKE ".$data.") OR (job_desired_skills LIKE ".$data.")";
        $this->db->select('*')->from('jobs')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    // To check candidate details before updating 
    public function candidate_resumeupdatecheck($dataVal) {
        
        $condition = "candidate_email =" . "'" . $dataVal . "'";
        $this->db->select('*')->from('candidate_signup')->where($condition);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Fetch Candidate Reference Id
    public function fetch_cand_refId($data) {
        
        $condition = "candidate_email =" . "'" . $data['email'] . "'";
        $this->db->select('*')->from('candidate_login')->where($condition);
        $query = $this->db->get();
        foreach ($query->result_array() as $row) { return $row['candidate_ref_id']; }
    }
    
    // Update Candidate Stage
    public function candidate_UpdapplnStage($data, $stageName) {
          
        $this->db->where('candidate_email', $data['candidate_email']);
        $this->db->where('candidate_appln_job_id', $data['candidate_appln_job_id']);
        $this->db->update('candidate_application',array('candidate_appln_stage' => $stageName));
        return $this->db->affected_rows();
    }
    
    // 2. Candidate Area - End
    
    // 3. General Area - Start
    // Read Login user information to show data in admin page
    public function read_user_information($sess_array, $type) {
        
        if($type == 'candidate') {
            
            $condition = "candidate_email =" . "'" . $sess_array['username'] . "'";
            $this->db->select('*')->from('candidate_signup')->where($condition);
            $query = $this->db->get();
            if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
                
        } else if($type == 'employer') {
            
            $condition = "employer_contact_email =" . "'" . $sess_array['username'] . "'";
            $this->db->select('employer_code, employer_name, employer_contact_firstname, employer_contact_lastname, employer_contact_email, employer_active')->from('employers')->where($condition);
            $query = $this->db->get();
            if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
            
        }
    }
    
    // Read data from database to show data in admin page
    public function job_dashboard($sess_array) {
        
        $condition = "job_created_by =" . "'" . $sess_array . "'";
        $this->db->select('job_number, job_title, job_minsalary_currency, job_minmonth_salary, job_maxsalary_currency, job_maxmonth_salary, job_primaryworklocation_country, job_primaryworklocation_city, job_industry, job_posted')->from('jobs')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show data in admin page
    public function read_job_information($data) {
        
        $condition = "job_number =" . "'" . $data . "'";
        $this->db->select('*')->from('jobs')->where($condition)->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show data in admin page
    public function read_client_information($data) {
        
        $condition = "employer_contact_email =" . "'" . $data . "'";
        $this->db->select('employer_name')->from('employers')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show data in admin page
    public function read_employer_information($data) {
        
        $condition = "employer_code =" . "'" . $data . "'";
        $this->db->select('*')->from('employers')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show data in admin page
    public function read_candidate_information($data) {
        
        $condition = "candidate_coderefs_id =" . "'" . $data . "'";
        $this->db->select('*')->from('candidate_signup')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show data in admin page
    public function read_all_employers() {
        
        $condition = "employer_active ='Yes'";
        $this->db->select('*')->from('employers')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show data in admin page
    public function read_all_candidates() {
        
        $this->db->select('*')->from('candidate_signup');
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show data in admin page
    public function read_all_jobs() {
        
        $condition = "job_active ='Yes'";
        $this->db->select('*')->from('jobs')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show data in admin page
    public function upd_CandRef_tbls($data) {
        
        $cnt = 0;
        $Upddata = array( 'candidate_email' => $data['newcandidate_email'] );
        
        // Update in Candidate Login Table
        $this->db->where('candidate_email', $data['oldcandidate_email'] );
        $this->db->update('candidate_login', $Upddata);
        if($this->db->affected_rows() == '1') { $cnt++; } else { $cnt = 0; }
        
        if($cnt > 0 ) {
            
            // Update in Candidate Signup Table
            $this->db->where('candidate_email', $data['oldcandidate_email'] );
            $this->db->update('candidate_signup', $Upddata);
            if($this->db->affected_rows() == '1') { $cnt++; } else { $cnt = $cnt + 0; }
            
            // Update in Candidate Education Table
            $this->db->where('candidate_email', $data['oldcandidate_email'] );
            $this->db->update('candidate_education', $Upddata);
            if($this->db->affected_rows() == '1') { $cnt++; } else { $cnt = $cnt + 0; }
            
            // Update in Candidate Employment Table
            $this->db->where('candidate_email', $data['oldcandidate_email'] );
            $this->db->update('candidate_employment', $Upddata);
            if($this->db->affected_rows() == '1') { $cnt++; } else { $cnt = $cnt + 0; }
            
            // Update in Candidate Application Table
            $this->db->where('candidate_email', $data['oldcandidate_email'] );
            $this->db->update('candidate_application', $Upddata);
            if($this->db->affected_rows() == '1') { $cnt++; } else { $cnt = $cnt + 0; }
            
        } else {
            $cnt = $cnt;
        }
        
        return $cnt;
    }
    
    // 3. General Area - End
    
    // Read data from database to show data in admin page
    public function applnTracking_candName($sess_array) {
        
        $condition = "candidate_email =" . "'" . $sess_array . "'";
        $this->db->select('candidate_firstname, candidate_lastname')->from('candidate_signup')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show candidate applications status
    public function applnStage_candName($post_data,$post2_data) {
        
        $condition = "candidate_coderefs_id =" . "'" . $post_data . "' AND candidate_appln_job_id =" . "'" . $post2_data . "'";
        $this->db->select('candidate_appln_stage')->from('candidate_application')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show data in admin page
    public function read_jobs_history($job_data) {
        
        $condition = "job_id =" . "'" . $job_data . "' ORDER BY job_status_modified_date DESC LIMIT 1";
        $this->db->select('job_status_comments')->from('job_history')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // Read data from database to show all timezone
    public function timezone_list() {
        
        $this->db->select('timezone_id, timezone_name, timezone_utc, timezone_city')->from('grabtalent_timezone')->order_by("timezone_utc", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return $query->result_array(); } else { return false; }
    }
    
    // To get candidate application status in order to change the "Apply" button to "Applied"
    public function candidate_profilepercent($candSkillscnt, $candRefcnt, $candAcadDetcnt, $candWorkExpcnt) {
        $totalpercent = 0;
        if( $candSkillscnt > 0 ) { $totalpercent += 25; }
        if( $candRefcnt > 0 ) { $totalpercent += 25; }
        if( $candAcadDetcnt > 0 ) { $totalpercent += 25; }
        if( $candWorkExpcnt > 0 ) { $totalpercent += 25; }
        return $totalpercent;
    }
    
    // To get candidate application status in order to change the "Apply" button to "Applied"
    public function get_candidate_applnSts($candEmail, $jobNum) {
        
        $this->db->select('*')->from('candidate_application')->where('candidate_email',$candEmail)->where('candidate_appln_job_id',$jobNum);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Read data from database to get candidate References count for percentage
    public function get_candidateRef_cnt($candRefId) {
        
        $this->db->select('count(*) as cnt')->from('candidate_references')->where('candidate_ref_id', $candRefId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // Read data from database to get Acadmeic Details count for percentage
    public function get_academicDet_cnt($candRefId, $candEmail) {
        
        $this->db->select('count(*) as cnt')->from('candidate_education')->where('candidate_ref_id', $candRefId)->where('candidate_email', $candEmail);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // Read data from database to get Work Experience Details count for percentage
    public function get_workExp_cnt($candRefId, $candEmail) {
        
        $this->db->select('count(*) as cnt')->from('candidate_employment')->where('candidate_ref_id', $candRefId)->where('candidate_email', $candEmail);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // Read jobCategory from database
    public function get_jobCategory() {
        
        $this->db->select('*')->from('job_category')->order_by("job_category_name", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // Read jobIndustry from database
    public function get_jobIndustry() {
        
        $this->db->select('*')->from('job_industry')->order_by("job_industry_name", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // Read All Candidate Country names from database
    public function get_candCountry($countryname) {
        
        $this->db->select('*')->from('candidate_country')->where('country_name', $countryname);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // Set All Candidate Country names from database
    public function set_candCountry() {
        
        $this->db->select('*')->from('candidate_country')->order_by("country_name", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // Read All Candidate Country names from database
    public function get_candKeywordmatch() {
        
        $this->db->select('*')->from('candidate_country')->where('country_name', $countryname);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // Set All Candidate Country names from database
    public function set_candKeywordmatch() {
        
        $this->db->select('*')->from('candidate_tblkeywordmatch');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // To get candidate application status in order to change the "Apply" button to "Applied"
    public function candidate_skillrating($candSkillscnt) {
        $totalpercent = '';
        if( $candSkillscnt == 1 ) { $totalpercent = 'Basic'; }
        if( $candSkillscnt == 2 ) { $totalpercent = 'Intermediate'; }
        if( $candSkillscnt >= 3 ) { $totalpercent = 'Advanced'; }
        return $totalpercent;
    }
    
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        //return print_r($string);
        if ( array_key_exists("h", $string) || array_key_exists("d", $string) ) { 
            return $string ? implode(', ', $string) . ' ago' : 'just now';  
        } else { 
            return $string ? 'in '.implode(', ', $string) : 'just now'; 
        }
    }
    
}
?>