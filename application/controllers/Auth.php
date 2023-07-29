
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');  // Create this model later
        
         // Load the session library
         $this->load->library('session');
    }

    public function register() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('register');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            $this->user_model->register_user($data);
            redirect('auth/login');
        }
    }


    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->user_model->get_user_by_email($email);

            if ($user && password_verify($password, $user['password'])) {
                // Set user session data if login successful
                $this->session->set_userdata('user_id', $user['id']);
                redirect('dashboard'); // Replace 'dashboard' with the destination after successful login
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('auth/login');
            }
        }
    }
}
