<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_m extends CI_Model
{
    private $_table = "produk";

    public $idProduk;
    public $idPermintaan;
    public $namaProduk;
    public $partNo;
    public $brand;
    public $aplikasi;
    public $qty;
    public $permintaan;
    public $duedate;
    public $deleted;

    public function rules()
    {
        return [
            [
                'field' => 'fproduct[]',
                'label' => 'Nama Product',
                'rules' => 'required'
            ]
        ];
    }
    public function save_batch()
    {
        $post = $this->input->post();
        $this->idProduk = uniqid('pro');
        $this->idPermintaan = $post['fid'];
        $this->namaProduk = $post['fproduct'];
        $this->partNo = $post['fpartno'];
        $this->brand = $post['fbrand'];
        $this->qty = $post['fqty'];
        $this->duedate = $post['fduedate'];
        $this->permintaan = $post['fpermintaan'];
        $this->deleted = 0;
        $data = array();
        $index = 0;

        foreach ($this->namaProduk as $dataproduk) {
            array_push($data, array(
                'idproduk' => $this->idProduk . $index,
                'idPermintaan' => $this->idPermintaan,
                'namaProduk' => $this->namaProduk[$index],
                'partNo' => $this->partNo[$index],
                'brand' => $this->brand[$index],
                'duedate' => $this->duedate[$index],
                'deleted' => $this->deleted,
                'qty' => $this->qty[$index],
                'permintaan' => $this->permintaan[$index],
            ));
            $index++;
        }
        return $this->db->insert_batch($this->_table, $data);
    }
    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('idPermintaan', $id);
        $this->db->where('produk.deleted', 0);
        $this->db->from('produk');
        $query = $this->db->get();
        return $query->result();
    }
    public function count_by_id($id)
    {
        $query = $this->db->query("SELECT COUNT(*) as qty  FROM produk WHERE idPermintaan = '$id'");
        $hasil = $query->row();

        return $hasil;
    }
}

/* End of file product_m.php */
