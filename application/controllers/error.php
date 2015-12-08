<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

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
                        
    }
    
    public function error_404() {
        
        $head_params = array(
            'title' => '404 | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('error/404', null, true);
        $this->load->view('common/404_layout', $template);
    }

}
/* End of file welcome.php */
/* Location: ./application/controllers/home.php */
