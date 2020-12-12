<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('dashboard_m');
    }


    public function index()
    {
        $data['created'] = $this->dashboard_m->sum_created();
        $data['accepted'] = $this->dashboard_m->sum_accepted();
        $data['onprogress'] = $this->dashboard_m->sum_onprogress();
        $data['finished'] = $this->dashboard_m->sum_finished();
        $this->template->load('layout', 'dashboard/index', $data);
    }
}

/* End of file Dashboard.php */
