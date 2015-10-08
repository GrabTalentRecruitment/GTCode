<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidate extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        // Load form validation library
        $this->load->library('form_validation');
        $this->load->library('session');
        
        // Load form helper library
        $this->load->helper(array('form', 'url'));        
        $this->load->helper('view_helper');
        $this->load->helper('cookie');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->helper('download');
        
        $this->lang->load('common');
        
        // Load database
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
            'title' => 'Grab Talent | Candidate Portal',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('candidate/index', null, true);
        $this->load->view('common/layout', $template);
	}
    
    // Check for user login process
    public function candidate_login() {
                
        $data = array(
            'emailaddress' => $this->input->post('emailaddress'),
            'password' => $this->input->post('password')
        );
        
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
                echo "success;".https_url($this->lang->lang().'/candidate_dashboard');
            } else {
                // Step-3.1: Candidate did completed registration process. So we delete the candidate login data.
                $this->db->where('candidate_email', $this->input->post('emailaddress'));
                $this->db->delete('candidate_login');
                if ($this->db->affected_rows() == 1) {
                    echo "failure;Your did not complete your last sign-up with us, we have removed ur data from our records. Please complete the registration process again before login.";
                } else {
                    echo "failure;You have not completed the sign-up process, please register again with us.";
                }                
            }
        } else {
            echo "failure;Invalid Username or Password";
        }
    }
    
    // Validate and store registration data in database
    public function register() {        
        $head_params = array(
            'title' => 'GT | Candidate Registration',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('candidate/register', null, true);
        $this->load->view('common/layout', $template);
    }
    
    public function candidate_register(){
                
        $passWd = $this->input->post('inputregisterpassword');
        $confrmpassWd = $this->input->post('inputregistercnfrmpassword');
        
        if( $passWd != $confrmpassWd) {
            echo "error; Your Passwords do not match, please try again";
        } else {
            $this->session->set_userdata('emailaddress', $this->input->post('inputregisteremailadd'));
            $this->load->model('Grabtalent_signup_model');
            $code = Grabtalent_signup_model::generate_unique_code();
            $logindata = array(
                'candidate_code' => $code,
                'candidate_email' => $this->input->post('inputregisteremailadd'),
                'candidate_password' => md5($this->input->post('inputregisterpassword'))
            );
            $result = $this->login_database->registration_insert($logindata);
            if ($result == TRUE) {
                $this->session->set_userdata('emailaddress', $this->input->post('inputregisteremailadd'));
                echo "success;". https_url($this->lang->lang().'/signup');                
            } else {
                $this->session->set_flashdata('error_message', '');
                echo "error; Username / Email Address already exist!, please try again";
            }         
        }
            
    }
    
    // Candidate upload resume modal window
    public function candidate_resumeupload() {
        $this->load->view('candidate/candidate_resumeupload');
	}
    
    public function candidate_resumedownload () {
        $file_url = "./public/candidate/".$this->uri->segment(4);
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"" . $this->uri->segment(4) . "\""); 
        echo readfile($file_url);
    }
    
    //Candidate upload resume process
    public function candidate_resumeupdate(){
        
        $msg ="";
        $target_dir = "public/candidate/";
        $resumehashName = hash('sha512',basename($_FILES["fileToUpload"]["name"]."QxLUF1bgIAdeQX"));
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
    public function candidate_profilepicupload() {
        $this->load->view('candidate/candidate_profilepicupload');
	}
    
    //Candidate upload resume process
    public function candidate_profilepicupdate(){
        
        $msg ="";
        $target_dir = "images/candidate/photo/";
        $resumehashName = hash('sha512',basename($_FILES["fileToUpload"]["name"]."QxLUF1bgIAdeQX"));
        $uploadOk = 1;
        $FileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
        $target_file = $target_dir . $resumehashName . "." . $FileType;
        
        // Allow certain file formats
        if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg") {
            $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Only JPG, PNG & JPEG image formats are allowed.</font></center>";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1048576) {
            $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Your picture is too large to be uploaded.</font></center>";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg .= "<center><font size='2px' face='verdana,arial,sans-serif'>Your picture was not uploaded.</font></center>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                
                // To initially check if the email is registered in the system.
                $result = $this->login_database->candidate_resumeupdatecheck($this->input->post('candidate-profile-email')); 
                if ($result > 0) {
                    $data = array('candidate_profilepicurl' => $resumehashName.".".$FileType);
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
    
    // List all open jobs on jobs page
    public function jobs() {
        if($this->session->userdata('logged_in') != null || $this->session->userdata('logged_in') != "") {
        
            $head_params = array(
                'title' => 'GT | My Jobs',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            );
            $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
            $template["header"] = $this->load->view('common/candidate/header', null, true);
            $template["contents"] = $this->load->view('candidate/jobs', null, true);
            $this->load->view('common/candidate/layout', $template);
        } else {
            redirect(base_url('candidate'));
        }
    }
    
    // Candidate profile page.
    public function profile() {
        if($this->session->userdata('logged_in') != null || $this->session->userdata('logged_in') != "") {
        
            $head_params = array(
                'title' => 'GT | My Profile',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            );
            $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
            $template["header"] = $this->load->view('common/candidate/header', null, true);
            $template["contents"] = $this->load->view('candidate/profile', null, true);
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
            'brief_description' => $this->input->post('inputbriefDesc'),
            'video_resume_url' => $this->input->post('inputCandVidResume') 
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
        $job_detail = $this->login_database->read_job_information($jobnumber);
        $this->session->set_userdata('job_detail', $job_detail);

        $head_params = array(
            'title' => 'GT | '.$jobnumber,
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
        $template["header"] = $this->load->view('common/candidate/header', null, true);
        $template["contents"] = $this->load->view('candidate/job', null, true);
        $this->load->view('common/candidate/layout', $template);
    }
    
    public function registercandidate_application() {
        
        $this->load->model('grabtalent_application_model');
        
        $ApplicationModels = $this->_saveApplication(
            $this->input->post('jobId'),
            $this->input->post('candidateRefid'),
            $this->session->userdata('logged_in')
        );
                
        if($this->db->trans_status() == '1') {
            echo "accepted";
        } else {
            echo "failed";
        }

	}
    
    // To save / register jobs into job table.
    private function _saveApplication($jobNumber, $CandRefId, $CandEmail) {

        $ApplicationModels = array();

        $this->db->trans_start();
        
        $data_email = array('email' => $CandEmail);
        
        // setup password
        $ApplicationModel = new grabtalent_application_model();
        $ApplicationModel->row['candidate_appln_ref_id']         = $this->login_database->fetch_cand_refId($data_email);
        $ApplicationModel->row['candidate_coderefs_id']          = $this->login_database->fetch_cand_refId($data_email).$CandRefId;
        $ApplicationModel->row['candidate_email']                = $CandEmail;
        $ApplicationModel->row['candidate_appln_job_id']         = $jobNumber;
        $ApplicationModel->row['candidate_appln_stage']          = 'Application';
        $ApplicationModel->row['cand_appln_created_date']        = date('Y-m-d h:m:s');
        $ApplicationModel->row['cand_appln_last_modified_date']  = '';
        $ApplicationModel->save();
        array_push($ApplicationModels, $ApplicationModel);

        $this->db->trans_complete();

        return $ApplicationModels;
    }
    
    // Load Forgot Password Page
    public function forgotpassword() {
        
        $head_params = array(
            'title' => 'GT | Candidate Forgot Password',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('candidate/forgotpassword', null, true);
        $this->load->view('common/layout', $template);
    }
    
    // Reset Password
    public function resetpassword() {    

        $head_params = array(
            'title' => 'GT | Candidate Reset Password',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('candidate/resetpassword', null, true);
        $this->load->view('common/layout', $template);
    }
    
    // Change Password Page
    public function changepasswd() {
        $plaintext_string = $email_decoded = base64_decode(strtr($this->input->post('email'), '-_', '+/'));
        
        $email_data = array(
            'username' => $plaintext_string,
            'password' => $this->input->post('password')
        );
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
        
        $email_chk = $this->login_database->forgot_passwdemailchk($this->input->post("email"));
        if($email_chk == TRUE) {
            $message = $this->load->view('common/candidate/forgotpass',$this->input->post("email"),true);
            $this->email->set_newline('\r\n');
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
        $sessdata = array('oldcandidate_email' => $this->input->post("oldEmailAddress"), 'newcandidate_email' => $this->input->post("newEmailAddress") );
        $CandLogin_chk = $this->login_database->upd_CandRef_tbls($sessdata);
        if($CandLogin_chk > 0) {
            echo "success";
            $this->send_email_old($this->input->post("oldEmailAddress"),$this->input->post("newEmailAddress"));
            $this->send_email_new($this->input->post("oldEmailAddress"),$this->input->post("newEmailAddress"));            
        } else {
            echo "failure";
        }
    }
    
    public function send_email_old($oldEmail,$newEmail){
        
        $head_params = array( 'oldEMail' => $oldEmail, 'newEmail' => $newEmail );
        $message = $this->load->view('common/candidate/change_email',$head_params,true);
        $this->email->set_newline("\r\n");
        $this->email->from('do-not-reply@grabtalent.com','do-not-reply@grabtalent.com'); // change it to yours
        $this->email->to($oldEmail);// change it to yours
        $this->email->subject('Grab Talent : Your email address has been updated');
        $this->email->message($message);
        if($this->email->send()) { } else { log_message('error', 'Something was wrong with email sending for email to - '.$oldEmail); }
    }
    
    public function send_email_new($oldEmail,$newEmail){
        
        $head_params = array( 'oldEMail' => $oldEmail, 'newEmail' => $newEmail );
        $message = $this->load->view('common/candidate/change_email',$head_params,true);
        $this->email->set_newline("\r\n");
        $this->email->from('do-not-reply@grabtalent.com','do-not-reply@grabtalent.com'); // change it to yours
        $this->email->to($newEmail);// change it to yours
        $this->email->subject('Grab Talent : Your email address has been updated');
        $this->email->message($message);
        if($this->email->send()) { } else { log_message('error', 'Something was wrong with email sending for email to - '.$newEmail); }
    }
    
    // Logout from admin page
    public function logout() {  
        // Removing session data
        redirect( secure_url($curr_lang.'/candidate') );
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */