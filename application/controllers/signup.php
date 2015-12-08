<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');
        $this->load->helper('view_helper');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->helper('download');
        
        // Load form validation library
        $this->load->library('email');
        $this->lang->load('common');
        
        // Load database
        $this->load->model('login_database');
        $this->load->model('grabtalent_signup_model');
        $this->load->model('grabtalent_candidatesignup_model');
        $this->load->model('candidate_employment_model');
        
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
            $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            redirect($url);
            exit;
        }
    }    
    
	public function index() {
	   
        if( $this->input->get('id', TRUE) != null || $this->input->get('id', TRUE) != "" ) {
            
            $content = $this->resumeparser( $this->input->get('id', TRUE) );

            // Check if candidate is already registered with us.
            $condition = "candidate_email = '".$content['candidateEmail']."'";
            $emailsignup_check = $this->db->select('*')->from('candidate_signup')->where($condition);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                
                $head_params = array(
                    'title' => 'Candidate Registration | Grab Talent',
                    'description' => "Grab Talent is the best online recruitment portal",
                    'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
                );
                    
                $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
                $template["header"] = $this->load->view('common/candidate/index_header', null, true);
                $template["contents"] = $this->load->view('candidate/signup', $content, true);
                $template["footer"] = $this->load->view('common/candidate/footer', null, true);
                $this->load->view('common/candidate/layout', $template);
                
            } else {
                redirect( base_url().$this->lang->lang().'/signup/signup_error');
                log_message('error', 'Candidate Already registered with GrabTalent'.$this->input->get('id', TRUE));
                return false;
                
            }
        } else {
            redirect(base_url('candidate'));
            log_message('error', 'Resume Query string not available in URL'.$this->input->get('id', TRUE));
        }
        
	}
    
    // Resume Parser solely written by Sunil Kumar Madana for GrabTalent on 20-10-2015.
    public function resumeparser($resumeName) {
        
        $doc2txt = $this->extracttext('./public/candidate/'.$resumeName );
        
        //Step-1: To search for email address.
        //preg_match("/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i", $doc2txt, $emailaddressmatches);
        preg_match("/[_a-z0-9-]+(\.[_a-z0-9-\+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i", $doc2txt, $emailaddressmatches);
        
        //Step-2: To search for candidate country values based on the country name values.        
        $candList = $this->login_database->set_candCountry();
        $candctryListArr = $tmpArr = [];
        foreach($candList as $key=>$value) {
            
            // Step-2.1: Get the total count of times a country name is mentioned.
            if( substr_count($doc2txt, $value['country_name']) > 0) {
                $tmpArr[substr_count($doc2txt, $value['country_name'])] = $value['country_name'];
                array_push($candctryListArr, $value['country_name'] ); 
            }
            //preg_match("/^\+?\/".$value['country_name']."+$/i", $doc2txt, $residentctrynamematches);
        }
        // Step-2.2: Take the country name that has the maximum count as the Resident Country.
        if( count($tmpArr) !=0 ) {
            $candResctryMaxval = max(array_keys($tmpArr));
            $candResctry = $tmpArr[$candResctryMaxval];
        } else {
            $candResctry = "";
        }
        
        // Step-2.3: The Country name will be assigned to drop-down only if the Candidate Resident Country has max values.
        if( $candResctry != null || $candResctry != "" ) {
            $countrylist = $this->login_database->get_candCountry($candResctry);
        } else {
            $countrylist = 0;
        }
        
        //Step-3: To find candidate phone number
        $phonenumstringmatch = '';
        foreach($candList as $key=>$value) {
            $parsedoc2txtforphone = strpos($doc2txt, "+".$value['country_phone_code']);
            $phoneNum = "+".$value['country_phone_code'];
            
            //Step-3.1: Find the first position of Country Phone Code.
            $tmpTxt = substr($doc2txt, $parsedoc2txtforphone , 1+$parsedoc2txtforphone );
            
            //Step-3.2: Remove all spaces in the above string.
            $tmpphonestring = preg_replace('/\s+/', '', $tmpTxt);
            
            //Step-3.3: Remove any characters that got appended while splitting. 
            $phonenumpareser = preg_split( '/([A-Za-z]+)/', $tmpphonestring, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
            if( sizeOf( array_values($phonenumpareser) ) > 0 ) { 
                $phonenumstringmatch = $phonenumpareser[0]; 
            }
            
        }
        
        // Step-4: If the country name is found, then add country names to the header array so that we can store it to the fields accordingly.
        $keyWordList = $this->login_database->set_candKeywordmatch();
        $candkeywordmatchArr = $tmpkeywordArr = [];
        
        foreach($keyWordList as $key=>$value) {

            if( substr_count($doc2txt, strtolower($value['keyword_value']) ) > 0) {
                $tmpkeywordArr[strtolower($value['keyword_value'])] = substr_count($doc2txt, strtolower($value['keyword_value']) );
                array_push($candkeywordmatchArr, strtolower($value['keyword_value']) );
            }
            //preg_match("/^\+?\/".$value['country_name']."+$/i", $doc2txt, $residentctrynamematches);
        }
        $candSkills = json_encode($tmpkeywordArr);
        
        // Step-5: If the country name is found, then add country names to the header array so that we can store it to the fields accordingly.
        if( sizeOf( $countrylist ) != 0 ) {
            $resultArr = array( 'candidateEmail' => $emailaddressmatches[0], 'candidateResCountry' => $countrylist[0]['country_name'], 'candidateCurrency' => $countrylist[0]['country_currency_code'], 'candidateCurrCode' => $countrylist[0]['country_code']." (+".$countrylist[0]['country_phone_code'].")", 'candidatephonenumber' => $phonenumstringmatch, 'candidateSkills' => $candSkills);
        } else {
            $resultArr = array( 'candidateEmail' => $emailaddressmatches[0], 'candidatephonenumber' => $phonenumstringmatch, 'candidateSkills' => $candSkills );
        }
        return $resultArr;
    }
    
    public function candidate_resumedownload () {
        
    	$file_url = "./public/candidate/".$this->input->get('id', TRUE);
    	$data = file_get_contents($file_url); // Read the file's contents
    	$name = $this->input->get('id', TRUE);
    	echo force_download($name, $data);

    }
    
    // Validate and store registration data in database
    public function register_submit() {
    
    	$this->db->trans_begin();
    
        $email = $this->input->post('inputemailAddress');
        $candtblchk_count = 0;
        $employmenterror = "";
        
        // To check if candidate already exists in Candidate login and signup tables. If the candidate hacks.
        $condition = "candidate_email = '".$this->input->post('inputemailAddress')."'";
        
        // Candidate Signup Table
        $candsignuptbl_check = $this->db->select('*')->from('candidate_signup')->where($condition);
        $candsignuptbl_query = $this->db->get();
        if ($candsignuptbl_query->num_rows() == 0) { $candtblchk_count = 0; } else { $candtblchk_count += 1; }
        
        // Candidate Login Table
        $candlogintbl_check = $this->db->select('*')->from('candidate_login')->where($condition);
        $candlogintbl_query = $this->db->get();
        if ($candlogintbl_query->num_rows() == 0) { $candtblchk_count = 0; } else { $candtblchk_count += 1; }
        
        if( $candtblchk_count == 0 ) {
            $candidFrstName = $this->input->post('inputfirstName');
            $candidLstName = $this->input->post('inputlastName');
            $candEduLvl = $this->input->post('inputEducationLvl');
            
            if( ( strlen( $this->input->post('inputCurrentcompany') ) == 0 ) && 
            	( strlen( $this->input->post('inputCurrentposition') ) == 0 ) && 
            	( strlen( $this->input->post('inputCompanylocation') ) == 0 ) && 
            	( strlen( $this->input->post('inputcurrentAnnualSal') ) == 0 ) 
		) { $employmenterror = "failure"; } else { $employmenterror = "success"; } 
            
            // First letter from First Name and First Letter from Last Name + Month + Year. 
            //if( $candidFrstName != null && $candidLstName != null) { $refId = $this->input->post('inputfirstName')[0].$this->input->post('inputlastName')[0].date('dy'); } else {
                //$refId = date('dy');
            //}
            //$coderefId = $refId.'-'.substr(number_format(time() * rand(),0,'',''),0,6);
            
            $refId = uniqid(date('dy').'_');
            
            if( $candidFrstName != null && $candidLstName != null) { $coderefId = $this->input->post('inputfirstName')[0].$this->input->post('inputlastName')[0].uniqid(date('dy').'_'); } else { $coderefId = uniqid(date('dy').'_'); }
            
            // Check validation for user input in SignUp form
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
                $this->input->post('inputCandSkills'),
                $this->input->post('inputTotExperience'),            
                $this->input->post('inputexpAnnualSalCode'),
                $this->input->post('inputexpAnnualSal'),            
                $this->input->post('inputjobalertagreement'),
                $this->input->post('inputresumeURL')
            );
            if($this->db->trans_status() == '1') {
            
            	// Insert Candidate skills to separate table.
            	$candselSkill = explode(";",$this->input->post('inputCandSkills'));
            	foreach($candselSkill as $tmpcandskills) {
            		$candskills = explode(",",$tmpcandskills);
            		$data = array('candidate_ref_id'=> $refId,'candidate_skill_name' => $candskills[0], 'candidate_skill_level' => $candskills[1], 'candidate_skill_rating' => $candskills[2], 'candidate_skill_created_date' => date('Y-m-d h:m:s') );
            		$this->db->insert('candidate_skills', $data);
            	}
            	
            	if($this->db->trans_status() == '1') {
			// 0. Transaction commit for Candidate Skills table
			$this->db->trans_commit();
            	} else {
            		log_message('error', 'Candidate Skills table was not updated');
			$this->db->trans_rollback();
			return false;
            	}
            
                $candtmpPasswd = $this->generateStrongPassword(8);
                // Step-1: "As the Signup was successful, we create Login for the candidate now
                $candUniqcode = Grabtalent_signup_model::generate_unique_code();
                $CandLoginModels = $this->_saveCandLogins(
                    $refId,
                    $candUniqcode,
                    $email,
                    md5($candtmpPasswd)
                );
                
                // 1. Transaction commit for Singup table
                $this->db->trans_commit();
                
                if($this->db->trans_status() == '1') {
                    
                    // 1. Transaction commit for Singup table
                    $this->db->trans_commit();
                    
                    // Step-2: Send Welcome email to the candidate with login details.
                    $this->sendWelcomeEmail($email, $candidFrstName, $candtmpPasswd);
                    
                    // Once candidate signup is successful, we create his work-experience.
                    if( $employmenterror != "failure" ) {
                        
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
                        	
                            $this->db->trans_commit();
                            //Once candidate signup is successful, we insert his academic details
                            if( $candEduLvl != 0) {
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
                            }
                            log_message('info', 'Candidate Employment History was updated successfully'.$email);
                        } else {
                            log_message('error', 'Candidate Work History was not updated');
                            $this->db->trans_rollback();
                            return false;
                        }
                    }
                    log_message('info', 'Candidate Login was created successfully'.$email);
                } else {
                    log_message('error', 'Candidate Login was not created');
                    $this->db->trans_rollback();
                    return false;
                }
                log_message('info', 'Candidate Sign was created successfully'.$email);
            } else {
                log_message('error', 'Candidate Signup was not sucessful');
                $this->db->trans_rollback();
                return false;
            }
            redirect( base_url($this->lang->lang().'/signup/signup_splash') );
        } else {
            redirect( base_url().$this->lang->lang().'/signup/signup_error');
            log_message('error', 'Candidate Already registered with GrabTalent'.$this->input->get('id', TRUE));
            return false;
        }
        
        $this->db->trans_complete(); 
    }
    
    private function _saveSignups($cand_refIds, $cand_codeRefIds, $firstname, $lastname, $email, $phoneNumberCode, $phone, $gender, $nationality, $briefDesc, $candSkills, $totalWorkexp, $expectAnnualSalCode, $expectAnnualSal, $jobAlert, $candResume) {

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
        $SignupModel->row['candidate_skills']                   = $candSkills;
        $SignupModel->row['candidate_total_experience']         = $totalWorkexp;
        $SignupModel->row['candidate_exp_annualsalcode']        = $expectAnnualSalCode;
        $SignupModel->row['candidate_exp_annualsalary']         = $expectAnnualSal;
        $SignupModel->row['job_alert_agreement']                = $jobAlert;
        $SignupModel->row['registration_date']                  = date('Y-m-d h:m:s');
        $SignupModel->row['created_date']                       = date('Y-m-d h:m:s');
        $SignupModel->row['resume_url']                         = $candResume;
        $SignupModel->row['video_resume_url']                   = '';
        $SignupModel->save();
        array_push($SignupModels, $SignupModel);

        $this->db->trans_complete();

        return $SignupModels;
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
    
    private function _saveCandLogins($cand_refIds, $cand_codeRefIds, $email, $cand_password) {

        $CandLoginModels = array();

        $this->db->trans_start();

        // setup password
        $CandLoginModel = new grabtalent_candidatesignup_model();
        $CandLoginModel->row['candidate_ref_id']                = $cand_refIds;
        $CandLoginModel->row['candidate_code']                  = $cand_codeRefIds;
        $CandLoginModel->row['candidate_email']                 = $email;
        $CandLoginModel->row['candidate_password']              = $cand_password;
        $CandLoginModel->row['system_created_date']             = date('Y-m-d');
        $CandLoginModel->row['system_last_modified_date']       = '';
        $CandLoginModel->save();
        array_push($CandLoginModels, $CandLoginModel);

        $this->db->trans_complete();

        return $CandLoginModels;
    }    
    
    public function signup_splash() {
        
        $head_params = array(
            'title' => 'Candidate Registration | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent'
        );
            
        $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
        $template["header"] = $this->load->view('common/candidate/index_header', null, true);
        $template["contents"] = $this->load->view('candidate/signup_splash', null, true);
        $template["footer"] = $this->load->view('common/candidate/footer', null, true);
        $this->load->view('common/candidate/layout', $template);
	}
    
    public function signup_error() {
        
        $head_params = array(
            'title' => 'Candidate Registration | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent'
        );
            
        $template["head"] = $this->load->view('common/candidate/head', $head_params, true);
        $template["header"] = $this->load->view('common/candidate/header', null, true);
        $template["contents"] = $this->load->view('candidate/signup_error', null, true);
        $template["footer"] = $this->load->view('common/candidate/footer', null, true);
        $this->load->view('common/candidate/layout', $template);
	}
    
    // Send forgot password link to recruiter.    
    public function sendWelcomeEmail($emailAdd, $candFName, $passWd) {
        
        if( $candFName != null) {
            $message = $this->load->view('common/candidate/welcome_email',array('candEmailAdd' => $emailAdd, 'candFirstName' => $candFName, 'candtmpPwd' => $passWd),true);
        } else {
            $message = $this->load->view('common/candidate/welcome_email',array('candEmailAdd' => $emailAdd, 'candFirstName' => 'Job-seeker', 'candtmpPwd' => $passWd),true);
        }        
        
        $this->email->set_newline("\r\n");
        $this->email->from('do-not-reply@grab-talent.com','do-not-reply@grab-talent.com'); // change it to yours
        $this->email->to($emailAdd);// change it to yours
        $this->email->subject('Congratulations - you have successfully signed up with Grab Talent');
        $this->email->message($message);
        if($this->email->send()) {
            log_message('error', 'Candidate Welcome email was sent successfully to '.$emailAdd);
        } else {
            log_message('error', 'Something went wrong while sending email to -'.$emailAdd);
        }
    }
    
    /**Function to extract text*/
    public function extracttext($filename) {
        
        $striped_content = '';
        $content = '';

        $zip = zip_open($filename);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
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