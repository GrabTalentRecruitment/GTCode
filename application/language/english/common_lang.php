<?php
/**
 * System messages translation for CodeIgniter(tm)
 * @author	CodeIgniter community
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
$query = $CI->db->query("SELECT lang_id, lang_english FROM grabtalent_language");
if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
       $lang[$row->lang_id] = $row->lang_english;
    }
}