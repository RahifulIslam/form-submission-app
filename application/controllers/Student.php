<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models and libraries
        $this->load->model('Student_model');
        $this->load->library('form_validation');
        // Load necessary helpers
        $this->load->helper('form');
        $this->load->helper('security');
        // Load the URL Helper
        $this->load->helper('url');
        // Load session library
        $this->load->library('session');
    }

    public function index() {
        // Form validation rules
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, load the registration form
            $this->load->view('register');
        } else {
            // If validation succeeds, save the student data to the database
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            $this->Student_model->register_student($data);
            
            // Set flash data for success message
            $this->session->set_flashdata('success', 'Registration Successful!');
            // Redirect back to the registration page
            redirect('student/success');
        }
    }

    public function success() {
        // Load the success view
        $this->load->view('success');
    }
}
?>
