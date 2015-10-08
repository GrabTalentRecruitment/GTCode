<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recruiter_dashboard extends CI_Controller {

    // Employer Portal login page with user-email and password.
	public function __construct() {
        parent::__construct();
	   
        // Load session library
        $this->load->library('session');
        
        // Load form helper library
        $this->load->helper(array('form', 'url'));
        $this->load->helper('view_helper');
        $this->load->helper('language');
        $this->load->helper('url');
        
        $this->lang->load('common');
        
        // Load database Model
        $this->load->model('login_database');
        
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
            $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            redirect($url);
            exit;
        }
    }
    
    // Logout from admin page
    public function logout() {    
        // Removing session data
        redirect( secure_url('recruiter') );
    }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */