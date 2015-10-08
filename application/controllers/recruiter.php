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
        
        $this->lang->load('common');        
        
        // Load database Model
        $this->load->model('login_database');
        
        $curr_lang = $this->lang->lang();
        
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
            $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            redirect($url);
            exit;
        }
                        
    }
    
    // Employer Portal login page with user-email and password.
	public function index() {
        $session_items = array('job_detail' => '', 'logged_in' => '', 'recruiter_data' => '', 'user_data' => '');
        $this->session->unset_userdata($session_items);
        
        $head_params = array(
            'title' => 'Grab Talent | Recruiter Portal',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('recruiter/index', null, true);
        $this->load->view('common/layout', $template);
	}
    
    // Employer login check
    public function recruiter_loginCheck() {
        
        $data = array( 'username' => $this->input->post('emailaddress'), 'password' => $this->input->post('password') );
        $result = $this->login_database->employerlogin($data);
        
        if($result > 0){
            $recruiterEmail = $this->input->post('emailaddress');
            $this->session->set_userdata('logged_in', $recruiterEmail);
            set_cookie(COOKIE_LOGGEDIN, $recruiterEmail, COOKIE_EXPIRES);
            
            $redirect_url = https_url($this->lang->lang().'/recruiter/dashboard');
            echo "success;".$redirect_url;
            return true;
        } else {
            echo "failure;Invalid Username or Password";
            return false;
        }
        
    }
    
    // Reset Password Page view
    public function resetpassword() {    

        $head_params = array(
            'title' => 'GT | Recruiter Reset Password',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('recruiter/resetpassword', null, true);
        $this->load->view('common/layout', $template);
    }
    
    // Function to Change Password
    public function changepasswd() {
        $plaintext_string = $email_decoded = base64_decode(strtr($this->input->post('email'), '-_', '+/'));
        
        $email_data = array(
            'username' => $plaintext_string,
            'password' => $this->input->post('password')
        );
        // To initially check if the email is registered in the system.
        $condition = "employer_email =" . "'" . $plaintext_string . "'";
        $this->db->select('*');
        $this->db->from('employer_login');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array('employer_password' => md5($this->input->post('password')));
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
            'title' => 'GT | Recruiter Forgot Password',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('recruiter/forgotpassword', null, true);
        $this->load->view('common/layout', $template);
    }
    
    // Send forgot password link to recruiters email.    
    public function sendforgotpwd() {
        
        $email_chk = $this->login_database->forgot_emppasswdemailchk($this->input->post("email"));
        if($email_chk == TRUE) {
            $message = $this->load->view('common/recruiter/forgotpass',$this->input->post("email"),true);
            $this->email->set_newline("\r\n");
            $this->email->from('do-not-reply@grabtalent.com','do-not-reply@grabtalent.com'); // change it to yours
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
        
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        
        // Get Recruiter Information and store to session.
        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
        
        $head_params = array(
            'title' => 'GT | Recruiter Dashboard',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            'loggedin_User' => $loggedInuser
        );
        
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/header', null, true);
        $template["contents"] = $this->load->view('recruiter/dashboard', null, true);
        $this->load->view('common/recruiter/layout', $template);	   
	}
    
    // Change password
    public function change_recruiter_password() {
        
        $newpassword = md5($this->input->post('newpassword')); 
        
        // To initially check if the email is registered in the system.
        $condition = "employer_email =" . "'" . $this->input->post('employer-email') . "'";
        $this->db->select('*');
        $this->db->from('employer_login');
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
        if($this->session->userdata('logged_in') != null || $this->session->userdata('logged_in') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'GT | Candidate List',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/candidate_list', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( secure_url($curr_lang.'/recruiter') );
        }
    }
    
    // Recruiter applicant job tracking & list page view.
    public function applicant_job_view() {
        if($this->session->userdata('logged_in') != null || $this->session->userdata('logged_in') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'GT | Applicant Job View | '.$this->uri->segment(4),
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/applicant_job_view', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( secure_url($curr_lang.'/recruiter') );
        }
    }
    
    // Recruiter applicant tracking & list page view.
    public function applicant_view() {
        if($this->session->userdata('logged_in') != null || $this->session->userdata('logged_in') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'GT | Applicant View | '.$this->uri->segment(4),
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/applicant_view', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( secure_url($curr_lang.'/recruiter') );
        }
    }
    
    // Recruiter upload offer Letter modal window
    public function candidate_offerupload() {
        $this->load->view('recruiter/candidate_offerupload');
	}
    
    public function candidate_resumedownload () {
        $file_url = "./public/candidate/".$this->uri->segment(4);
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"" . $this->uri->segment(4) . "\""); 
        echo readfile($file_url);
    }
    
    // Recruiter profile page view.
    public function candidate() {
        if($this->session->userdata('logged_in') != null || $this->session->userdata('logged_in') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'GT | Candidate Page',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/candidate', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( secure_url($curr_lang.'/recruiter') );
        }
    }
    
    // Recruiter profile page view.
    public function profile() {
        if($this->session->userdata('logged_in') != null || $this->session->userdata('logged_in') != "") {
            
            // Get Recruiter Information and store to session.
            $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
            $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
            $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
            
            $head_params = array(
                'title' => 'GT | Recruiter Profile',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                'loggedin_User' => $loggedInuser
            );
            $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
            $template["header"] = $this->load->view('common/recruiter/header', null, true);
            $template["contents"] = $this->load->view('recruiter/profile', null, true);
            $this->load->view('common/recruiter/layout', $template);
        } else {
            redirect( secure_url($curr_lang.'/recruiter') );
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
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $empinfo = $this->login_database->read_user_information($sess_array,'employer');
            $this->session->set_userdata('recruiter_data', $empinfo);
        } else {
            echo "failure;Profile was not updated, please try again!";
        }
    }
    
    // Recruiter Job page view.
    public function job() {
        $jobnumber = $this->uri->segment(4);
        $job_detail = $this->login_database->read_job_information($jobnumber);
        $this->session->set_userdata('job_detail', $job_detail);
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
        
        $head_params = array(
            'title' => 'GT | Recruiter Job Page',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            'loggedin_User' => $loggedInuser
        );
        
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/header', null, true);
        $template["contents"] = $this->load->view('recruiter/job', null, true);
        $this->load->view('common/recruiter/layout', $template);
    }
    
    // Create job page view.
    public function job_create() {
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
        
        $head_params = array(
            'title' => 'GT | Create Job',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            'loggedin_User' => $loggedInuser
        );
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/header', null, true);
        $template["contents"] = $this->load->view('recruiter/job_create', null, true);
        $this->load->view('common/recruiter/layout', $template);
    }
    
    // Create job page view.
    public function applicant_tracking() {
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
        
        $head_params = array(
            'title' => 'GT | Applicant Tracking System',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            'loggedin_User' => $loggedInuser
        );
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/header', null, true);
        $template["contents"] = $this->load->view('recruiter/applicant_tracking', null, true);
        $this->load->view('common/recruiter/layout', $template);
    }
    
    public function applicant_tracking_stepChange(){
        
        $email = $this->session->userdata('logged_in');
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
            $this->db->trans_rollback();
        }
        
    }
    
    // Schedule Interview.
    public function applicant_interview() {
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
        
        $head_params = array(
            'title' => 'GT | Schedule Interview Page',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            'loggedin_User' => $loggedInuser
        );
        
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/header', null, true);
        $template["contents"] = $this->load->view('recruiter/applicant_interview', null, true);
        $this->load->view('common/recruiter/layout', $template);
    }
    
    // Change candidate status to interview and save interview details.
    public function applicant_interview_action(){
                
        $candEmail_body = htmlspecialchars_decode($this->input->post('cand_email_Body'));
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
            $interview_Updarr = array('candidate_appln_job_id' => $this->input->post('candidateJobRefId'), 'candidate_email' => $candemailDet[0]['candidate_email'], );
            $candstgUpdate = $this->login_database->candidate_UpdapplnStage( $interview_Updarr, 'Interview' );
            
            // If the candidate stage update is successful then update Send out email to candidate.                        
            if($candstgUpdate == 1) {
            	echo "success:Candidate stage update successful, please close this window to be redirected.";
            	$message = $this->load->view('common/recruiter/interviewLetterTemplate',array('Emailbody' => $candEmail_body),true);
    	        $this->email->set_newline("\r\n");
    	        $this->email->from('do-not-reply@grab-talent.com','do-not-reply@grab-talent.com'); // change it to yours
    	        $this->email->to($candemailAddress);// change it to yours
    	        $this->email->subject($candEmail_subj);
    	        $this->email->message($message);
    	        if($this->email->send()) {
    	           echo "Email was sent to candidate!";
    	        } else {
    	           //show_error($this->email->print_debugger());
    	           echo "Email was not sent, please try again.";
    	           log_message('error', 'Something was wrong with email sending for email to - '.$candemailAddress);
    	        }
            }
        }
    }
    
    // Move candidate stage to Offer.
    public function applicant_offer() {
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
        
        $head_params = array(
            'title' => 'GT | Offer Page',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            'loggedin_User' => $loggedInuser
        );
        
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/header', null, true);
        $template["contents"] = $this->load->view('recruiter/applicant_offer', null, true);
        $this->load->view('common/recruiter/layout', $template);
    }
    
    // Change candidate status to interview and save interview details.
    public function applicant_offer_action(){
                
        $candEmail_body = htmlspecialchars_decode($this->input->post('cand_email_Body'));
        $candEmail_subj = htmlspecialchars_decode($this->input->post('cand_email_subject'));
        
        // update candidate step in application table from post array.        
        $candemailDet = $this->login_database->read_candidate_information( $this->input->post('candidateRefId') );
        $candemailAddress = $candemailDet[0]['candidate_email'];
        
        $data = array(
            'candidate_OfferCandidId'               => $this->input->post('candidateRefId'),
            'candidate_OfferJobId'                  => $this->input->post('candidateJobRefId'),
            'candidate_OfferDateTime'               => date('Y-m-d h:m:s'),
            'candidate_email_address'               => $candemailDet[0]['candidate_email'],
            'Offer_email_sent'                      => 'No',
            'system_created_by'                     => $this->input->post('rec_emailaddress'),
            'system_created_date'                   => date('Y-m-d h:m:s')            
        );        
        $this->db->insert('candidate_offer', $data);
        
        if($this->db->trans_status() === FALSE) {
            echo "failure:Candidate stage update failed, please try again!";                        
        } else {
            // Function to update candidate stage in Candidate Application table.
            $interview_Updarr = array('candidate_appln_job_id' => $this->input->post('candidateJobRefId'), 'candidate_email' => $candemailDet[0]['candidate_email'], );
            $candstgUpdate = $this->login_database->candidate_UpdapplnStage( $interview_Updarr, 'Offer' );
            
            // If the candidate stage update is successful then update Send out email to candidate.                        
            if($candstgUpdate == 1) {
            	echo "success:Candidate stage update successful, please close this window to be redirected.";
            	$message = $this->load->view('common/recruiter/interviewOfferTemplate','',true);
    	        $this->email->set_newline("\r\n");
    	        $this->email->from('do-not-reply@grab-talent.com','do-not-reply@grab-talent.com'); // change it to yours
    	        $this->email->to($candemailAddress);// change it to yours
    	        $this->email->subject($candEmail_subj);
    	        $this->email->message($message);
    	        if($this->email->send()) {
    	           echo "Email was sent to candidate!";
    	        } else {
    	           //show_error($this->email->print_debugger());
    	           echo "Email was not sent, please try again.";
    	           log_message('error', 'Something was wrong with email sending for email to - '.$candemailAddress);
    	        }
            }
        }
    }
    
    // Edit job page view.
    public function job_edit() {
        $jobnumber = $this->uri->segment(4);
        $job_detail = $this->login_database->read_job_information($jobnumber);
        $this->session->set_userdata('job_detail', $job_detail);
        
        // Get Recruiter Information and store to session.
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
        
        $head_params = array(
            'title' => 'GT | Edit Job',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            'loggedin_User' => $loggedInuser
        );
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/header', null, true);
        $template["contents"] = $this->load->view('recruiter/job_edit', null, true);
        $this->load->view('common/recruiter/layout', $template);
    }
    
    // Job status change
    public function job_deactivate(){
        
        $email = $this->session->userdata('logged_in');
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
            $this->db->trans_rollback();
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
    
    // Offer Template Page view.
    public function offeremail_template() {
        
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
        
        $head_params = array(
            'title' => 'GT | Edit Offer Template Page',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            'loggedin_User' => $loggedInuser
        );
        
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/header', null, true);
        $template["contents"] = $this->load->view('recruiter/offeremail_template', null, true);
        $this->load->view('common/recruiter/layout', $template);
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
        }
    }
    
    // Offer Template Page view.
    public function interviewemail_template() {
        
        $recruiterEmail = get_cookie(COOKIE_LOGGEDIN);
        $recruiterinfo = $this->login_database->get_employer_information($recruiterEmail);
        $loggedInuser = $recruiterinfo[0]['employer_contact_firstname']." ".$recruiterinfo[0]['employer_contact_lastname'];
        
        $head_params = array(
            'title' => 'GT | Edit Interview Template Page',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            'loggedin_User' => $loggedInuser
        );
        
        $template["head"] = $this->load->view('common/recruiter/head', $head_params, true);
        $template["header"] = $this->load->view('common/recruiter/header', null, true);
        $template["contents"] = $this->load->view('recruiter/interviewemail_template', null, true);
        $this->load->view('common/recruiter/layout', $template);
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
        }
    }
    
    // Function to update the job if it is saved as DRAFT.
    public function job_update(){
        
        $email = $this->session->userdata('logged_in');
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
            'job_minsalary_currency'            => $this->input->post('inputJobMinSalCurrCode'),
            'job_minmonth_salary'               => $this->input->post('inputJobMinSalary'),
            'job_maxsalary_currency'            => $this->input->post('inputJobMaxSalCurrCode'),
            'job_maxmonth_salary'               => $this->input->post('inputJobMaxSalary'),
            'job_primaryworklocation_country'   => $this->input->post('inputJobPriworklocctry'),
            'job_primaryworklocation_city'      => $this->input->post('inputJobPriworkloccity'),
            'job_hrcontactname'                 => $this->input->post('inputJobHRcontactname'),
            'job_hrcontactemail'                => $this->input->post('inputJobHRcontactemail'),
            'job_mandatory_skills'              => $this->input->post('inputJobMandatorySkl'),
            'job_desired_skills'                => $this->input->post('inputJobDesiredSkl'),
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
            echo "success:".$this->input->post('inputJobNumber').";Your Job was updated successfully!";
        } else {
            echo "failure;Your Job was not updated, please try again!";
            $this->db->trans_rollback();
        }
    }
    
    // Function to create new jobs.
    public function job_register() {
        
        //To retrieve email from session.
        $email = $this->session->userdata('logged_in');
                
        // Check validation for user input in SignUp form
        $this->load->model('grabtalent_job_model');
                        
        $JobModels = $this->_saveJobs(
            $this->input->post('inputJobTitle'),
            $this->input->post('inputJobMinSalCurrCode'),
            $this->input->post('inputJobMinSalary'),
            $this->input->post('inputJobMaxSalCurrCode'),
            $this->input->post('inputJobMaxSalary'),
            $this->input->post('inputJobMandatorySkl'),
            $this->input->post('inputJobDesiredSkl'),
            $this->input->post('inputJobPriworklocctry'),
            $this->input->post('inputJobPriworkloccity'),
            $this->input->post('inputJobHRcontactname'),
            $this->input->post('inputJobHRcontactemail'),
            $this->input->post('inputJobCategory'),
            $this->input->post('inputJobFunction'),
            $this->input->post('inputJobIndustry'),
            $this->input->post('inputJobSubIndustry'),
            $this->input->post('inputJobDescription'),
            $this->input->post('inputJobBenefits'),
            $this->input->post('inputJobWorkingHours'),
            $this->input->post('inputJobMethod'),
            $email,
            $this->input->post('inputFileUploadname')
        );
        
        if($this->db->trans_status() == '1') {
            echo "success:".https_url($this->lang->lang().'/recruiter/job/'.$JobModels).";Your Job was saved successfully, redirecting to job page!";
        } else {
            echo "failure;Your Job was not saved, please try again!";
            $this->db->trans_rollback();
        }
    }
    
    // To save / register jobs into job table.
    private function _saveJobs($jobTitle, $jobMinSalCode, $jobMinSal, $jobMaxSalCode, $jobMaxSal, $mandtSkills, $desiredSkills, $jobPriwrkctry, $jobPriwrkcity, $jobHRContact, $jobHRContactEmail, $jobCategory, $jobFunction, $jobIndustry, $jobSubIndustry, $jobDesc, $jobBenefits, $jobWorkinghrs, $jobPosted, $createdBy, $vidname) {

        $JobModels = array();

        $this->db->trans_start();                                

        // setup password
        $JobModel = new grabtalent_job_model();
        $JobModel->row['job_number']                         = 'JOB-'.date('ym').'-'.mt_rand(10000000, 99999999);
        $JobModel->row['job_title']                          = $jobTitle;
        $JobModel->row['job_minsalary_currency']             = $jobMinSalCode;
        $JobModel->row['job_minmonth_salary']                = $jobMinSal;
        $JobModel->row['job_maxsalary_currency']             = $jobMaxSalCode;
        $JobModel->row['job_maxmonth_salary']                = $jobMaxSal;
        $JobModel->row['job_primaryworklocation_country']    = $jobPriwrkctry;
        $JobModel->row['job_primaryworklocation_city']       = $jobPriwrkcity;
        $JobModel->row['job_hrcontactname']                  = $jobHRContact;
        $JobModel->row['job_hrcontactemail']                 = $jobHRContactEmail;
        $JobModel->row['job_mandatory_skills']               = $mandtSkills;
        $JobModel->row['job_desired_skills']                 = $desiredSkills;
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
        $JobModel->row['job_video_url']                      = $vidname;        
        $JobModel->save();
        array_push($JobModels, $JobModel);
        
        $this->db->trans_complete();
        
        return $JobModel->row['job_number'];
    }
        
    // Logout from admin page
    public function logout() {    
        // Removing session data
        redirect( secure_url($curr_lang.'/recruiter') );
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */