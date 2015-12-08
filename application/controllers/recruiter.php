<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recruiter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load session library
        $this->load->library('session');
        $this->load->library('email');
        
        // Load form helper library
        $this->load->helper(array('form', 'url'));
        $this->load->helper('view_helper');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->helper('download');
        
        $this->lang->load('common');
                
        // Load database Model
        $this->load->model('login_database');
        
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
            $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            redirect($url);
            exit;
        }
                        
    }
    
    // Employer Portal login page with user-email and password.
    public function index() {
	$this->db->flush_cache();
        $session_items = array('job_detail' => '', 'recruiter_login' => '', 'recruiter_data' => '', 'user_data' => '');
        $this->session->unset_userdata($session_items);
        
        $head_params = array(
            'title' => 'Recruiter Portal | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/index_header', null, true);
        $template["contents"] = $this->load->view('recruiter/index', null, true);
        $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
        $this->load->view('common/recruiter/layout', $template);
    }
    
    // Employer login check
    public function recruiter_loginCheck() {
        
        $data = array( 'username' => $this->input->post('emailaddress'), 'password' => $this->input->post('password') );
        $result = $this->login_database->employerlogin($data);
        
        if($result > 0){
            $recruiterEmail = $this->input->post('emailaddress');
            $this->session->set_userdata('recruiter_login', $recruiterEmail);
            set_cookie(COOKIE_LOGGEDIN, $recruiterEmail, COOKIE_EXPIRES);
            
            $recruiterloginData = $this->login_database->recruiterfirstlogin($recruiterEmail);
	    //print_r($recruiterloginData);
            if(str_replace(array("-", " ", ":"), "", $recruiterloginData[0]['system_modified_date'])*1>0){
		$redirect_url = https_url($this->lang->lang().'/recruiter/dashboard');
            } else {
		$redirect_url = https_url($this->lang->lang().'/recruiter/changepassword');
            }
            
            // If the user has already logged in            
            echo "success;".$redirect_url;
            return true;
        } else {
            echo "failure;Invalid Username or Password";
            log_message('error', $this->input->post('emailaddress').' could not login to our portal');
            return false;
        }
        
    }
    
    // Reset Password Page view
    public function resetpassword() {    

        $head_params = array(
            'title' => 'Recruiter Reset Password | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/index_header', null, true);
        $template["contents"] = $this->load->view('recruiter/resetpassword', null, true);
        $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
        $this->load->view('common/recruiter/layout', $template);
    }
    
    // Function to change temporary password
    public function changepassword(){
    	
    	$recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
	        
        // Get Recruiter Information and store to session.
        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
        
        $head_params = array(
            'title' => 'Recruiter Dashboard | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            'loggedin_User' => $loggedInuser
        );
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/header', null, true);
        $template["contents"] = $this->load->view('recruiter/changepassword', null, true);
        $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
        $this->load->view('common/recruiter/layout', $template);
    }
    
    // Function to Change Password
    public function changetemppasswd() {
	
	$objDateTime = date('Y-m-d H:i:s');
	
        // To initially check if the email is registered in the system.
        $condition = "employer_email ='" . $this->input->post('email') . "'";
        $this->db->select('*')->from('employer_login')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array('employer_password' => md5($this->input->post('password')), 'system_modified_date' => $objDateTime);
            $this->db->where('employer_email', $this->input->post('email'));
            $this->db->update('employer_login', $data);
            if($this->db->trans_status() == '1') {
                echo "success;Your password has been changed successfully";
            } else {
                echo "failure;Something was wrong, please try again later";
            }
        } else {
            return false;
        }
    }
    
    // Function to Change Password
    public function changepasswd() {
    
        $plaintext_string = base64_decode(strtr($this->input->post('email'), '-_', '+/'));
        
        // To initially check if the email is registered in the system.
        $condition = "employer_email =" . "'" . $plaintext_string . "'";
        $this->db->select('*')->from('employer_login')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array('employer_password' => md5($this->input->post('password'))  );
            $this->db->where('employer_email', $plaintext_string);
            $this->db->update('employer_login', $data);
            if($this->db->trans_status() == '1') {
                echo "success;Your password has been changed successfully";
            } else {
                echo "failure;Something was wrong, please try again later";
            }
        } else {
            return false;
        }
    }
    
    // Forgot Password Page view
    public function forgotpassword() {
        
        $head_params = array(
            'title' => 'Recruiter Forgot Password | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/index_header', null, true);
        $template["contents"] = $this->load->view('recruiter/forgotpassword', null, true);
        $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
        $this->load->view('common/recruiter/layout', $template);
    }
    
    // Send forgot password link to recruiters email.    
    public function sendforgotpwd() {
        
        $email_chk = $this->login_database->forgot_emppasswdemailchk($this->input->post("email"));
        if($email_chk == TRUE) {
            $message = $this->load->view('common/recruiter/forgotpass',array('email' => $this->input->post("email")),true);
            $this->email->set_newline("\r\n");
            $this->email->from('do-not-reply@grab-talent.com','do-not-reply@grab-talent.com'); // change it to yours
            $this->email->to($this->input->post("email"));// change it to yours
            $this->email->subject('Reset your Grab Talent Password');
            $this->email->message($message);
            if($this->email->send()) {
                echo "success; Please check your email for new password!";
            } else {
                echo "failure; Email was not sent, please try again.";
                $this->db->trans_rollback();
            }
        } else {
            echo "failure; This email is not registered with us!";
        }
    }
    
    public function dashboard() {
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
	        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
	        
	        // Get Recruiter Information and store to session.
	        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
	        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
	        
	        $head_params = array(
	            'title' => 'Recruiter Dashboard | Grab Talent',
	            'description' => "Grab Talent is the best online recruitment portal",
	            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
	            'loggedin_User' => $loggedInuser
	        );
	        
	        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
	        $template["header"] = $this->load->view('common/recruiter/header', null, true);
	        $template["contents"] = $this->load->view('recruiter/dashboard', null, true);
		$template["footer"] = $this->load->view('common/recruiter/footer', null, true);
	        $this->load->view('common/recruiter/layout', $template);
	} else {
            redirect( https_url($curr_lang.'/recruiter') );
        }
    }
    
    // Change password
    public function change_recruiter_password() {
        
        $newpassword = md5($this->input->post('newpassword')); 
        
        // To initially check if the email is registered in the system.
        $condition = "employer_email =" . "'" . $this->input->post('employer-email') . "'";
        $this->db->select('*')->from('employer_login');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array('employer_password' => $newpassword);
            $this->db->where('employer_email', $this->input->post('employer-email'));
            $this->db->update('employer_login', $data);
            if($this->db->trans_status() == '1') {
                echo "success";
            } else {
                echo "failure";
                $this->db->trans_rollback();
            }
        } else {
            return false;
        }
    }
    
    // Recruiter profile page view.
    public function candidate_list() {
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Candidate List | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/candidate_list', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Recruiter applicant job tracking & list page view.
    public function applicant_job_view() {
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Applicant Job View | '.$this->uri->segment(4).' | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/applicant_job_view', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Recruiter applicant tracking & list page view.
    public function applicant_view() {
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Applicant View | '.$this->uri->segment(4).' | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/applicant_view', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Recruiter upload offer Letter modal window
    public function candidate_offerupload() { $this->load->view('recruiter/candidate_offerupload'); }
    
    public function candidate_resumedownload () {
        
    	$file_url = "./public/candidate/".$this->uri->segment(4);
    	$data = file_get_contents($file_url); // Read the file's contents
    	$name = $this->uri->segment(4);
    	echo force_download($name, $data);
        
    }
    
    // Recruiter profile page view.
    public function candidate() {
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Candidate Page | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/candidate', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Recruiter profile page view.
    public function profile() {
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Recruiter Profile | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/profile', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Recruiter profile update.
    public function profile_update() {
        // 1. Updated Profile data        
        $recruiter_profupd = array(
            'employer_phone' => $this->input->post('inputPhonenumber'),
            'employer_fax' => $this->input->post('inputFaxnumber'),
            'employer_contact_firstname' => $this->input->post('inputEmpctntFirstName'),
            'employer_contact_lastname' => $this->input->post('inputEmpctntLastName'),
            'employer_address' => $this->input->post('inputEmpContactAddress'),
            'employer_description' => $this->input->post('inputbriefDesc')                                             
        );
        $this->db->where('employer_contact_email', $this->input->post('profile-email'));
        $this->db->update('employers', $recruiter_profupd);
        if($this->db->trans_status() == '1') {
            echo "success;Your Profile has been updated successfully!!";
            // 2. Refresh session data
            $this->session->unset_userdata('recruiter_data');
            $sess_array = array('username' => $this->session->userdata('recruiter_login'));
            $empinfo = $this->login_database->read_user_information($sess_array,'employer');
            $this->session->set_userdata('recruiter_data', $empinfo);
        } else {
            echo "failure;Profile was not updated, please try again!";
        }
    }
    
    // Recruiter Job page view.
    public function job() {
    
    	$recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
    	
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
	        
	        // Get Recruiter Information and store to session.
	        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
	        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
	        
	        $head_params = array(
	            'title' => 'Recruiter Job Page | Grab Talent',
	            'description' => "Grab Talent is the best online recruitment portal",
	            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
	            'loggedin_User' => $loggedInuser
	        );
	        
	        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
	        $template["header"] = $this->load->view('common/recruiter/header', null, true);
	        $template["contents"] = $this->load->view('recruiter/job', null, true);
	        $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
	        $this->load->view('common/recruiter/layout', $template);
	        
        } else {
            log_message('error', 'Session Expired for '.$recruiterEmail);
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Create job page view.
    public function job_create() {
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Create Job | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/job_create', null, true);
            $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
            $this->load->view('common/recruiter/layout', $template);
            
        } else {
            log_message('error', 'Session Expired for '.$recruiterEmail);
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Edit job page view.
    public function job_edit() {
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Edit Job | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/job_edit', null, true);
            $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
            $this->load->view('common/recruiter/layout', $template);
            
        } else {
            log_message('error', 'Session Expired for '.$recruiterEmail);
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Job status change
    public function job_deactivate(){
        
        $email = $this->session->userdata('recruiter_login');
        // update Job to inactive in jobs table from post array.
        $jobUpddata = array(
            'job_active'                => 'No',
            'job_last_modified_date'    => date('Y-m-d h:m:s'),
            'job_posted'                => 'off'
        );
        
        $this->db->where('job_number', $this->input->post('JobUpdId'));
        $this->db->update('jobs', $jobUpddata);
        if($this->db->trans_status() == '1') {
            echo "success:Successfully updated job details, this window will close shortly.";
            // Update Job history table
            $jobHisUpddata = array(
                'job_id'                    => $this->input->post('JobUpdId'),
                'job_prevstage'             => 'Yes',
                'job_nextstage'             => 'No',
                'job_status_comments'       => htmlEntities($this->input->post('jobStatusComments')),
                'job_status_modified_by'    => $email,
                'job_status_modified_date'  => date('Y-m-d h:m:s')
            );
            $this->db->insert('job_history', $jobHisUpddata);
        } else {
            echo "failure:Job details update failed, please try again!";
            log_message('error', 'Job details were not updated for '.$this->input->post('JobUpdId'));
            $this->db->trans_rollback();
        }
        
    }
    
    // Create job page view.
    public function applicant_tracking() {
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Applicant Tracking System | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/applicant_tracking', null, true);
            $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
            $this->load->view('common/recruiter/layout', $template);
        
        } else {
            log_message('error', 'Session Expired for '.$recruiterEmail);
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    public function applicant_tracking_stepChange(){
        
        $email = $this->session->userdata('recruiter_login');
        // update candidate step in application table from post array.
        $data = array(
            'candidate_appln_stage'                 => $this->input->post('candStepname'),
            'cand_appln_last_modified_date'         => date('Y-m-d h:m:s')
        );
        
        $this->db->where('candidate_coderefs_id', $this->input->post('candidateRefCode'));
        $this->db->where('candidate_appln_job_id', $this->input->post('candidateJobId'));
        $this->db->update('candidate_application', $data);
        if($this->db->trans_status() == '1') {
            echo "success:Candidate stage update successful, this window will refresh automatically!!";
            $historydata = array(
                'candidate_coderefs_id'             => $this->input->post('candidateRefCode'),
                'candidate_appln_job_id'            => $this->input->post('candidateJobId'),
                'candidate_appln_prevstage'         => $this->input->post('candidateprevStepname'),
                'candidate_appln_nextstage'         => $this->input->post('candStepname'),
                'candidate_appln_change_by'         => $email,
                'candidate_appln_change_date'       => date('Y-m-d h:m:s')
            );
            $this->db->insert('candidate_application_history', $historydata);
        } else {
            echo "failure:Candidate stage update failed, please try again!";
            log_message('error', 'Candidate Stage was not updated for '.$this->input->post('candidateRefCode').'for job '.$this->input->post('candidateJobId'));
            $this->db->trans_rollback();
        }
        
    }
    
    // Schedule Interview.
    public function applicant_interview() {
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Schedule Interview Page | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/applicant_interview', null, true);
            $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
            $this->load->view('common/recruiter/layout', $template);
        
        } else {
            log_message('error', 'Session Expired for '.$recruiterEmail);
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Change candidate status to interview and save interview details.
    public function applicant_interview_action(){
                
        $candIntvwEmail_body = htmlspecialchars_decode($this->input->post('cand_email_Body'));
        $candEmail_subj = htmlspecialchars_decode($this->input->post('cand_email_subject'));
        
        // update candidate step in application table from post array.        
        $candemailDet = $this->login_database->read_candidate_information( $this->input->post('candidateRefId') );
        $candemailAddress = $candemailDet[0]['candidate_email'];
        
        $data = array(
            'candidate_IntvwCandidId'               => $this->input->post('candidateRefId'),
            'candidate_IntvwJobId'                  => $this->input->post('candidateJobRefId'),
            'candidate_Pri_IntvwDateTime'           => $this->input->post('cand_prim_intvwDateTime'),
            'candidate_Pri_IntvwTimezone'           => $this->input->post('cand_prim_intvwtimezone'),
            'candidate_Pri_IntvwLocation'           => $this->input->post('cand_prim_location'),
            'candidate_Interviewer_Primary'         => $this->input->post('cand_prim_interviewer'),
            'candidate_email_address'               => $candemailDet[0]['candidate_email'],
            'Interview_email_sent'                  => 'No',
            'system_created_by'                     => $this->input->post('rec_emailaddress'),
            'system_created_date'                   => date('Y-m-d h:m:s')            
        );        
        $this->db->insert('candidate_interview', $data);
        
        if($this->db->trans_status() === FALSE) {
            echo "failure:Candidate stage update failed, please try again!";                        
        } else {
            // Function to update candidate stage in Candidate Application table.
            $interview_Updarr = array('candidate_appln_job_id' => $this->input->post('candidateJobRefId'), 'candidate_email' => $candemailAddress );
            $candintvwstgUpdate = $this->login_database->candidate_UpdapplnStage( $interview_Updarr, 'Interview' );
            
            // If the candidate stage update is successful then update Send out email to candidate.                        
            if($candintvwstgUpdate == 1) {
            	echo "success:Candidate stage update successful, please close this window to be redirected.";
            	$message = $this->load->view('common/recruiter/interviewLetterTemplate',array('InterviewEmailbody' => $candIntvwEmail_body),true);
    	        $this->email->set_newline("\r\n");
    	        $this->email->from($this->input->post('rec_emailaddress'),$this->input->post('rec_emailaddress')); // change it to yours
    	        $this->email->to($candemailAddress);// change it to yours
    	        $this->email->subject($candEmail_subj);
    	        $this->email->message($message);
    	        if($this->email->send()) {
    	           echo "Email send to candidate!";
    	        } else {
    	           echo "Email was not sent, please try again.";
    	           log_message('error', 'Something was wrong with email sending for email to - '.$candEmail);
    	        }
            }
        }
    }
    
    // Move candidate stage to Offer.
    public function applicant_offer() {
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Offer Page | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/applicant_offer', null, true);
            $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
            $this->load->view('common/recruiter/layout', $template);
        
        } else {
            log_message('error', 'Session Expired for '.$recruiterEmail);
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Change candidate status to interview and save interview details.
    public function applicant_offer_action(){
                
        $candOfferEmail_body = htmlspecialchars_decode($this->input->post('cand_offeremail_Body'));
        $candEmail_subj = htmlspecialchars_decode($this->input->post('cand_email_subject'));
        
        // update candidate step in application table from post array.        
        $candemailDet = $this->login_database->read_candidate_information( $this->input->post('candidateRefId') );
        $candemailAddress = $candemailDet[0]['candidate_email'];        
        
        $data = array(
            'candidate_OfferCandidId'               => $this->input->post('candidateRefId'),
            'candidate_OfferJobId'                  => $this->input->post('candidateJobRefId'),
            'candidate_OfferDateTime'               => date('Y-m-d h:m:s'),
            'candidate_email_address'               => $candemailAddress,
            'Offer_email_sent'                      => 'No',
            'system_created_by'                     => $this->input->post('rec_emailaddress'),
            'system_created_date'                   => date('Y-m-d h:m:s')            
        );        
        $this->db->insert('candidate_offer', $data);
        
        if($this->db->trans_status() === FALSE) {
            echo "failure:Candidate stage update failed, please try again!";                        
        } else {
            // Function to update candidate stage in Candidate Application table.
            $offer_Updarr = array('candidate_appln_job_id' => $this->input->post('candidateJobRefId'), 'candidate_email' => $candemailAddress );
            $candofferstgUpdate = $this->login_database->candidate_UpdapplnStage( $offer_Updarr, 'Offer' );
            
            // If the candidate stage update is successful then update Send out email to candidate.                        
            if($candofferstgUpdate == 1) {
            	echo "success:Candidate stage update successful, please close this window to be redirected.";
            	$message = $this->load->view('common/recruiter/OfferLetterTemplate',array('OfferEmailbody' => $candOfferEmail_body),true);
    	        $this->email->set_newline("\r\n");
    	        $this->email->from($this->input->post('rec_emailaddress'),$this->input->post('rec_emailaddress')); // change it to yours
    	        $this->email->to($candemailAddress);// change it to yours
    	        $this->email->subject($candEmail_subj);
    	        $this->email->message($message);
    	        if($this->email->send()) {
    	           echo "Email was sent to candidate!";
    	        } else {
    	           echo "Email was not sent, please try again.";
    	           log_message('error', 'Something was wrong with email sending for email to - '.$candemailAddress);
    	        }
            }
        }
    }
    
    // Email Template Page view.
    public function email_settings() {
        
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Email Templates Page | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/email_settings', null, true);
            $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
            $this->load->view('common/recruiter/layout', $template);
    
        } else {
            log_message('error', 'Session Expired for '.$recruiterEmail);
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // Offer Template Page view.
    public function offeremail_template() {
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Edit Offer Template Page | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/offeremail_template', null, true);
            $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
            $this->load->view('common/recruiter/layout', $template);
        
        } else {
            log_message('error', 'Session Expired for '.$recruiterEmail);
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // To update Offer Email Text into DB.
    public function offeremail_templupdate() {
        
        // 1. Updated Menu Settings data
        if( $this->input->post('method') == 'edit' ) {
            $offrtmpl_arrayupd = array( 
                'template_offer' => $this->input->post('templateOffer'),
                'template_modified_date' => date('Y-m-d h:m:s')
            );
            $this->db->where('employer_contact_email', $this->input->post('employerEmail'));
            $this->db->update('grabtalent_template', $offrtmpl_arrayupd);
        } else {            
            $offrtmpl_arrayins = array( 
                'employer_code' => $this->input->post('employerCode'),
                'employer_name' => $this->input->post('employerName'),
                'employer_contact_email' => $this->input->post('employerEmail'),
                'template_offer' => $this->input->post('templateOffer'),
                'template_created_date' => date('Y-m-d h:m:s')
            );
            $this->db->insert('grabtalent_template', $offrtmpl_arrayins);
        }
        
        if($this->db->affected_rows() > 0) {
            echo "success;Offer template Text was updated successfully.";
        } else {
            echo "failure;Something went wrong, please try again.";
            log_message('error', 'Offer Template was not updated for employer-code '.$this->input->post('employerCode'));
        }
    }
    
    // Offer Template Page view.
    public function interviewemail_template() {
        
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'Edit Interview Template Page | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/interviewemail_template', null, true);
            $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
            $this->load->view('common/recruiter/layout', $template);
    
        } else {
            log_message('error', 'Session Expired for '.$recruiterEmail);
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // To update Interview Email Text into DB.
    public function interviewemail_templupdate() {
        
        // 1. Updated Menu Settings data
        if( $this->input->post('method') == 'edit' ) {
            $offrtmpl_arrayupd = array( 
                'template_interview' => $this->input->post('templateInterview'),
                'template_modified_date' => date('Y-m-d h:m:s')
            );
            $this->db->where('employer_contact_email', $this->input->post('employerEmail'));
            $this->db->update('grabtalent_template', $offrtmpl_arrayupd);
        } else {            
            $offrtmpl_arrayins = array( 
                'employer_code' => $this->input->post('employerCode'),
                'employer_name' => $this->input->post('employerName'),
                'employer_contact_email' => $this->input->post('employerEmail'),
                'template_interview' => $this->input->post('templateInterview'),
                'template_created_date' => date('Y-m-d h:m:s')
            );
            $this->db->insert('grabtalent_template', $offrtmpl_arrayins);
        }
        if($this->db->affected_rows() > 0) {
            echo "success;Interview template Text was updated successfully.";
        } else {
            echo "failure;Something went wrong, please try again.";
            log_message('error', 'Interview Template was not updated for employer-code '.$this->input->post('employerCode'));
        }
    }
    
    // Function to create new jobs.
    public function job_register() {
        
        //To retrieve email from session.
        $email = $this->session->userdata('recruiter_login');
                
        // Check validation for user input in SignUp form
        $this->load->model('grabtalent_job_model');
                        
        $JobModels = $this->_saveJobs(
            $this->input->post('inputJobTitle'),
            $this->input->post('inputJobMinSalCurrCode'),
            $this->input->post('inputJobMinSalary'),
            $this->input->post('inputJobMinSalCurrCode'),
            $this->input->post('inputJobMaxSalary'),
            $this->input->post('inputJobSalDisp'),
            $this->input->post('inputJobMandatorySkl'),
            $this->input->post('inputJobPriworklocctry'),
            $this->input->post('inputJobPriworkloccity'),
            $this->input->post('inputJobHRcontactname'),
            $this->input->post('inputJobHRcontactemail'),
            $this->input->post('inputJobHiringMgrname'),
            $this->input->post('inputJobHiringMgremail'),
            $this->input->post('inputJobCategory'),
            $this->input->post('inputJobFunction'),
            $this->input->post('inputJobIndustry'),
            $this->input->post('inputJobSubIndustry'),
            $this->input->post('inputJobDescription'),
            $this->input->post('inputJobBenefits'),
            $this->input->post('inputJobWorkingHours'),
            $this->input->post('inputJobMethod'),
            $email
        );
        
        if($this->db->trans_status() == '1') {
            $skillpostVal = explode(",", $this->input->post('inputJobMandatorySkl') );
	    foreach( $skillpostVal as $skillVal) {
	    	$data = array( 'job_ref_id' => $JobModels, 'job_skill_name' => $skillVal, 'job_skill_created_date' => date('Y-m-d h:m:s') );
	    	$this->db->insert('job_skills', $data); 
	    }
            echo "success:".https_url($this->lang->lang().'/recruiter/job/'.$JobModels).";Your Job was saved successfully, redirecting to job page!";
            
        } else {
            echo "failure;Your Job was not saved, please try again!";
            log_message('error', sprintf('DB transaction failed. Last query: %s', print_r($this->main_db->last_query(), TRUE)));
            $this->db->trans_rollback();
        }
    }
    
    // To save / register jobs into job table.
    private function _saveJobs($jobTitle, $jobMinSalCode, $jobMinSal, $jobMaxSalCode, $jobMaxSal, $jobDisplay, $mandtSkills, $jobPriwrkctry, $jobPriwrkcity, $jobHRContact, $jobHRContactEmail, $jobHiringMgrContact, $jobHiringMgrContactEmail, $jobCategory, $jobFunction, $jobIndustry, $jobSubIndustry, $jobDesc, $jobBenefits, $jobWorkinghrs, $jobPosted, $createdBy) {

        $JobModels = array();

        $this->db->trans_start();                                

        // setup password
        $JobModel = new grabtalent_job_model();
        $JobModel->row['job_number']                         = 'JOB-'.date('ym').'-'.mt_rand(10000000, 99999999);
        $JobModel->row['job_title']                          = $jobTitle;
        $JobModel->row['job_salarydisplay']                  = $jobDisplay;
        $JobModel->row['job_minsalary_currency']             = $jobMinSalCode;
        $JobModel->row['job_minmonth_salary']                = $jobMinSal;
        $JobModel->row['job_maxsalary_currency']             = $jobMaxSalCode;
        $JobModel->row['job_maxmonth_salary']                = $jobMaxSal;
        $JobModel->row['job_primaryworklocation_country']    = $jobPriwrkctry;
        $JobModel->row['job_primaryworklocation_city']       = $jobPriwrkcity;
        $JobModel->row['job_hrcontactname']                  = $jobHRContact;
        $JobModel->row['job_hrcontactemail']                 = $jobHRContactEmail;
        $JobModel->row['job_hiringmgrcontactname']           = $jobHiringMgrContact;
        $JobModel->row['job_hiringmgrcontactemail']          = $jobHiringMgrContactEmail;
        $JobModel->row['job_mandatory_skills']               = $mandtSkills;
        $JobModel->row['job_category']                       = $jobCategory;
        $JobModel->row['job_function']                       = $jobFunction;
        $JobModel->row['job_industry']                       = $jobIndustry;
        $JobModel->row['job_sub_industry']                   = $jobSubIndustry;
        $JobModel->row['job_description']                    = htmlEntities($jobDesc);
        $JobModel->row['job_benefits']                       = $jobBenefits;
        $JobModel->row['job_workinghours']                   = $jobWorkinghrs;
        if($jobPosted == 'on') {
            $JobModel->row['job_postdate']                   = date('Y-m-d h:m:s');    
        } else {
            $JobModel->row['job_postdate']                   = '';
        }
        $JobModel->row['job_posted']                         = $jobPosted;
        $JobModel->row['job_created_by']                     = $createdBy;
        $JobModel->row['job_created_date']                   = date('Y-m-d h:m:s');
        $JobModel->row['job_view_count']                     = '0';
        if($jobPosted == 'off') {
            $JobModel->row['job_active']                     = 'No';    
        } else {
            $JobModel->row['job_active']                     = 'Yes';
        }       
        $JobModel->save();
        array_push($JobModels, $JobModel);
        
        $this->db->trans_complete();
        
        return $JobModel->row['job_number'];
    }
    
    // Function to update the job if it is saved as DRAFT.
    public function job_update(){
        
        $email = $this->session->userdata('recruiter_login');
        $jobstatus = $this->input->post('inputJobMethod');
        if($jobstatus == "on") {
            $jobPostdate = date('Y-m-d h:m:s');
            $jobActive = 'Yes';    
        } else {
            $jobPostdate = '';
            $jobActive = 'No';
        }
        
        // store all the posted values into an array.
        $data = array(
            'job_title'                         => $this->input->post('inputJobTitle'),
            'job_salarydisplay'                 => $this->input->post('inputJobSalDisp'),
            'job_minsalary_currency'            => $this->input->post('inputJobMinSalCurrCode'),
            'job_minmonth_salary'               => $this->input->post('inputJobMinSalary'),
            'job_maxsalary_currency'            => $this->input->post('inputJobMaxSalCurrCode'),
            'job_maxmonth_salary'               => $this->input->post('inputJobMaxSalary'),
            'job_primaryworklocation_country'   => $this->input->post('inputJobPriworklocctry'),
            'job_primaryworklocation_city'      => $this->input->post('inputJobPriworkloccity'),
            'job_hrcontactname'                 => $this->input->post('inputJobHRcontactname'),
            'job_hrcontactemail'                => $this->input->post('inputJobHRcontactemail'),
            'job_hiringmgrcontactname'          => $this->input->post('inputJobHiringMgrname'),
            'job_hiringmgrcontactemail'         => $this->input->post('inputJobHiringMgremail'),
            'job_mandatory_skills'              => $this->input->post('inputJobMandatorySkl'),
            'job_category'                      => $this->input->post('inputJobCategory'),
            'job_function'                      => $this->input->post('inputJobFunction'),
            'job_industry'                      => $this->input->post('inputJobIndustry'),
            'job_sub_industry'                  => $this->input->post('inputJobSubIndustry'),
            'job_description'                   => htmlEntities($this->input->post('inputJobDescription')),
            'job_benefits'                      => $this->input->post('inputJobBenefits'),
            'job_workinghours'                  => $this->input->post('inputJobWorkingHours'),
            'job_postdate'                      => $jobPostdate,
            'job_posted'                        => $this->input->post('inputJobMethod'),
            'job_last_modified_by'              => $email,
            'job_last_modified_date'            => date('Y-m-d h:m:s'),
            'job_active'                        => $jobActive,
            'job_video_url'                     => $this->input->post('inputFileUploadname')
        );
        
        $this->db->where('job_number', $this->input->post('inputJobNumber'));
        $this->db->update('jobs', $data);
        if($this->db->trans_status() == '1') {
            // Step-1: To delete the whole list of the Skill that were already added.
            $skillpostVal = explode(",", $this->input->post('inputJobMandatorySkl') );
	    foreach( $skillpostVal as $oldskillVal) {
            	$this->db->where('job_ref_id', $this->input->post('inputJobNumber'));
            	$this->db->delete('job_skills');
	    }
	    
	    // Step-2: To add back all the items in the text-field.
	    $newskillpostVal = explode(",", $this->input->post('inputJobMandatorySkl') );
	    foreach( $newskillpostVal as $newskillVal) {
	    	$newskilladddata = array( 'job_ref_id' => $this->input->post('inputJobNumber'), 'job_skill_name' => $newskillVal, 'job_skill_created_date' => date('Y-m-d h:m:s') );
	    	
	    	$this->db->insert('job_skills', $newskilladddata); 
	    }
            echo "success:".https_url($this->lang->lang().'/recruiter/job/'.$this->input->post('inputJobNumber')).";Your Job was updated successfully!";
        } else {
            echo "failure;Your Job was not updated, please try again!";
            log_message('error', sprintf('DB transaction failed. Last query: %s', print_r($this->db->last_query(), TRUE)));
            $this->db->trans_rollback();
        }
    }
    
    // function to show Recruiter's calendar.
    public function calendar($year = null, $month = null) {
        
        if($this->session->userdata('recruiter_login') != null || $this->session->userdata('recruiter_login') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $this->load->model('calendar_model');
            $data['calendar'] = $this->calendar_model->calendar_generate($year, $month);
            
            $head_params = array(
                'title' => 'Recruiter Calendar | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/calendar', $data, true);
            $template["footer"] = $this->load->view('common/recruiter/footer', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( https_url($this->lang->lang().'/recruiter') );
        }
    }
    
    // function to export calendar that can be imported into Google Calendar and Outlook.
    public function export_calendar(){
        
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        $tmpcalendar_data = array();
        $csvarray = array( );
        
        $condition = "system_created_by = '".$recruiterEmail."'";
        $this->db->select('*')->from('candidate_interview')->where($condition);
        $query = $this->db->get();
        foreach( $query->result_array() as  $intervDet) {            
            $tmpjobName = $this->login_database->read_job_information( $intervDet['candidate_IntvwJobId'] );
            
            // Split Interview Date & Time
            $candinterviewDate = explode(" ", $intervDet['candidate_Pri_IntvwDateTime']);
            $candName = $this->login_database->read_candidate_information($intervDet['candidate_IntvwCandidId']);
            
            foreach( $candName as $candidDet) {
                $date_string = str_replace("-","",$candinterviewDate[0]);
                $Fromhour_string = str_replace(":","",$candinterviewDate[1]);
                $calDateFrom_string = $date_string."T".$Fromhour_string."00Z";
                
                $newFromdate_string = str_replace("-","/",$candinterviewDate[0]);
                
                $Tohour_string = str_replace(":","",$candinterviewDate[3]);
                $calDateTo_string = $date_string."T".$Tohour_string."00Z";
                
                $calcreatedDt = explode(" ", $intervDet['system_created_date']);
                $calcreatedDt_string = str_replace("-","",$calcreatedDt[0]);
                $calcreatedFromhour_string = str_replace(":","",$calcreatedDt[1]);
                $calDateFrom_string = $calcreatedDt_string."T".$calcreatedFromhour_string."00Z";
                
                array_push($csvarray, array('subject' => 'Sample Subject', 'startDate' => $newFromdate_string, 'startTime'=> $candinterviewDate[1], 'endDate' => $newFromdate_string, 'endTime'=> $candinterviewDate[3],'description' => 'sample description', 'location' => 'sample location' ));
            }
        }
        
        $icstxt = "Subject,Start Date,Start Time,End Date,End Time,All Day Event,Description,Location,Private\r\n";
        foreach($csvarray as $csvArrvalue) {
            $icstxt .= $csvArrvalue['subject'].",".$csvArrvalue['startDate'].",".$csvArrvalue['startTime'].",".$csvArrvalue['endDate'].",".$csvArrvalue['endTime'].",,".$csvArrvalue['description'].",".$csvArrvalue['location'].",false\r\n";
        }
        
        $filename = 'MyCalendar.csv';
        $arr = explode(",",$icstxt);
        $handle = fopen($filename, 'w+');
        fwrite($handle, $icstxt);
        fclose($handle);
        
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Length: ". filesize("$filename").";");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/octet-stream; "); 
        header("Content-Transfer-Encoding: binary");
        
        readfile($filename);
    }
    
    // Read jobCategory from database
    public function get_jobCatFunction() {        
        $this->db->select('job_function_name')->from('job_function')->where('job_category_id', $this->input->post('jobcatId'))->order_by("job_function_name", "asc");
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            echo "<option value='".$row->job_function_name."'>".$row->job_function_name."</option>";
        }
    }
    
    // Read jobCategory from database
    public function get_jobSubIndustry() {
        $this->db->select('job_sub_industry_name')->from('job_sub_industry')->where('job_industry_id', $this->input->post('jobindusId'))->order_by("job_sub_industry_name", "asc");
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            echo "<option value='".$row->job_sub_industry_name."'>".$row->job_sub_industry_name."</option>";
        }
    }

    // Obselete function to move uploaded video file to a public location.
    public function uploadFile(){
        
        if ( 0 < $_FILES['file']['error'] ) {
            echo "Video Upload Failure;Error";
        } else {
            $fileext = explode('.', $_FILES['file']['name']);
            $video_name = preg_replace("/[[:space:]]+/", "_", htmlspecialchars( $this->input->post('inputJobTitle') ) ) . "_" . date('Ymdhms').".".$fileext[1];
            move_uploaded_file($_FILES['file']['tmp_name'], './public/recruiter/' . $video_name);
            echo "Video Upload success;".$video_name;
        }
    }
    
    // Recruiter upload corporate logo picture modal window
    public function recruiter_corporatelogpicupload() { $this->load->view('recruiter/recruiter_corporatelogpicupload'); }
    
    // Recruiter upload resume process
    public function recruiter_corporatelogpicupdate(){
        
        $msg ="";
        $target_dir = "images/recruiter/logo/";
        
        $FileName = $_FILES["fileToUpload"]["name"];
        $FileTmpLoc = $_FILES["fileToUpload"]["tmp_name"];
        $FileType = pathinfo($FileName ,PATHINFO_EXTENSION);
        $FileSize = $_FILES["fileToUpload"]["size"];
        $FileErrorMsg = $_FILES["fileToUpload"]["error"];
        $tmpFileExt = explode(".", $FileName);
        $FileExt = end($tmpFileExt);
        //$profilepichashName = hash('sha1',basename($FileName."QxLUF1bgIAdeQX"));
        $profilepichashName = uniqid();
        $uploadOk = 1;
        
        $target_file = $target_dir . $profilepichashName . "." . $FileType;
        
        // Allow certain file formats
        if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg") {
            $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Only JPG, PNG & JPEG image formats are allowed.</font></center>";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($FileSize > 1048576) {
            $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Your picture is too large to be uploaded.</font></center>";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Your picture was not uploaded.</font></center>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($FileTmpLoc, $target_file)) {
                
                $resized_file = "images/recruiter/logo/".$profilepichashName. "." . $FileType;
                $wmax = 150;
                $hmax = 150;
                recruiter_img_resize($target_file, $resized_file, $wmax, $hmax, $FileExt);
                
                // To initially check if the email is registered in the system.
                $condition = "employer_contact_email =" . "'" . $this->input->post('employer-profile-email') . "'";
                $this->db->select('*')->from('employers')->where($condition);
                $query = $this->db->get();
                $result = $query->num_rows();
                
                if ($result > 0) {
                    $data = array('employer_logo_url' => $profilepichashName. "." . $FileType);
                    $this->db->where('employer_contact_email', $this->input->post('employer-profile-email'));
                    $this->db->update('employers', $data);
                    if($this->db->trans_status() != '1') {
                        $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>There was an error uploading your picture.</font></center>";
                    } else {
                        // 2. Refresh session data
                        $this->session->unset_userdata('user_data');                        
                        $sess_array = array('username' => $this->session->userdata('recruiter_login'));
                        $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
                        $this->session->set_userdata('user_data', $candidateinfo);
                        $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Your picture was successfully uploaded.<br />You may close this window.</font></center>";
                    }
                } else {
                    return false;
                }
                
            } else {
                $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>There was an error uploading your picture.</font></center>";
            }
        }
        
        echo $msg;
    }
    
    // Logout from admin page
    public function logout() {    
        // Removing session data
        redirect( https_url($this->lang->lang().'/recruiter') );
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */