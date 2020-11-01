<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->auth_m->login($post);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $params = array(
                'nik' => $row->nik,
                'role' => $row->role,
                'uname' => $row->username,
                'name' => $row->nama,
                'status' => 'login'
            );
            $this->session->set_userdata($params);
            redirect('dashboard', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'username / password salah!');
            redirect('auth/login', 'refresh');
        }
    }
    public function login()
    {
        check_already_login();
        $this->load->view('auth/login');
    }
    public function logout()
    {
        $params = array('nik', 'role', 'status', 'uname');
        $this->session->unset_userdata($params);
        redirect('auth/login', 'refresh');
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
                redirect('user', 'refresh');
            }
        }
    }
}

/* End of file Auth.php */
