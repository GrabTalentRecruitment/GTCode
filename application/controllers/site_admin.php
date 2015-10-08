<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load session library
        $this->load->library('session');
        
        // Load form helper library
        $this->load->helper(array('form', 'url'));
        $this->load->helper('cookie');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->helper('view_helper');
        
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
    
    // Employer Portal login page with user-email and password.
	public function index() {
        $session_items = array('job_detail' => '', 'logged_in' => '', 'user_data' => '', 'admin_data' => '');
        $this->session->unset_userdata($session_items);
        
        $head_params = array(
            'title' => 'Grab Talent Admin Portal',
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
            'title' => 'GT Admin Dashboard',
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
            'title' => 'GT | Client Listing Page',
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
            'title' => 'GT | Client Page',
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
            'title' => 'GT | Candidate Listing Page',
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
            'title' => 'GT | Candidate Page',
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
            'title' => 'GT | Job Listing Page',
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
            'title' => 'GT | Job Page',
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
            'title' => 'GT Admin Create User',
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
            'title' => 'GT Menu Settings',
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
    
    public function clientuser_create(){
        
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
                        'employer_password' => md5('grab123')                            
                    );
            $this->db->insert('employer_login', $empData);
        } else {
            echo "failure;Client was not saved, please try again!";
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
            'title' => 'GT | My Profile',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/site_admin/head', $head_params, true);
        $template["header"] = $this->load->view('common/site_admin/header', null, true);
        $template["contents"] = $this->load->view('site_admin/employer_profile', null, true);
        $this->load->view('common/site_admin/layout', $template);
    }    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */