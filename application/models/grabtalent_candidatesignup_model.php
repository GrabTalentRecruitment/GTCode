<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grabtalent_candidatesignup_model extends CI_Model {

    const TABLE_NAME = 'candidate_login';

    var $row = array(
        'candidate_ref_id' => null,
        'candidate_code' => null,
        'candidate_email' => null,
        'candidate_password' => null,
        'system_created_date' =>null,
        'system_last_modified_date' => null
    );
    
    function __construct() { parent::__construct(); }

    // save to Database
    function save() { $this->db->insert(self::TABLE_NAME, $this->row); return ($this->db->affected_rows() != 1) ? false : true; }
}

/* End of file avature_signup_model.php */
/* Location: ./application/models/avature_signup_model.php */
