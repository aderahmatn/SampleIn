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
            ],
            [
                'field' => 'fpartno[]',
                'label' => 'Nomor Part',
                'rules' => 'required'
            ],
            [
                'field' => 'fbrand[]',
                'label' => 'Brand',
                'rules' => 'required'
            ],
            [
                'field' => 'fqty[]',
                'label' => 'Brand',
                'rules' => 'required'
            ],
            [
                'field' => 'fduedate[]',
                'label' => 'Duedate',
                'rules' => 'required'
            ],
        ];
    }
    public function rules_update()
    {
        return [
            [
                'field' => 'faplikasi[]',
                'label' => 'Aplikasi',
                'rules' => 'required'
            ],
            [
                'field' => 'fcompany[]',
                'label' => 'Company',
                'rules' => 'required'
            ],
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
        $this->deleted = 0;
        $data = array();
        $index = 0;
        $permintaan = 1;
        foreach ($this->namaProduk as $dataproduk) {
            array_push($data, array(
                'idproduk' => $this->idProduk . $index,
                'idPermintaan' => $this->idPermintaan,
                'permintaan' => implode("/", $post['fpermintaan' . $permintaan]),
                'namaProduk' => $this->namaProduk[$index],
                'partNo' => $this->partNo[$index],
                'brand' => $this->brand[$index],
                'duedate' => $this->duedate[$index],
                'deleted' => $this->deleted,
                'qty' => $this->qty[$index],
                'status' => 1,
                'foto' => 'default.png'
            ));
            $index++;
            $permintaan++;
        }
        return $this->db->insert_batch($this->_table, $data);
    }
    public function upload_image()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name']            = $this->idProduk;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('ffoto')) {
            return $this->upload->data("file_name");
        }
        return "default.png";
    }
    function proses_update()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name']            = $this->idProduk;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);
        $id = $this->input->post('fid');
        $company = $this->input->post('fcompany');
        $aplikasi = $this->input->post('faplikasi');
        $image = count($_FILES['fimage']['name']);
        for ($i = 0; $i < $image; $i++) {
            if (!empty($_FILES['fimage']['name'][$i])) {

                $_FILES['file']['name'] = $_FILES['fimage']['name'][$i];
                $_FILES['file']['type'] = $_FILES['fimage']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['fimage']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['fimage']['error'][$i];
                $_FILES['file']['size'] = $_FILES['fimage']['size'][$i];

                if ($this->upload->do_upload('file')) {

                    $uploadData = $this->upload->data();
                    $data['foto'] = $uploadData['file_name'];
                    $data['company'] = $company[$i];
                    $data['aplikasi'] = $aplikasi[$i];
                    $this->db->where('idProduk', $id[$i]);
                    $this->db->update('produk', $data);
                }
            }
        }
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
    public function get_by_company($role)
    {
        $this->db->select('*');
        $this->db->where('company', $role);
        $this->db->where('produk.deleted', 0);
        $this->db->where('statuseng', null);
        $this->db->join('permintaan', 'permintaan.idPermintaan = produk.idPermintaan', 'left');
        $this->db->from('produk');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_on_progress($role)
    {
        $this->db->select('*');
        $this->db->where('company', $role);
        $this->db->where('produk.deleted', 0);
        $this->db->where('statuseng', 1);
        $this->db->where('result', null);
        $this->db->join('permintaan', 'permintaan.idPermintaan = produk.idPermintaan', 'left');
        $this->db->from('produk');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_finished($role)
    {
        $this->db->select('*');
        $this->db->where('company', $role);
        $this->db->where('produk.deleted', 0);
        $this->db->where('statuseng', 1);
        $this->db->where('result !=', NULL);
        $this->db->join('permintaan', 'permintaan.idPermintaan = produk.idPermintaan', 'left');
        $this->db->from('produk');
        $query = $this->db->get();
        return $query->result();
    }
    public function update_status($id)
    {
        $this->db->set('statusEng', 1);
        $this->db->where('idProduk', $id);
        $this->db->update('produk');
    }
    public function update_status_acc($id)
    {
        $this->db->set('status', 2);
        $this->db->where('idPermintaan', $id);
        $this->db->update('produk');
    }
    public function get_by_id_produk($id)
    {
        $this->db->select('*');
        $this->db->where('idProduk', $id);
        $this->db->join('permintaan', 'permintaan.idPermintaan = produk.idPermintaan', 'left');
        $this->db->join('customers', 'customers.idCustomer = permintaan.idCustomer', 'left');
        $this->db->join('users', 'users.nik = permintaan.sales', 'left');
        $this->db->from('produk');
        $query = $this->db->get();
        return $query->row();
    }
    public function save_file($post)
    {
        $config['upload_path']          = './upload/result';
        $config['allowed_types']        = 'pdf|jpeg|png|jpg';
        $config['max_size']             = 5000;
        $config['encrypt_name']            = TRUE;
        $this->load->library('upload', $config);
        $id = $this->input->post('fidproduk');
        if (!$this->upload->do_upload('ffile')) {
            echo $this->upload->display_errors();
        } else {
            $data['result'] = $this->upload->data("file_name");
            $this->db->where('idProduk', $id);
            $this->db->update('produk', $data);
        }
    }
    // public function update_status($id)
    // {
    //     $this->db->set('statusPermintaan', 2);
    //     $this->db->where('idPermintaan', $id);
    //     $this->db->update('permintaan');
    // }
}

/* End of file product_m.php */
