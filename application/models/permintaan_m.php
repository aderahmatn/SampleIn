<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_m extends CI_Model
{
    private $_table = "permintaan";

    public $idPermintaan;
    public $noPermintaan;
    public $idCustomer;
    public $tanggal;
    public $note;
    public $deleted;
    public $sales;
    public $noUrut;
    // public $foto;

    public function rules()
    {
        return [
            [
                'field' => 'ftgl',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
            [
                'field' => 'fcustomer',
                'label' => 'Customer',
                'rules' => 'required'
            ],

        ];
    }

    public function upload_image()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->idPermintaan;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("ffoto")) {
            return $this->upload->data("file_name");
        }
        return "default.png";
    }
    public function create_permintaan()
    {
        $post = $this->input->post();
        $this->idPermintaan = uniqid('req');
        $this->noPermintaan = $post['fno'];
        $this->idCustomer = $post['fcustomer'];
        $this->tanggal = $post['ftgl'];
        $this->note = $post['fnote'];
        $this->deleted = 0;
        $this->status = 1;
        $this->sales = $post['fnik'];
        $this->noUrut = $this->CheckNoPeq();
        $this->foto = $this->upload_image();
        $this->db->insert($this->_table, $this);
    }
    public function get_all($nik)
    {
        $this->db->select('*');
        $this->db->join('users', 'users.nik = permintaan.sales', 'left');
        $this->db->join('customers', 'customers.idCustomer = permintaan.idCustomer', 'left');
        $this->db->where('sales', $nik);
        $this->db->where('permintaan.deleted', 0);
        $this->db->from('permintaan');
        $query = $this->db->get();
        return $query->result();
    }
    public function Delete($id)
    {
        $this->db->set('deleted', 1);
        $this->db->where('idPermintaan', $id);
        $this->db->update('permintaan');
    }
    public function CheckNoPeq()
    {
        $query = $this->db->query("SELECT MAX(noUrut) as NoReq from permintaan");
        $hasil = $query->row();
        $nomor = $hasil->NoReq;
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $newnoreq = $nomor + 1;
        return $newnoreq;
    }
}

/* End of file Permintaan_m.php */
