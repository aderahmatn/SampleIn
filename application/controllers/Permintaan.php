<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('customer_m');
        $this->load->model('permintaan_m');
        $this->load->model('product_m');
    }


    public function create()
    {
        check_role_sales();
        $produk = $this->product_m;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());
        if ($validation->run() == FALSE) {
            $data['customer'] = $this->customer_m->GetAll(
                $this->session->userdata('nik')
            );
            $data['noreq'] = $this->permintaan_m->CheckNoPeq();
            $this->template->load('layout', 'permintaan/create', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $produk->save_batch($post);

            if ($this->db->affected_rows() > 0) {
                $permintaan  = $this->permintaan_m;
                $validation = $this->form_validation;
                $validation->set_rules($permintaan->rules());

                if ($validation->run() == FALSE) {
                    $data['customer'] = $this->customer_m->GetAll(
                        $this->session->userdata('nik')
                    );
                    $data['noreq'] = $this->permintaan_m->CheckNoPeq();
                    $this->template->load('layout', 'permintaan/create', $data);
                } else {
                    $post = $this->input->post(null, TRUE);
                    $permintaan->create_permintaan($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Permintaan berhasil dibuat!');
                        redirect('permintaan', 'refresh');
                    }
                }
            }
        }
    }
    public function delete($id)
    {
        check_role_sales();
        $this->permintaan_m->Delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Permintaan berhasil dihapus!');
            redirect('permintaan', 'refresh');
        }
        $this->session->set_flashdata('error', 'Permintaan gagal dihapus!');
        redirect('permintaan', 'refresh');
    }
    public function status($id)
    {
        $this->permintaan_m->update_status($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Permintaan diterima!');
            redirect('permintaan/accepted', 'refresh');
        }
        $this->session->set_flashdata('error', 'Permintaan gagal diterima!');
        redirect('permintaan', 'refresh');
    }
    public function index()
    {
        $role = $this->session->userdata('role');
        if ($role != 2) {
            $data['permintaan'] = $this->permintaan_m->get_all();
            $this->template->load('layout', 'permintaan/index', $data);
        } else {
            $data['permintaan'] = $this->permintaan_m->get_by_nik($this->session->userdata('nik'));
            $this->template->load('layout', 'permintaan/index', $data);
        }
    }
    public function detail($id)
    {
        $data['qty'] = $this->product_m->count_by_id($id);
        $data['detail'] = $this->permintaan_m->get_by_id($id);
        $data['produk'] = $this->product_m->get_by_id($id);
        if (!$this->product_m->get_by_id($id)) {
            $this->session->set_flashdata('error', 'Permintaan tidak ditemukan');
            redirect('permintaan', 'refresh');
        }
        $this->template->load('layout', 'permintaan/detail', $data);
    }
    public function update($id)
    {
        $produk = $this->product_m;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules_update());
        if ($validation->run() == false) {
            $data['qty'] = $this->product_m->count_by_id($id);
            $data['detail'] = $this->permintaan_m->get_by_id($id);
            $data['produk'] = $this->product_m->get_by_id($id);
            if (!$this->product_m->get_by_id($id)) {
                $this->session->set_flashdata('error', 'Permintaan tidak ditemukan');
                redirect('permintaan', 'refresh');
            }
            $this->template->load('layout', 'permintaan/update', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $produk->proses_update($post);
            if ($this->db->affected_rows() > 0) {
                $permintaan  = $this->permintaan_m;
                $validation = $this->form_validation;
                $validation->set_rules($permintaan->rules());

                if ($validation->run() == FALSE) {
                    $data['customer'] = $this->customer_m->GetAll(
                        $this->session->userdata('nik')
                    );
                    $data['noreq'] = $this->permintaan_m->CheckNoPeq();
                    $this->template->load('layout', 'permintaan/create', $data);
                } else {
                    $post = $this->input->post(null, TRUE);
                    $permintaan->create_permintaan($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'User berhasil didaftarkan!');
                        redirect('permintaan', 'refresh');
                    }
                }
            }
        }
    }
    public function accepted()
    {
        $data['accepted'] = $this->permintaan_m->get_accepted();
        $this->template->load('layout', 'permintaan/diterima', $data);
    }
    public function edit($id)
    {
        $data['detail'] = $this->permintaan_m->get_by_id($id);
        $this->template->load('layout', 'permintaan/edit', $data);
    }
}

/* End of file Permintaan.php */
