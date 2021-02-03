<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('product_m');
        $this->load->helper('permintaan_helper');
        $this->load->model('permintaan_m');
        $this->load->model('pengembangan_m');
    }
    public function index()
    {
        $role = $this->session->userdata('role');
        $data['produk'] = $this->product_m->get_by_company($role);
        $this->template->load('layout', 'produk/index', $data);
    }
    public function onprogress()
    {
        $role = $this->session->userdata('role');
        $data['produk'] = $this->product_m->get_on_progress($role);
        $this->template->load('layout', 'produk/onprogress', $data);
    }
    public function finished()
    {
        $role = $this->session->userdata('role');
        $data['produk'] = $this->product_m->get_finished($role);
        $this->template->load('layout', 'produk/finished', $data);
    }
    public function submit_result($id)
    {
        $data['produk'] = $this->product_m->get_by_id_produk($id);
        $this->template->load('layout', 'produk/submit', $data);
    }
    public function process_file()
    {
        $produkmod = $this->product_m;
        $post = $this->input->post(null, TRUE);
        $this->pengembangan_m->add_pengembangan($post);
        $this->permintaan_m->update_status_finished($this->input->post('fidpermintaan'));
        $produkmod->save_file($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'File berhasil disimpan!');
            redirect('produk/onprogress', 'refresh');
        }
    }
    public function status($pro, $per)
    {
        $this->permintaan_m->update_status_progress($per);
        $this->product_m->update_status($pro);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Sample on progress');
            redirect('produk', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Sample gagal diterima!');
            redirect('produk', 'refresh');
        }
    }
}

/* End of file Produk.php */
