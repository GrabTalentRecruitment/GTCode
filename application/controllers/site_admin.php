<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load session library
        $this->load->model('login_database');
        $this->load->library('session');
        $this->load->library('email');
        
        // Load form helper library
        $this->load->helper(array('form', 'url'));
        $this->load->helper('cookie');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->helper('view_helper');
        $this->load->helper('directory');
        $this->load->helper('file');
        $this->load->helper('download');
        
        $this->lang->load('common');
        
        $curr_lang = $this->lang->lang();
        
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
            $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            redirect($url);
            exit;
        }
                
    }
    
    // Employer Portal login page with user-email and password.
	public function index() {
        $session_items = array('job_detail' => '', 'logged_in' => '', 'user_data' => '', 'admin_data' => '');
        $this->session->unset_userdata($session_items);
        
        $head_params = array(
            'title' => 'Admin Portal | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('site_admin/index', null, true);
        $this->load->view('common/layout', $template);
	}
        
    // Check for employer login process
    public function siteadmin_login() {
        
        $data = array(
            'username' => $this->input->post('emailaddress'),
            'password' => $this->input->post('password')
        );
        $result = $this->login_database->site_adminlogin($data);
        
        if($result == TRUE){                                
            // Add user data in session
            $admin_Details = $this->login_database->read_admin_information($this->input->post('emailaddress'));
            $this->session->set_userdata('logged_in', $this->input->post('emailaddress'));
            $this->session->set_userdata('admin_data', $admin_Details);
            echo "success,".https_url($this->lang->lang().'/site_admin/dashboard');
        } else {
            echo "error,Invalid Username or Password";
        }        
    }
    
    public function dashboard() {
        
        $head_params = array(
            'title' => 'Admin Dashboard | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/dashboard', null, true);
        $this->load->view('common/site_admin/layout', $template);
        	   
	}
    
    // Client List page view.
    public function employer_list() {
        
        $head_params = array(
            'title' => 'Client Listing Page | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/employer_list', null, true);
        $this->load->view('common/site_admin/layout', $template);
    }
    
    // Individual Client page view.
    public function employers() {
        $head_params = array(
            'title' => 'Client Page | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/employers', null, true);
        $this->load->view('common/site_admin/layout', $template);
    }    
    
    // Candidate List page view.
    public function candidate_list() {
        
        $head_params = array(
            'title' => 'Candidate Listing Page | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/candidate_list', null, true);
        $this->load->view('common/site_admin/layout', $template);
    }
    
    // Individual Candidate page view.
    public function candidates() {
        $head_params = array(
            'title' => 'Candidate Page | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/candidates', null, true);
        $this->load->view('common/site_admin/layout', $template);
    }    
    
    // Job List page view.
    public function jobs_list() {
        
        $head_params = array(
            'title' => 'Job Listing Page | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/jobs_list', null, true);
        $this->load->view('common/site_admin/layout', $template);
    }
    
    // Individual Job page view.
    public function job() {
        $jobId = $this->uri->segment(4);
        $job_detail = $this->login_database->read_job_information($jobId);
        $this->session->set_userdata('job_detail', $job_detail);

        $head_params = array(
            'title' => 'Job Page | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/job', null, true);
        $this->load->view('common/site_admin/layout', $template);
    }
        
    // Employer Portal login page with user-email and password.
	public function users() {
        
        $head_params = array(
            'title' => 'Create Recruiter | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/users', null, true);
        $this->load->view('common/site_admin/layout', $template);
	}
    
    // Employer Portal login page with user-email and password.
	public function menu_settings() {
        
        $head_params = array(
            'title' => 'Menu Settings | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/menu_settings', null, true);
        $this->load->view('common/site_admin/layout', $template);
	}
    
    public function get_menusettings(){
        
        $query = $this->db->query("SELECT lang_english, lang_chinese, lang_french FROM grabtalent_language WHERE lang_id =" . "'" . $this->input->post('menuitemName') . "'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $menuArray = $row->lang_english.",".$row->lang_chinese.",".$row->lang_french;
                echo $menuArray;
            }
        }
    }
    
    public function menusettings_update() {

        // 1. Updated Menu Settings data
        $menuitems_arrayupd = array(
            'lang_id' => $this->input->post('lang_id'),
            'lang_english' => $this->input->post('langenglish'),
            'lang_chinese' => $this->input->post('langchinese'),
            'lang_french' => $this->input->post('langfrench')
        );
        $this->db->where('lang_id', $this->input->post('lang_id'));
        $this->db->update('grabtalent_language', $menuitems_arrayupd);
        if($this->db->affected_rows() > 0) {
            echo "success;Menu Item values updated successfully.";
        } else {
            echo "failure;Something went wrong, please try again.";
        }
    }
    
	public function dropdown_settings() {
        
        $head_params = array(
            'title' => 'Drop-Down Settings | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/dropdown_settings', null, true);
        $this->load->view('common/site_admin/layout', $template);
	}
    
    public function dropdown_itemchange() {
        
        $head_params = array(
            'title' => 'Edit Drop-Down Items | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/dropdown_itemchange', null, true);
        $this->load->view('common/site_admin/layout', $template);
	}
    
    public function dropdown_itemadd() {
        
        $head_params = array(
            'title' => 'Add Drop-Down Items | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/dropdown_itemadd', null, true);
        $this->load->view('common/site_admin/layout', $template);
	}
    
    public function dropdown_addtblItem() {
        
        $postString = explode( ",", str_replace("'","",$this->input->post('JSonString')) );
        $tmptableName = end( explode( ",", str_replace("'","",$this->input->post('JSonString')) ) );
        $tableName = explode( ":", $tmptableName );
        $data = array();
        foreach( $postString as $value){
            $tmp = explode(":", $value);
            $data[ $tmp[0] ] = $tmp[1];
        }
        // As the last value in the array is table-name, we remove using the below array method.
        array_pop($data);
        $this->db->insert($tableName[1], $data); 
        if($this->db->affected_rows() > 0) {
            echo "success;Drop Down Item was added successfully.:".https_url($this->lang->lang().'/site_admin/dropdown_itemchange/'.$tableName[1]);
        } else {
            echo "failure;Something went wrong, please try again.";
        }
    }
    
    public function dropdown_deltblItem() {
        $query = $this->db->query("DELETE FROM ".$this->input->post('tableName')." WHERE ".$this->input->post('columnName')." = '" . $this->input->post('columnVal') . "'");
        if($this->db->affected_rows() > 0) {
            echo "success;Drop Down Item was deleted successfully.";
        } else {
            echo "failure;Something went wrong, please try again.";
        }
    }
    
    public function site_errors() {
        
        $head_params = array(
            'title' => 'Overall Site Errors | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/site_errors', null, true);
        $this->load->view('common/site_admin/layout', $template);
	}
    
    public function file_download() {
        
    	$file_url = "./application/logs/".$this->uri->segment(4);
    	$data = file_get_contents($file_url); // Read the file's contents
    	$name = $this->uri->segment(4);
    	echo force_download($name, $data);
    }
    
    public function clientuser_create(){
        
        $newRecEmail = $this->input->post('inputRecruiterContactEmail');
        
        $condition = "employer_contact_email =" . "'" . $this->input->post('inputRecruiterContactEmail') . "'";
        $this->db->select('*')->from('employers')->where($condition);
        $query = $this->db->get();
        $newRecEmail_cnt = $query->num_rows();
        
        if($newRecEmail_cnt == 0) {
            
            // Generate random password
            $recruitertmpPasswd = $this->generateStrongPassword(8);
            
            //To retrieve email from session.
            $email = $this->session->userdata('logged_in');
                    
            // Check validation for user input in SignUp form
            $this->load->model('grabtalent_employers_model');
            $code = Grabtalent_employers_model::generate_unique_code();
                            
            $ClientModels = $this->_saveClients(
                $this->input->post('inputRecruiterName'),
                $this->input->post('inputRecruiterWebAddress'),
                $this->input->post('inputRecruiterPhone'),
                $this->input->post('inputRecruiterFax'),
                $this->input->post('inputRecruiterAddress'),
                $this->input->post('inputRecruiterCountry'),
                $this->input->post('inputRecruiterDescription'),
                $this->input->post('inputRecruiterContactFName'),
                $this->input->post('inputRecruiterContactLName'),
                $this->input->post('inputRecruiterContactEmail'),
                $this->input->post('inputRecruiterStatus'),
                $email
            );
            
            if($this->db->trans_status() == '1') {                                
                echo "success:".$ClientModels.";Client was created successfully, redirecting to client page!";
                
                $empData = array(  
                            'employer_code' => $code, 
                            'employer_email' => $this->input->post('inputRecruiterContactEmail'), 
                            'employer_password' => md5($recruitertmpPasswd)                            
                        );
                $this->db->insert('employer_login', $empData);
                if($this->db->affected_rows() > 0) {
                    $this->sendWelcomeEmail($this->input->post('inputRecruiterContactEmail'), $recruitertmpPasswd);
                    $intvtempl = "Hi {candidate_name},<br /><br />Thanks for your application to {job_title}. We were impressed by your background and would like to invite you to interview at {interview_location} to tell you a little more about the position and get to know you better.<br/><br/>Please let me know which of the following times work for you, and I can send over a confirmation and details:<br/><br />{interview_datetime}<br/><br />Looking forward to meeting you,<br/><br />{employer_email}<br/>".$this->input->post('inputRecruiterPhone');
                    
                    $interviewtmpl_arrayins = array( 
			        'employer_code' => $ClientModels,
			        'employer_name' => $this->input->post('inputRecruiterName'),
			        'employer_contact_email' => $this->input->post('inputRecruiterContactEmail'),
			        'template_interview' => $intvtempl,
			        'template_offer' => $intvtempl,
			        'template_created_date' => date('Y-m-d h:m:s')
			);
		    $this->db->insert('grabtalent_template', $interviewtmpl_arrayins);
	            
                } else {
                    echo "failure;Something went wrong, please try again.";
                }
                
            } else {
                echo "failure;Client was not saved, please try again!";
                $this->db->trans_rollback();
            }
        } else {
            echo "failure;Client with same email already exists, please choose other recruiter name!";
            $this->db->trans_rollback();
        }
    }
    
    // To save / register jobs into job table.
    private function _saveClients($recruiterName, $recruiterWebAdd, $recruiterPhone, $recruiterFax, $recruiterAddress, $recruiterCountry, $recruiterDescription, $recruiter_ctnt_fname, $recruiter_ctnt_lname, $recruiter_ctnt_email, $recruiterStatus, $createdBy) {

        $ClientModels = array();

        $this->db->trans_start();                                

        // setup password
        $ClntModel = new grabtalent_employers_model();
        $ClntModel->row['employer_code']                    = 'EMP-'.date('ym').'-'.mt_rand(10000000, 99999999);
        $ClntModel->row['employer_name']                    = $recruiterName;
        $ClntModel->row['employer_web_address']             = $recruiterWebAdd;
        $ClntModel->row['employer_phone']                   = $recruiterPhone;
        $ClntModel->row['employer_fax']                     = $recruiterFax;
        $ClntModel->row['employer_address']                 = $recruiterAddress;
        $ClntModel->row['employer_country']                 = $recruiterCountry;
        $ClntModel->row['employer_description']             = $recruiterDescription;
        $ClntModel->row['employer_contact_firstname']       = $recruiter_ctnt_fname;
        $ClntModel->row['employer_contact_lastname']        = $recruiter_ctnt_lname;
        $ClntModel->row['employer_contact_email']           = $recruiter_ctnt_email;
        $ClntModel->row['employer_logo_url']                = '';
        $ClntModel->row['employer_video_url']               = '';
        if($recruiterStatus == 'off') {
            $ClntModel->row['employer_active']              = 'No';    
        } else {
            $ClntModel->row['employer_active']              = 'Yes';
        }
        $ClntModel->row['employer_created_by']              = $createdBy;
        $ClntModel->row['employer_created_date']            = date('Y-m-d h:m:s');
        $ClntModel->row['employer_last_modified_by']        = '';
        $ClntModel->row['employer_last_modified_date']      = '';
        $ClntModel->save();
        array_push($ClientModels, $ClntModel);
        
        $this->db->trans_complete();
        
        return $ClntModel->row['employer_code'];
    }
        
    // Logout from admin page
    public function logout() {    
        // Removing session data
        redirect( secure_url($curr_lang.'/site_admin') );
    }
    
    // Candidate profile page.
    public function employer_profile() {
        $head_params = array(
            'title' => 'My Profile | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/employer_profile', null, true);
        $this->load->view('common/site_admin/layout', $template);
    }
    
    // Send Welcome email to new recruiter with temporary password.    
    public function sendWelcomeEmail($emailAdd, $passWd) {
        
        $head_params = array('recruiterEmailAdd' => $emailAdd, 'recruitertmpPwd' => $passWd);
        $message = $this->load->view('common/site_admin/welcome_email',$head_params,true);
        $this->email->set_newline("\r\n");
        $this->email->from('do-not-reply@grab-talent.net','do-not-reply@grab-talent.net'); // change it to yours
        $this->email->to($emailAdd);// change it to yours
        $this->email->subject('Welcome to Grab Talent');
        $this->email->message($message);
        if($this->email->send()) {
            echo "success;Please check your email for login details!";
        } else {
            echo "failure;Please try again as the email was not sent";
            log_message('error', 'Something went wrong while sending email to -'.$emailAdd);
        }
    }
    
    function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds') {
    	$sets = array();
    	if(strpos($available_sets, 'l') !== false)
    		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
    	if(strpos($available_sets, 'u') !== false)
    		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    	if(strpos($available_sets, 'd') !== false)
    		$sets[] = '23456789';
    	if(strpos($available_sets, 's') !== false)
    		$sets[] = '!@#$%&*?';
    	$all = '';
    	$password = '';
    	foreach($sets as $set)
    	{
    		$password .= $set[array_rand(str_split($set))];
    		$all .= $set;
    	}
    	$all = str_split($all);
    	for($i = 0; $i < $length - count($sets); $i++)
    		$password .= $all[array_rand($all)];
    	$password = str_shuffle($password);
    	if(!$add_dashes)
    		return $password;
    	$dash_len = floor(sqrt($length));
    	$dash_str = '';
    	while(strlen($password) > $dash_len)
    	{
    		$dash_str .= substr($password, 0, $dash_len) . '-';
    		$password = substr($password, $dash_len);
    	}
    	$dash_str .= $password;
    	return $dash_str;
    }   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */