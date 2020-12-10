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
    }
    public function index()
    {
        $role = $this->session->userdata('role');
        $data['produk'] = $this->product_m->get_by_company($role);
        $this->template->load('layout', 'produk/index', $data);
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
        $produkmod->save_file($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'File berhasil disimpan!');
            redirect('produk', 'refresh');
        }
    }
    public function status($id)
    {
        $this->product_m->update_status($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Sample on progress');
            redirect('produk', 'refresh');
        }
        $this->session->set_flashdata('error', 'Sample gagal diupdate!');
        redirect('produk', 'refresh');
    }
}

/* End of file Produk.php */
