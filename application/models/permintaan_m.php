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
