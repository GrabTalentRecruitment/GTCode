<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends MY_Controller {
    
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
        
        $curr_lang = $this->lang->lang();
        
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
            $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            redirect($url);
            exit;
        }
                        
    }
    
    // Employer Portal login page with user-email and password.
	public function index() { }    
}

/* End of file welcome.php */
/* Location: ./application/controllers/job.php */
