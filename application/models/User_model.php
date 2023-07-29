<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();  // Load the database library
    }

    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    public function get_user_by_email($email) {
        return $this->db->get_where('users', array('email' => $email))->row_array();
    }
}