<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siteadmin_dashboard extends CI_Controller {

    // Employer Portal login page with user-email and password.
	public function index() {
        
        // Load form helper library
        $this->load->helper('form');
        
        $this->load->helper('view_helper');
        
        // Load form validation library
        $this->load->library('form_validation');
        
        // Load session library
        $this->load->helper('language');        
        $this->load->helper('url');
        $this->lang->load('common');
        
        // Load database
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
        redirect( secure_url($curr_lang.'/site_admin') );
    }   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */