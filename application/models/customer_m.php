<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_m extends CI_Model
{
    private $_table = "customers";
    public $idCustomer;
    public $customer;
    public $telpon;
    public $picSales;
    public $alamat;
    public $negara;
    public $deleted;

    function rules()
    {
        return [
            [
                'field' => 'fcustomer',
                'label' => 'Customer',
                'rules' => 'required'
            ],
            [
                'field' => 'ftelp',
                'label' => 'Telpon',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'fpicsales',
                'label' => 'PIC Sales',
                'rules' => 'required'
            ],
            [
                'field' => 'falamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'fnegara',
                'label' => 'Negara',
                'rules' => 'required'
            ],
        ];
    }

    public function Add()
    {
        $post = $this->input->post();
        $this->idCustomer = uniqid('cs');
        $this->customer = $post['fcustomer'];
        $this->telpon = $post['ftelp'];
        $this->picSales = $post['fpicsales'];
        $this->alamat = $post['falamat'];
        $this->negara = $post['fnegara'];
        $this->deleted = 0;
        $this->db->insert($this->_table, $this);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->idCustomer = $post['fid'];
        $this->customer = $post['fcustomer'];
        $this->telpon = $post['ftelp'];
        $this->picSales = $post['fpicsales'];
        $this->alamat = $post['falamat'];
        $this->negara = $post['fnegara'];
        $this->deleted = 0;
        $this->db->update($this->_table, $this, array('idCustomer' => $post['fid']));
    }
    public function GetAll()
    {
        return $this->db->order_by('created_at', 'desc')->where('deleted', 0)->get($this->_table)->result();
    }

    public function Delete($id)
    {
        $this->db->set('deleted', 1);
        $this->db->where('idCustomer', $id);
        $this->db->update($this->_table);
    }
    public function GetById($id)
    {
        return $this->db->get_where($this->_table, ["idCustomer" => $id])->row();
    }
}

/* End of file Customer_m.php */
