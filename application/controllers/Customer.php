<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function index()
    {
        $this->template->load('layout', 'customer');
    }
}

/* End of file Customer.php */
