<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('user_m');
    }
    public function index()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->user_m->get_by_id($id);
        $this->template->load('layout', 'profile/index', $data);
    }
}

/* End of file Profile.php */
