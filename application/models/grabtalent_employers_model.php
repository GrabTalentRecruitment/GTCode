<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grabtalent_employers_model extends CI_Model {

    const TABLE_NAME = 'employers';

    var $row = array(
        'employer_name' => null,
        'employer_web_address' => null,
        'employer_phone' => null,
        'employer_fax' => null,
        'employer_address' => null,
        'employer_country' => null,
        'employer_description' => null,
        'employer_contact_firstname' => null,
        'employer_contact_lastname' => null,
        'employer_contact_email' => null,
        'employer_logo_url' => null,
        'employer_video_url' => null,
        'employer_active' => null,
        'employer_created_by' => null,
        'employer_created_date' => null,
        'employer_last_modified_by' => null,
        'employer_last_modified_date' => null
    );
    
    function __construct() {
        parent::__construct();
    }

    // save to Database
    function save() {
        $this->db->insert(self::TABLE_NAME, $this->row);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    static function generate_unique_code() {
        return hash_hmac('sha256', uniqid(mt_rand(), true), false);
    }
}

/* End of file avature_signup_model.php */
/* Location: ./application/models/avature_signup_model.php */
