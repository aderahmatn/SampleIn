<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
    }


    public function login()
    {
        $data['user'] = $this->auth_m->GetAll();
        $this->load->view('auth/login', $data);
    }
    public function register()
    {
        $auth  = $this->auth_m;
        $validation = $this->form_validation;
        $validation->set_rules($auth->rules());

        if ($validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $post = $this->input->post(null, TRUE);
            $auth->Register($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'User berhasil didaftarkan!');
                redirect('dashboard', 'refresh');
            }
        }
    }
}

/* End of file Auth.php */
