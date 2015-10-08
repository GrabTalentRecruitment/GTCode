<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');
        $this->load->helper('view_helper');
        $this->load->helper('language');
        $this->load->helper('url');
        
        // Load form validation library
        $this->load->library('email');
        $this->lang->load('common');
        
        // Load database
        $this->load->model('login_database');
        
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
            $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            redirect($url);
            exit;
        }
    }    
    
	public function index() {
        if($this->session->userdata('emailaddress') != null || $this->session->userdata('emailaddress') != "") {
            $head_params = array(
                'title' => 'Candidate Registration | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            );
                
            $template["head"] = $this->load->view('common/head', $head_params, true);
            $template["header"] = $this->load->view('common/header', null, true);
            $template["contents"] = $this->load->view('candidate/signup', null, true);
            $this->load->view('common/layout', $template);
        } else {
            redirect( https_url('candidate') );
        }
	}
    
    // Validate and store registration data in database
    public function register_submit() {
        
        //To retrieve email from session.
        $email = $this->session->userdata('emailaddress');
        $dataArr = array('email' => $this->session->userdata('emailaddress'));
        $refId = $this->login_database->fetch_cand_refId($dataArr);
        $coderefId = $refId.'-'.substr(number_format(time() * rand(),0,'',''),0,6);
        
        // Check validation for user input in SignUp form
        $this->load->model('grabtalent_signup_model');       
        
        $SignupModels = $this->_saveSignups(
            $refId,
            $coderefId,
            $this->input->post('inputfirstName'),
            $this->input->post('inputlastName'),
            $email,
            $this->input->post('inputphoneNumberCode'),
            $this->input->post('inputphoneNumber'),
            $this->input->post('inputGender'),
            $this->input->post('inputNationality'),
            $this->input->post('inputbriefDesc'),
            $this->input->post('inputTotExperience'),            
            $this->input->post('inputexpAnnualSalCode'),
            $this->input->post('inputexpAnnualSal'),            
            $this->input->post('inputjobalertagreement')
        );
        if($this->db->trans_status() == '1') {
            
            // Once candidate signup is successful, we create his work-experience.
            $this->load->model('candidate_employment_model');
            
            $WorkExpModels = $this->_saveEmployments(
                $refId,
                $coderefId,
                $email,
                $this->input->post('inputCurrentcompany'),
                $this->input->post('inputCurrentposition'),
                $this->input->post('inputCompanylocation'),
                $this->input->post('inputcurrentAnnualSal')
            );
            if($this->db->trans_status() == '1') {
                //Once candidate signup is successful, we insert his academic details
                $eduExpArray = array();
                $educArray = explode(';,',$this->input->post('inputEducationLvl'));
                for($i = 0; $i < sizeof($educArray); $i++){
                    $arrval = explode(",",rtrim($educArray[$i], ";"));
                    array_push($eduExpArray, $arrval);
                }
                for($j = 0; $j < sizeof($eduExpArray); $j++){
                    $startDt = explode("-",$eduExpArray[$j][4]);
                    $endDt = explode("-",$eduExpArray[$j][5]);
                    $mthArr = array('1' => 'Jan','2' => 'Feb','3' => 'Mar','4' => 'Apr','5' => 'May','6' => 'Jun','7' => 'Jul','8' => 'Aug','9' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                    $strtDtkey = array_search($startDt[1], $mthArr);
                    $endDtkey = array_search($endDt[1], $mthArr);
                    $finalstartDt = $startDt[2]."-".$strtDtkey."-".$startDt[0];
                    $finalendDt = $endDt[2]."-".$endDtkey."-".$endDt[0];
                    $candCodeRefId = $coderefId."-".$j;
                    $edudataArr = array('candidate_ref_id' => $refId,'candidate_coderefs_id' => $candCodeRefId,'candidate_email' => $this->session->userdata('emailaddress'), 'candidate_univ_name' => $eduExpArray[$j][1], 'candidate_degree' => $eduExpArray[$j][2], 'candidate_field_of_study' => $eduExpArray[$j][3], 'candidate_edu_startDt' => $finalstartDt, 'candidate_edu_endDt' => $finalendDt);
                    $this->db->insert('candidate_education', $edudataArr);
                }
                redirect( https_url($this->lang->lang().'/signup/signup_splash') );
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    private function _saveEmployments($cand_refIds, $cand_codeRefIds, $email, $currCompany, $currPosition, $currCompanyloc, $curreAnnualSal) {

        $WorkExpModels = array();

        $this->db->trans_start();

        // setup password
        $WorkExpModel = new candidate_employment_model();
        $WorkExpModel->row['candidate_ref_id']                   = $cand_refIds;
        $WorkExpModel->row['candidate_coderefs_id']              = $cand_codeRefIds;
        $WorkExpModel->row['candidate_email']                    = $email;
        $WorkExpModel->row['candidate_emp_name']                 = $currCompany;
        $WorkExpModel->row['candidate_curr_designation']         = $currPosition;
        $WorkExpModel->row['candidate_salary']                   = $curreAnnualSal;
        $WorkExpModel->row['candidate_emp_location']             = $currCompanyloc;
        $WorkExpModel->row['candidate_emp_startDt']              = date('Y-m-d');
        $WorkExpModel->row['candidate_curr_job']                 = 'true';
        $WorkExpModel->row['candidate_emp_endDt']                = date('Y-m-d');
        $WorkExpModel->save();
        array_push($WorkExpModels, $WorkExpModel);

        $this->db->trans_complete();

        return $WorkExpModels;
    }
    
    private function _saveSignups($cand_refIds, $cand_codeRefIds, $firstname, $lastname, $email, $phoneNumberCode, $phone, $gender, $nationality, $briefDesc, $totalWorkexp, $expectAnnualSalCode, $expectAnnualSal, $jobAlert) {

        $SignupModels = array();

        $this->db->trans_start();

        // setup password
        $SignupModel = new grabtalent_signup_model();
        $SignupModel->row['candidate_ref_id']                   = $cand_refIds;
        $SignupModel->row['candidate_coderefs_id']              = $cand_codeRefIds;
        $SignupModel->row['candidate_firstname']                = $firstname;
        $SignupModel->row['candidate_lastname']                 = $lastname;
        $SignupModel->row['candidate_email']                    = $email;
        $SignupModel->row['candidate_phonecountrycode']         = $phoneNumberCode;
        $SignupModel->row['candidate_phonenumber']              = $phone;
        $SignupModel->row['candidate_gender']                   = $gender;
        $SignupModel->row['candidate_nationality']              = $nationality;
        $SignupModel->row['brief_description']                  = $briefDesc;
        $SignupModel->row['candidate_total_experience']         = $totalWorkexp;
        $SignupModel->row['candidate_exp_annualsalcode']        = $expectAnnualSalCode;
        $SignupModel->row['candidate_exp_annualsalary']         = $expectAnnualSal;
        $SignupModel->row['job_alert_agreement']                = $jobAlert;
        $SignupModel->row['registration_date']                  = date('Y-m-d h:m:s');
        $SignupModel->row['created_date']                       = date('Y-m-d h:m:s');
        $SignupModel->row['resume_url']                         = '';
        $SignupModel->row['video_resume_url']                   = '';
        $SignupModel->save();
        array_push($SignupModels, $SignupModel);

        $this->db->trans_complete();

        return $SignupModels;
    }
    
    public function signup_splash() {
        $head_params = array(
            'title' => 'Candidate Registration | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent'
        );
            
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('candidate/signup_splash', null, true);
        $this->load->view('common/layout', $template);
	}  
    
    // Send forgot password link to recruiter.    
    public function sendWelcomeEmail($emailAdd) {
        
        $message = $this->load->view('common/candidate/welcome_email','',true);
        $this->email->set_newline("\r\n");
        $this->email->from('do-not-reply@grabtalent.com','do-not-reply@grabtalent.com'); // change it to yours
        $this->email->to($emailAdd);// change it to yours
        $this->email->subject('Grab Talent : Congratulations');
        $this->email->message($message);
        if($this->email->send()) {
            echo "success;Please check your email for the reset password link!";
        } else {
            echo "failure;Please try again as the email was not sent";
        }
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */