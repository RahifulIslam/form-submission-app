<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function register_student($data) {
        // Insert student data into the database
        $this->db->insert('student', $data);
    }
}
?>
