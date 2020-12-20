<?php
defined('BASEPATH') or exit('No direct script access allowed');

class report_m extends CI_Model
{

    public function rules()
    {
        return [
            [
                'field' => 'ftgl_awal',
                'label' => 'Tanggal Awal',
                'rules' => 'required'
            ],
            [
                'field' => 'ftgl_akhir',
                'label' => 'Tanggal Akhir',
                'rules' => 'required'
            ],
        ];
    }
    public function get_by_range($tgl1, $tgl2)
    {
        $this->db->select('*');
        $this->db->join('permintaan', 'permintaan.idPermintaan = produk.idPermintaan', 'left');
        $this->db->where('permintaan.tanggal >=', $tgl1);
        $this->db->where('permintaan.tanggal <=', $tgl2);
        $this->db->where('permintaan.deleted', 0);
        $this->db->join('users', 'users.nik = permintaan.sales', 'left');
        $this->db->join('customers', 'customers.idCustomer = permintaan.idCustomer', 'left');
        $this->db->from('produk');
        $this->db->order_by('permintaan.tanggal', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file report_m.php */
