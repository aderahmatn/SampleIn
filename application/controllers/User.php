<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('auth_m');
        $this->load->helper('role_helper');
    }
    public function index()
    {
        check_role_admin();
        $data['user'] = $this->auth_m->GetAll();
        $this->template->load('layout', 'user/index', $data);
    }
    public function delete($id)
    {
        check_role_admin();
        $this->auth_m->Delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'User berhasil dihapus!');
            redirect('user', 'refresh');
        }
    }
}

/* End of file User.php */
