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
                        $this->session->set_flashdata('success', 'User berhasil didaftarkan!');
                        redirect('permintaan', 'refresh');
                    }
                }
            }
        }
    }
    public function delete($id)
    {
        $this->permintaan_m->Delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Permintaan berhasil dihapus!');
            redirect('permintaan', 'refresh');
        }
        $this->session->set_flashdata('error', 'Permintaan gagal dihapus!');
        redirect('permintaan', 'refresh');
    }
    public function index()
    {
        $data['permintaan'] = $this->permintaan_m->get_all($this->session->userdata('nik'));
        $this->template->load('layout', 'permintaan/index', $data);
    }
}

/* End of file Permintaan.php */
