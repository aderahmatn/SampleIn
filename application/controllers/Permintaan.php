<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_m');
        $this->load->model('permintaan_m');
    }


    public function create()
    {
        $data['customer'] = $this->customer_m->GetAll();
        $data['noreq'] = $this->permintaan_m->CheckNoPeq();
        $this->template->load('layout', 'permintaan/create', $data);
    }
}

/* End of file Permintaan.php */
