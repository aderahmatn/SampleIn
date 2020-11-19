<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('customer_m');
    }


    public function index()
    {
        check_role_sales();
        $data['customer'] = $this->customer_m->GetAll(
            $this->session->userdata('nik')
        );
        $this->template->load('layout', 'customer/index', $data);
    }

    public function tambah()
    {
        check_role_sales();
        $customer  = $this->customer_m;
        $validation = $this->form_validation;
        $validation->set_rules($customer->rules());

        if ($validation->run() == FALSE) {
            $this->template->load('layout', 'customer/create');
        } else {
            $post = $this->input->post(null, TRUE);
            $customer->Add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Customer berhasil disimpan!');
                redirect('customer', 'refresh');
            }
        }
    }
    public function delete($id)
    {
        check_role_sales();
        $this->customer_m->Delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Customer berhasil dihapus!');
            redirect('customer', 'refresh');
        }
    }
    public function edit($id = null)
    {
        check_role_sales();
        if (!isset($id)) redirect('customer');
        $customer  = $this->customer_m;
        $validation = $this->form_validation;
        $validation->set_rules($customer->rules());

        if ($validation->run()) {
            $post = $this->input->post(null, TRUE);
            $customer->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Update data customer berhasil!');
                redirect('customer', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Data customer tidak ada yang diupdate!');
                redirect('customer', 'refresh');
            }
        }
        $data['customer'] = $this->customer_m->GetById($id);
        if (!$data['customer']) {
            $this->session->set_flashdata('error', 'Data customer tidak ditemukan!');
            redirect('customer', 'refresh');
        }
        $this->template->load('layout', 'customer/edit', $data);
    }
}

/* End of file Customer.php */
