<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $this->template->load('layout', 'dashboard/index');
    }
}

/* End of file Dashboard.php */
