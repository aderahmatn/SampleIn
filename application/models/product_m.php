<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_m extends CI_Model
{
    private $_table = "produk";

    public $idProduk;
    public $noPermintaan;
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
        $this->noPermintaan = $post['fno'];
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
                'noPermintaan' => $this->noPermintaan,
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
        $this->db->where('permintaan.deleted', 0);
        $this->db->join('users', 'users.nik = permintaan.sales', 'left');
        $this->db->join('customers', 'customers.idCustomer = permintaan.idCustomer', 'left');
        $this->db->from('permintaan');
        $query = $this->db->get();
        return $query->row();
    }
}

/* End of file product_m.php */
