<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidate extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        // Load session library
        $this->load->library('form_validation');
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
        
        $curr_lang = $this->lang->lang();
        
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
            $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            redirect($url);
            exit;
        }
                        
    }
    
    // Candidate Portal login page with user-email and password.
    public function index() {
        $session_items = array('user_data' => '', 'logged_in' => '');
        $this->session->unset_userdata($session_items);
        
        $head_params = array(
            'title' => 'Candidate Portal | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
        $template["header"] = $this->load->view('common/candidate/index_header', null, true);
        $template["contents"] = $this->load->view('candidate/index', null, true);
        $template["footer"] = $this->load->view('common/footer', null, true);
        $this->load->view('common/candidate/layout', $template);
    }
    
    // Check for user login process
    public function candidate_login() {
                
        $data = array( 'emailaddress' => $this->input->post('emailaddress'),'password' => $this->input->post('password') );

        // Step-1: Checking for email-address in login table.
        $result = $this->login_database->candidatelogin($data);
        
        if($result == TRUE){
            // To double-confirm if the candidate completed his signup process.
            $result = $this->login_database->candidate_resumeupdatecheck($this->input->post('emailaddress'));
            // Step-2: Checking for email-address in signup table.
            if($result > 0) {
                // Step-3: Candidate completed registration process successfully with us. So we add candidate data to session.
                $this->session->set_userdata('logged_in', $this->input->post('emailaddress'));
                
                $sess_array = array( 'username' => $this->input->post('emailaddress') );                        
                $result = $this->login_database->read_user_information($sess_array, 'candidate');
                $this->session->set_userdata('user_data', $result);
                
                $candidateloginData = $this->login_database->candidatefirstlogin($this->input->post('emailaddress'));
		//print_r($recruiterloginData);
		if(str_replace(array("-", " ", ":"), "", $candidateloginData[0]['system_last_modified_date'])*1>0){
			$redirect_url = https_url($this->lang->lang().'/candidate_dashboard');
		} else {
			$redirect_url = https_url($this->lang->lang().'/candidate/changepassword');
		}
                echo "success;".$redirect_url;
            } else {
                // Step-3.1: Candidate did completed registration process. So we delete the candidate login data.
                $this->db->where('candidate_email', $this->input->post('emailaddress'));
                $this->db->delete('candidate_login');
                if ($this->db->affected_rows() == 1) {
                    echo "failure;Your did not complete your last sign-up with us, we have removed ur data from our records. Please complete the registration process again before login.";
                    log_message('error', 'Your did not complete your last sign-up with us, we have removed ur data from our records. Please complete the registration process again before login.'.$this->input->post('emailaddress'));
                } else {
                    echo "failure;You have not completed the sign-up process, please register again with us.";
                    log_message('error', 'You have not completed the sign-up process, please register again with us.'.$this->input->post('emailaddress'));
                }                
            }
        } else {
            echo "failure;Invalid Username or Password";
            log_message('error', 'Invalid Username or Password'.$this->input->post('emailaddress'));
        }
    }
    
    // Validate and store registration data in database
    public function register() {
        
        $head_params = array(
            'title' => 'Candidate Registration | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
        $template["header"] = $this->load->view('common/candidate/index_header', null, true);
        $template["contents"] = $this->load->view('candidate/register', null, true);
        $template["footer"] = $this->load->view('common/candidate/footer', null, true);
        $this->load->view('common/candidate/layout', $template);
        
    }
    
    public function candidate_register(){
                
        $target_dir = "public/candidate/";
        $resumehashName = hash('sha1',basename($_FILES["fileToUpload"]["name"]));
        $FileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
        $target_file = $target_dir . $resumehashName . "." . $FileType;
        
        // Allow DOCX file formats
        if($FileType == "docx") {
        
            // 1) Only allow .docx file formats, all others will be rejected.
            // 2) Check if the resume file size is under threshold limits.
            if ( $FileType != "docx" && $_FILES["fileToUpload"]["size"] > 2097152 ) {
                echo "failure;Your resume was not uploaded.";
            // if everything is ok, try to upload file to our server location.
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {                    
                    echo "success;". base_url().$this->lang->lang().'/signup?id='.$resumehashName . "." . $FileType;                    
                } else {
                    echo "failure;There was an error uploading your file.";
                    log_message('error', 'Error uploading your file'.$target_file);
                }
            }
            
        } else {
            log_message('error', 'Wrong file uploaded by candidate'.$target_file);
        }        

    }    
    
    // List all open jobs on jobs page
    public function jobs() {
        if($this->session->userdata('logged_in') != null || $this->session->userdata('logged_in') != "") {
        
            $head_params = array(
                'title' => 'My Jobs | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            );
            $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
            $template["header"] = $this->load->view('common/candidate/header', null, true);
            $template["contents"] = $this->load->view('candidate/jobs', null, true);
            $template["footer"] = $this->load->view('common/candidate/footer', null, true);
            $this->load->view('common/candidate/layout', $template);
        } else {
            redirect(base_url('candidate'));
        }
    }
    
    public function registercandidate_application() {
    
    	$job_Title = $job_EmployerEmail = $employer_Name = $candidate_Name = '';
    	$upd = 0;
        
        $data_email = array('email' => $this->session->userdata('logged_in'));
        
        $ApplicationArr = array(
	        'candidate_appln_ref_id' => $this->login_database->fetch_cand_refId($data_email),
	        'candidate_coderefs_id' => $this->input->post('candidateRefid'),
	        'candidate_email' => $this->session->userdata('logged_in'),
	        'candidate_appln_job_id' => $this->input->post('jobId'),
	        'candidate_appln_stage' => 'Application',
	        'cand_appln_created_date' => date('Y-m-d h:m:s')
        );
        $this->db->insert('candidate_application',$ApplicationArr);
        
        if($this->db->affected_rows() == 1) {
            echo "accepted";            
            $upd = 1;
            
        } else {
            echo "failed";
            $upd = 0;
        }
    	
    	if($upd == 1) {
		$this->sendJobApplnEmail($this->session->userdata('logged_in'), $this->input->post('jobId'), $this->input->post('candidateRefid'), '', '', '', 'candidate');
		
	     	$jobemp_Title = $jobemp_EmployerEmail = $resume_url = '';
	
		// 1. To get job information
		$jobsrchEmpArr = $this->login_database->read_job_information( $this->input->post('jobId') );
		foreach($jobsrchEmpArr as $jobsrchEmpVal){
			$jobemp_Title = $jobsrchEmpVal['job_title'];
			$jobemp_EmployerEmail = $jobsrchEmpVal['job_created_by'];
		}
		
	     $this->sendJobApplnEmail($this->session->userdata('logged_in'), $this->input->post('jobId'), $this->input->post('candidateRefid'), '', $jobemp_EmployerEmail, $jobemp_Title, 'client');
    	}
    }
    
    // Send Application success email to candidate after applying to job.    
    public function sendJobApplnEmail($candEmail, $jobId, $cand_refId, $cand_resume, $emp_Email, $jobTitle, $type) { 
        
        $this->email->set_newline("\r\n");
        $this->email->from('do-not-reply@grab-talent.com','do-not-reply@grab-talent.com'); // change it to yours        
        if( $type == 'candidate') {
        	
        	$JobApplnmessage = $this->load->view('common/candidate/jobapplicationcand_email', array('candidJobId' => $jobId, 'candidEmail' => $candEmail, 'candidRefId' => $cand_refId ),true );
        	$this->email->to($candEmail);// change it to yours
        	$this->email->subject('Job Application Confirmation');
        	$this->email->message($JobApplnmessage);
        	
	} else {
		unset($JobApplnmessage);
		$resume = '';
            	$this->db->select('*')->from('candidate_signup');
            	$query = $this->db->get();
	        foreach($query->result_array() as $val) {
	        	$resume = 'http://grab-talent.net/public/candidate/'.$val['resume_url'];
	        }
		$JobApplnEmpmessage = $this->load->view('common/candidate/jobapplicationemp_email',array('candJobtitle' => $jobTitle, 'candidRefId' => $cand_refId, 'resume_url' => $resume ),true);
		$this->email->to($emp_Email);// change it to yours  
		$this->email->subject('Grab Talent: Job Application Notification - '.trim($jobTitle));
		$this->email->message($JobApplnEmpmessage);
	}
        if($this->email->send()) {
            log_message('info','Job application confirmation email was sent to '.$candEmail);
        } else {
            log_message('error', 'Email was not sent (or) Something went wrong while sending email to -'.$candEmail);
        }
    }
    
    // Candidate profile page.
    public function profile() {
        if($this->session->userdata('logged_in') != null || $this->session->userdata('logged_in') != "") {
        
            $head_params = array(
                'title' => 'My Profile | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            );
            $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
            $template["header"] = $this->load->view('common/candidate/header', null, true);
            $template["contents"] = $this->load->view('candidate/profile', null, true);
            $template["footer"] = $this->load->view('common/candidate/footer', null, true);
            $this->load->view('common/candidate/layout', $template);
        } else {
            redirect(base_url('candidate'));
        }
    }
    
    // Recruiter profile update.
    public function profile_update() {        
        // 1. Updated Profile data
        $candidate_profupd = array(
            'candidate_firstname' => $this->input->post('inputCandFirstname'),
            'candidate_lastname' => $this->input->post('inputCandLastname'),
            'candidate_phonenumber' => $this->input->post('inputPhonenumber'),
            'candidate_gender' => $this->input->post('inputCandGender'),
            'candidate_total_experience' => $this->input->post('inputTotExperience'),
            'candidate_phonecountrycode' => $this->input->post('id_phone_country_code'),
            'brief_description' => $this->input->post('inputbriefDesc'),
            //'video_resume_url' => $this->input->post('inputCandVidResume')
        );
        $result = $this->login_database->profile_update($candidate_profupd,$this->input->post('profile-email'));
        if($result > 0) {
            $this->session->unset_userdata('user_data');                        
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
            $this->session->set_userdata('user_data', $candidateinfo);
            echo "success;Your Profile has been updated successfully!!";
        } else {
            echo "failure;Profile was not updated, please try again!";
        }
        
        // 2. Refresh session data
        $this->session->unset_userdata('user_data');
        $sess_array = array('username' => $this->session->userdata('logged_in'));
        $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
        $this->session->set_userdata('user_data', $candidateinfo);
    }
    
    public function job() {
	$jobnumber = $this->uri->segment(4);
	
        $head_params = array(
            'title' => $jobnumber.' | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
        $template["header"] = $this->load->view('common/candidate/header', null, true);
        $template["contents"] = $this->load->view('candidate/job', null, true);
        $template["footer"] = $this->load->view('common/candidate/footer', null, true);
        $this->load->view('common/candidate/layout', $template);
    }
    
    // Load Forgot Password Page
    public function forgotpassword() {
        
        $head_params = array(
            'title' => 'Candidate Forgot Password | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
        $template["header"] = $this->load->view('common/candidate/index_header', null, true);
        $template["contents"] = $this->load->view('candidate/forgotpassword', null, true);
        $template["footer"] = $this->load->view('common/candidate/footer', null, true);
        $this->load->view('common/candidate/layout', $template);
    }
    
    // Reset Password
    public function resetpassword() {    

        $head_params = array(
            'title' => 'Candidate Reset Password | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
        $template["header"] = $this->load->view('common/candidate/index_header', null, true);
        $template["contents"] = $this->load->view('candidate/resetpassword', null, true);
        $template["footer"] = $this->load->view('common/candidate/footer', null, true);
        $this->load->view('common/candidate/layout', $template);
    }
    
    // Function to change temporary password
    public function changepassword() {
        
        $head_params = array(
            'title' => 'Candidate Change Password | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent'
        );
        $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
        $template["header"] = $this->load->view('common/candidate/header', null, true);
        $template["contents"] = $this->load->view('candidate/changepassword', null, true);
        $template["footer"] = $this->load->view('common/candidate/footer', null, true);
        $this->load->view('common/candidate/layout', $template);
    }
    
    // Function to Change Password
    public function changetemppasswd() {
	
	$objDateTime = date('Y-m-d H:i:s');
	
	$candidateRefId = $this->input->post('candidateRefId');
	
        // To initially check if the email is registered in the system.
        $condition = "candidate_ref_id='".$candidateRefId."'";
        $this->db->select('*')->from('candidate_login')->where('candidate_ref_id', $candidateRefId);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $data = array('candidate_password' => md5($this->input->post('password')), 'system_last_modified_date' => $objDateTime );
            $this->db->where('candidate_ref_id', $candidateRefId);
            $this->db->update('candidate_login', $data);
            if($this->db->trans_status() == '1') {
                echo "success;Your password has been changed successfully";
            } else {
                echo "failure;Something was wrong, please try again later";
            }
        } else {
            return false;
        }
    }
    
    // Change Password Page
    public function changepasswd() {
        $plaintext_string = base64_decode(strtr($this->input->post('email'), '-_', '+/'));
        
        // To initially check if the email is registered in the system.
        $condition = "candidate_email =" . "'" . $plaintext_string . "'";
        $this->db->select('*');
        $this->db->from('candidate_login');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array('candidate_password' => md5($this->input->post('password')));
            $this->db->where('candidate_email', $plaintext_string);
            $this->db->update('candidate_login', $data);
            if($this->db->trans_status() == '1') {
                echo "success;Your password has been changed successfully";
            } else {
                echo "failure;Something was wrong, please try again later";
            }
        } else {
            return false;
        }
    }
    
    // Send forgot password link to recruiter.    
    public function sendforgotpwd() {
        
        $email_chk = $this->login_database->forgot_candpasswdemailchk($this->input->post("candidateemail"));
        if($email_chk > 0 ) {
            $message = $this->load->view('common/candidate/forgotpass',array('email' => $this->input->post("candidateemail")),true);
            $this->email->set_newline('\r\n');
            $this->email->from('do-not-reply@grab-talent.net','do-not-reply@grab-talent.net'); // change it to yours
            $this->email->to($this->input->post("candidateemail"));// change it to yours
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
    
    // Change password
    public function change_candidate_password() {
        
        $newpassword = md5($this->input->post('newpassword'));
        
        // To initially check if the email is registered in the system.
        $condition = "candidate_email =" . "'" . $this->input->post('candidate-email') . "'";
        $this->db->select('*');
        $this->db->from('candidate_login');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array('candidate_password' => $newpassword);
            $this->db->where('candidate_email', $this->input->post('candidate-email'));
            $this->db->update('candidate_login', $data);
            if($this->db->trans_status() == '1') {
                echo "success";
            } else {
                echo "failure";            
            }
        } else {
            return false;
        }
    }
    
    // Send email confirmation on email address change.   
    public function change_candidate_email() {
        
        // To initially check if the email is registered in the system.
        $candLogincnt = $candSignupcnt = 0;
        
        // 1. To check if the email is registered in Candidate Login table.
        $candLogincondition = "candidate_email =" . "'" . $this->input->post("newEmailAddress") . "'";
        $this->db->select('count(*) as candLogin_cnt')->from('candidate_login')->where($candLogincondition);
        $candLoginquery = $this->db->get();
        foreach ($candLoginquery->result_array() as $candLoginrow) { $candLogincnt = $candLoginrow['candLogin_cnt']; }
        
        // 2. To check if the email is registered in Candidate Login table.
        $candSignupcondition = "candidate_email =" . "'" . $this->input->post("newEmailAddress") . "'";
        $this->db->select('count(*) as candSignup_cnt')->from('candidate_signup')->where($candSignupcondition);
        $candSignupquery = $this->db->get();
        foreach ($candSignupquery->result_array() as $candSignuprow) { $candSignupcnt = $candSignuprow['candSignup_cnt']; }
        
        if( $candLogincnt == 0 || $candSignupcnt == 0 ) {
            
            $sessdata = array('oldcandidate_email' => $this->input->post("oldEmailAddress"), 'newcandidate_email' => $this->input->post("newEmailAddress") );
            $CandLogin_chk = $this->login_database->upd_CandRef_tbls($sessdata);
            if($CandLogin_chk > 0) {
                echo "success;Your email was changed successfully";
                $this->send_email_old($this->input->post("oldEmailAddress"),$this->input->post("newEmailAddress"));
                $this->send_email_new($this->input->post("oldEmailAddress"),$this->input->post("newEmailAddress"));            
            } else {
                echo "failure;Something went wrong, Please try again!.";
            }
        } else {
            echo "failure;This Email is already registered with us!";
        }
    }
    
    public function send_email_old($oldEmail,$newEmail){
        
        $head_params = array( 'oldEMail' => $oldEmail, 'newEmail' => $newEmail );
        $message = $this->load->view('common/candidate/change_email',$head_params,true);
        $this->email->set_newline("\r\n");
        $this->email->from('do-not-reply@grab-talent.net','do-not-reply@grab-talent.net'); // change it to yours
        $this->email->to($oldEmail);// change it to yours
        $this->email->subject('Grab Talent : Your email address has been updated');
        $this->email->message($message);
        if($this->email->send()) { } else { log_message('error', 'Something was wrong with email sending for email to - '.$oldEmail); }
    }
    
    public function send_email_new($oldEmail,$newEmail){
        
        $head_params = array( 'oldEMail' => $oldEmail, 'newEmail' => $newEmail );
        $message = $this->load->view('common/candidate/change_email',$head_params,true);
        $this->email->set_newline("\r\n");
        $this->email->from('do-not-reply@grab-talent.net','do-not-reply@grab-talent.net'); // change it to yours
        $this->email->to($newEmail);// change it to yours
        $this->email->subject('Grab Talent : Your email address has been updated');
        $this->email->message($message);
        if($this->email->send()) { } else { log_message('error', 'Something was wrong with email sending for email to - '.$newEmail); }
    }
    
    // Candidate upload resume modal window
    public function candidate_resumeupload() { $this->load->view('candidate/candidate_resumeupload'); }
      
    public function candidate_resumedownload () {
        
    	$file_url = "./public/candidate/".$this->uri->segment(4);
    	$data = file_get_contents($file_url); // Read the file's contents
    	$name = $this->uri->segment(4);
    	echo force_download($name, $data);

    }
    
    //Candidate upload resume process
    public function candidate_resumeupdate(){
        
        $msg ="";
        $target_dir = "public/candidate/";
        $resumehashName = hash('sha1',basename($_FILES["fileToUpload"]["name"]));
        $uploadOk = 1;
        $FileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
        $target_file = $target_dir . $resumehashName . "." . $FileType;
        
        // Allow certain file formats
        if($FileType != "docx") {
            $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Only DOCX file format is allowed.</font></center>";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 2097152) {
            $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Your resume is too large to be uploaded.</font></center>";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Your resume was not uploaded.</font></center>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                
                // To initially check if the email is registered in the system.
                $result = $this->login_database->candidate_resumeupdatecheck($this->input->post('candidate-profile-email')); 
                if ($result > 0) {
                    $data = array('resume_url' => $resumehashName.".".$FileType);
                    $this->db->where('candidate_email', $this->input->post('candidate-profile-email'));
                    $this->db->update('candidate_signup', $data);
                    if($this->db->trans_status() != '1') {
                        $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>There was an error uploading your file.</font></center>";
                    } else {
                        // 2. Refresh session data
                        $this->session->unset_userdata('user_data');                        
                        $sess_array = array('username' => $this->session->userdata('logged_in'));
                        $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
                        $this->session->set_userdata('user_data', $candidateinfo);
                        $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Your resume was successfully uploaded.<br />You may close this window.</font></center>";
                    }
                } else {
                    return false;
                }
                
            } else {
                $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>There was an error uploading your file.</font></center>";
            }
        }
        
        echo $msg;
    }
    
    // Candidate upload profile picture modal window
    public function candidate_profilepicupload() { $this->load->view('candidate/candidate_profilepicupload'); }
    
    //Candidate upload resume process
    public function candidate_profilepicupdate(){
        
        $msg ="";
        $target_dir = "images/candidate/photo/";
        
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
                
                $resized_file = "images/candidate/photo/tmp_".$FileName;
                $wmax = 220;
                $hmax = 220;
                candidate_img_resize($target_file, $resized_file, $wmax, $hmax, $FileExt);
                
                $resizedtarget_file = "images/candidate/photo/tmp_".$FileName;
                $thumbnail = "images/candidate/photo/thumb_".$FileName;
                $wthumb = 200;
                $hthumb = 200;
                candidate_img_thumb($resizedtarget_file, $thumbnail, $wthumb, $hthumb, $FileExt);
                unlink("images/candidate/photo/tmp_".$FileName);
                unlink("images/candidate/photo/".$profilepichashName . "." . $FileType);
                
                // To initially check if the email is registered in the system.
                $result = $this->login_database->candidate_resumeupdatecheck($this->input->post('candidate-profile-email')); 
                if ($result > 0) {
                    $data = array('candidate_profilepicurl' => "thumb_".$FileName);
                    $this->db->where('candidate_email', $this->input->post('candidate-profile-email'));
                    $this->db->update('candidate_signup', $data);
                    if($this->db->trans_status() != '1') {
                        $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>There was an error uploading your picture.</font></center>";
                    } else {
                        // 2. Refresh session data
                        $this->session->unset_userdata('user_data');                        
                        $sess_array = array('username' => $this->session->userdata('logged_in'));
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
        redirect( secure_url($curr_lang.'/candidate') );
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */