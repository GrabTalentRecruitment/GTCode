<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load form helper library
        $this->load->helper(array('form', 'url'));
        
        $this->load->helper('view_helper');
        
        // Load form validation library
        $this->load->library('form_validation');
        
        // Load session library
        $this->load->library('session');
        
        $this->load->helper('cookie');
        $this->load->helper('language');
        $this->load->helper('url');
        
        $this->lang->load('common');
        
        $this->load->helper('download');
        
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
        if($this->session->userdata('logged_in') != null || $this->session->userdata('logged_in') != "") {
            
            $head_params = array(
                'title' => 'Candidate Portal | Grab Talent',
                'description' => "Grab Talent is the best online recruitment portal",
                'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
            );
            $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
            $template["header"] = $this->load->view('common/candidate/header', null, true);
            $template["contents"] = $this->load->view('candidate/candidate_dashboard', null, true);
            $template["footer"] = $this->load->view('common/footer', null, true);
            $this->load->view('common/candidate/layout', $template);
        } else {
            redirect(base_url('candidate'));
        }
    }
    
    // *********************************** Candidate Skill Section - Start ***********************************
    
    // Validate and update skill data in database
    public function add_skill() {
        
        // To initially check if the skills already exists in the system.
        $this->db->select('*')->from('candidate_skills')->where('candidate_ref_id', $this->input->post('candidateRefId') )->where('candidate_skill_name', $this->input->post('skillname') );
        $query = $this->db->get();
        if ($query->num_rows() <= 0) {
	        $data = array('candidate_ref_id'=> $this->input->post('candidateRefId'),'candidate_skill_name' => $this->input->post('skillname'), 'candidate_skill_level' => $this->input->post('skilllevel'), 'candidate_skill_rating' => $this->input->post('skillrating'), 'candidate_skill_created_date' => date('Y-m-d h:m:s') );
	        
	        $this->db->insert('candidate_skills', $data);
	        if($this->db->trans_status() == '1') {
	            echo "success;Skill was added successfully, you will be redirected shortly";            
	        } else {
	            echo "failure;Something went wrong, please try again";
	        }
        } else {
        	echo "failure;Skill already exists";
        }
    }
    
    // Validate and update skill data in database
    public function remove_skill() {
        
        // To initially check if the skills already exists in the system.
        $this->db->select('*')->from('candidate_skills')->where('candidate_ref_id', $this->input->post('candidateRefId') )->where('candidate_skill_ref_id', $this->input->post('skilldelvalue'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
	        $data = array('candidate_ref_id'=> $this->input->post('candidateRefId'),'candidate_skill_ref_id' => $this->input->post('skilldelvalue') );
	        $this->db->delete('candidate_skills', $data);
	        if($this->db->trans_status() == '1') {
	            echo "success;Skill was deleted successfully";            
	        } else {
	            echo "failure;Something went wrong, please try again";
	        }
        } else {
        	echo "failure;Skill does not exists";
        }
        
    }
    // *********************************** Candidate Skill Section - End ***********************************
    
    // *********************************** Candidate References Section - Start ***********************************
    // Add Candidate References
    public function add_candidate_ref() {
        
        $candid_refId = array('candidate_refId' => $this->input->post('candidateRefId'));
        $coderefId = $this->login_database->fetch_cand_coderefId($candid_refId);
        
        // To initially check if the email is registered in the system.
        $data = array('candidate_ref_id' => $this->input->post('candidateRefId'), 'candidate_coderefs_id' => $coderefId, 'candidate_ref_name' => $this->input->post('candRefName'), 'candidate_ref_company' => $this->input->post('candRefCompany'),'candidate_ref_email' => $this->input->post('candRefEmail'),'candidate_ref_contact' => $this->input->post('candRefContact'));
        $this->db->insert('candidate_references', $data);
        if($this->db->trans_status() == '1') {
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $this->session->unset_userdata('user_data');
            $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
            $this->session->set_userdata('user_data', $candidateinfo);
            echo "success;Candidate Reference was added successfully, you will be redirected shortly";
        } else {
            echo "failure;Candidate Reference was not added. Something went wrong, please try again";            
        }
    }
    
    // Fetch Candidate References Details from DB
    public function fetch_candidate_ref() {
        
        // Query to check whether username already exist or not
        $condition = "Id =" . "'" . $this->input->post('candidaterefsId') . "'";
        $this->db->select('*')->from('candidate_references')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dataArr = array();
            foreach ($query->result() as $row) {
               $dataArr = array('candidate_ref_name' => $row->candidate_ref_name,
                            'candidate_ref_company' => $row->candidate_ref_company,
                            'candidate_ref_email' => $row->candidate_ref_email,
                            'candidate_ref_contact' => $row->candidate_ref_contact);
            }
            print_r( json_encode($dataArr) );
        } else {
            return false;
        }
        
    }
    
    // Update Candidate References
    public function edit_candidate_ref() {
        
        // To initially check if the email is registered in the system.
        $data = array(
                    'candidate_ref_name' => $this->input->post('candRefName'), 
                    'candidate_ref_company' => $this->input->post('candRefCompany'),
                    'candidate_ref_email' => $this->input->post('candRefEmail'),
                    'candidate_ref_contact' => $this->input->post('candRefContact')
                    );
        $this->db->where('Id', $this->input->post('candidateRefCode'));
        $this->db->update('candidate_references', $data);
        if($this->db->trans_status() == '1') {            
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $this->session->unset_userdata('user_data');
            $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
            $this->session->set_userdata('user_data', $candidateinfo);
            echo "success;Candidate Reference was updated successfully, you will be redirected shortly";
        } else {
            echo "failure;Candidate Reference was not updated. Something went wrong, please try again";            
        }
    }
    
    // Delete Candidate References
    public function delete_candidate_ref() {        
        $CandRefdata = array(
            'candidate_coderefs_id' => $this->input->post('candidate_coderefs_id'),
        );
        $this->db->where('Id', $this->input->post('refId'));
        $this->db->delete('candidate_references', $CandRefdata);
        if($this->db->trans_status() == '1') {            
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $this->session->unset_userdata('user_data');
            $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
            $this->session->set_userdata('user_data', $candidateinfo);
            echo "success;Candidate Reference was deleted successfully";
        } else {
            echo "failure;Candidate Reference was not deleted. Something went wrong, please try again";            
        }
    }
    
    // *********************************** Candidate References Section - End ***********************************
    
    // *********************************** Academic Details Section - Start ***********************************    
    // Add Candidate References
    public function add_academic_details() {
        
        $candid_refId = array('candidate_refId' => $this->input->post('candidateRefId'));
        $coderefId = $this->login_database->fetch_cand_coderefId($candid_refId);
        
        $query = $this->db->select('candidate_email')->where('candidate_ref_id', $this->input->post('candidateRefId') )->get('candidate_signup');
        foreach ($query->result_array() as $row) { $candEmail = $row['candidate_email']; }
        
        // To initially check if the email is registered in the system.
        $data = array(
                    'candidate_ref_id' => $this->input->post('candidateRefId'),
                    'candidate_coderefs_id' => $coderefId,
                    'candidate_email' => $candEmail,  
                    'candidate_univ_name' => $this->input->post('CandUnivname'), 
                    'candidate_degree' => $this->input->post('CandDegree'),
                    'candidate_field_of_study' => $this->input->post('CandFieldofStdy'),
                    'candidate_edu_startDt' => $this->input->post('CandAcadStartDt'),
                    'candidate_edu_endDt' => $this->input->post('CandAcadEndDt')
                    );
        $this->db->insert('candidate_education', $data);
        if($this->db->trans_status() == '1') {            
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $this->session->unset_userdata('user_data');
            $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
            $this->session->set_userdata('user_data', $candidateinfo);
            echo "success;Candidate Academic Details was added successfully, you will be redirected shortly";
        } else {
            echo "failure;Candidate Academic Details was not added. Something went wrong, please try again";
        }
    }
    
    // Fetch Candidate Academic Details from DB
    public function fetch_academic_details() {
        
        // Query to check whether username already exist or not
        $this->db->select('*')->from('candidate_education')->where('candidate_coderefs_id', $this->input->post('candidatecodrefsId') )->where('Id', $this->input->post('candidaterefsId') );
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dataArr = array();
            foreach ($query->result() as $row) {
               $dataArr = array('candidate_univ_name' => $row->candidate_univ_name,
                            'candidate_degree' => $row->candidate_degree,
                            'candidate_field_of_study' => $row->candidate_field_of_study,
                            'candidate_edu_startDt' => $row->candidate_edu_startDt,
                            'candidate_edu_endDt' => $row->candidate_edu_endDt
                            );
            }
            print_r( json_encode($dataArr) );
        } else {
            return false;
        }        
    }
    
    // Update Candidate Academic Details
    public function edit_academic_details() {

        // To initially check if the email is registered in the system.
        $data = array(
                    'candidate_univ_name' => $this->input->post('CandUnivname'), 
                    'candidate_degree' => $this->input->post('CandDegree'),
                    'candidate_field_of_study' => $this->input->post('CandFieldofStdy'),
                    'candidate_edu_startDt' => $this->input->post('CandAcadStartDt'),
                    'candidate_edu_endDt' => $this->input->post('CandAcadEndDt')
                    );
        $this->db->where('Id', $this->input->post('candidateRefCode'));
        $this->db->where('candidate_coderefs_id', $this->input->post('candidateRefId'));
        $this->db->update('candidate_education', $data);
        if($this->db->trans_status() == '1') {            
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $this->session->unset_userdata('user_data');
            $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
            $this->session->set_userdata('user_data', $candidateinfo);
            echo "success;Candidate Academic Details was updated successfully, you will be redirected shortly";
        } else {
            echo "failure;Candidate Academic Details was not updated. Something went wrong, please try again";
        }
    }
    
    // Delete Candidate Academic Details
    public function delete_academic_details() {        
        $CandAcadRefdata = array(
            'candidate_coderefs_id' => $this->input->post('candidatecodrefsId'),
        );
        $this->db->where('Id', $this->input->post('refId'));
        $this->db->delete('candidate_education', $CandAcadRefdata);
        if($this->db->trans_status() == '1') {            
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $this->session->unset_userdata('user_data');
            $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
            $this->session->set_userdata('user_data', $candidateinfo);
            echo "success;Candidate Academic Details was deleted successfully";
        } else {
            echo "failure;Candidate Academic Details was not deleted. Something went wrong, please try again";
        }
    }
    // *********************************** Academic Details Section - End ***************************************
    
    // *********************************** Work Experience Section - Start ***********************************
    // Validate and Add Candidate Work Experience data into DB
    public function add_Workexp() {
        
        $candid_refId = array('candidate_refId' => $this->input->post('candidateRefId'));
        $coderefId = $this->login_database->fetch_cand_coderefId($candid_refId);
        
        $query = $this->db->select('candidate_email')->where('candidate_ref_id', $this->input->post('candidateRefId') )->get('candidate_signup');
        foreach ($query->result_array() as $row) { $candEmail = $row['candidate_email']; }
        
        $WorkExpdata = array(
            'candidate_ref_id' => $this->input->post('candidateRefId'),
            'candidate_coderefs_id' => $coderefId,
            'candidate_email' => $candEmail,
            'candidate_emp_name' => $this->input->post('employername'),
            'candidate_curr_designation' => $this->input->post('employerdesig'),
            'candidate_salary' => $this->input->post('employersal'),
            'candidate_emp_location' => $this->input->post('employerctry'),
            'candidate_emp_startDt' => $this->input->post('employerStartDt'),
            'candidate_curr_job' => $this->input->post('Candemp_currJob'), 
            'candidate_emp_endDt' => $this->input->post('employerEndDt')
        );
        $this->db->insert('candidate_employment', $WorkExpdata);
        if($this->db->trans_status() == '1') {            
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $this->session->unset_userdata('user_data');
            $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
            $this->session->set_userdata('user_data', $candidateinfo);
            echo "success;Candidate Work Experience was added successfully, you will be redirected shortly";
        } else {
            echo "failure;Candidate Work Experience was not added. Something went wrong, please try again";            
        }
    }
    
    // Fetch Candidate Work Experience Details
    public function fetch_work_exp() {
        
        // Query to check whether username already exist or not
        $condition = "Id =" . "'" . $this->input->post('candidaterefsId') . "'";
        $this->db->select('*')->from('candidate_employment')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dataArr = array();
            foreach ($query->result() as $row) {
               $dataArr = array(
                            'candidate_emp_name' => $row->candidate_emp_name,
                            'candidate_curr_designation' => $row->candidate_curr_designation,
                            'candidate_salary' => $row->candidate_salary,
                            'candidate_emp_location' => $row->candidate_emp_location,
                            'candidate_responsibilities' => $row->candidate_responsibilities,
                            'candidate_emp_startDt' => $row->candidate_emp_startDt,
                            'candidate_curr_job' => $row->candidate_curr_job,
                            'candidate_emp_endDt' => $row->candidate_emp_endDt
                            );
            }
            print_r( json_encode($dataArr) );
        } else {
            return false;
        }        
    }
    
    // Update Candidate Work Experience values
    public function edit_work_exp() {
        
        $WorkExpUpddata = array(
            'candidate_emp_name' => $this->input->post('employername'),
            'candidate_curr_designation' => $this->input->post('employerdesig'),
            'candidate_salary' => $this->input->post('employersal'),
            'candidate_emp_location' => $this->input->post('employerctry'),
            'candidate_emp_startDt' => $this->input->post('employerStartDt'),
            'candidate_curr_job' => $this->input->post('Candemp_currJob'),
            'candidate_emp_endDt' => $this->input->post('employerEndDt')
        );
        
        $this->db->where('Id', $this->input->post('candidateRefCode'));
        $this->db->update('candidate_employment', $WorkExpUpddata);
        if($this->db->trans_status() == '1') {            
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $this->session->unset_userdata('user_data');
            $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
            $this->session->set_userdata('user_data', $candidateinfo);
            echo "success;Candidate Work Experience was updated successfully, you will be redirected shortly";
        } else {
            echo "failure;Candidate Work Experience was not updated. Something went wrong, please try again";            
        }
    }
    
    // Remove Candidate Work Experience
    public function delete_Workexp() {        
        $WorkExpdata = array(
            'candidate_email' => $this->input->post('candidateemail'),
            'candidate_coderefs_id' => $this->input->post('candidatecodrefsId'),
        );
        $this->db->where('Id', $this->input->post('refId'));
        $this->db->delete('candidate_employment', $WorkExpdata);
        if($this->db->trans_status() == '1') {            
            $sess_array = array('username' => $this->session->userdata('logged_in'));
            $this->session->unset_userdata('user_data');
            $candidateinfo = $this->login_database->read_user_information($sess_array,'candidate');
            $this->session->set_userdata('user_data', $candidateinfo);
            echo "success;Candidate Work Experience was deleted successfully";
        } else {
            echo "failure;Candidate Work Experience was not deleted. Something went wrong, please try again";
        }
    }
    
    // *********************************** Work Experience Section - End ***********************************
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */