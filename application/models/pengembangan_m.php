<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengembangan_m extends CI_Model
{

    private $_table = "pengembangan";

    public $idPengembangan;
    public $idPermintaan;
    public $nik;
    public $tanggalPengembangan;
    public $idProduk;
    public $notePengembangan;

    public function add_pengembangan()
    {
        $post = $this->input->post();
        $this->idPengembangan = uniqid('pgm');
        $this->idPermintaan = $post['fidpermintaan'];
        $this->idProduk = $post['fidproduk'];
        $this->notePengembangan = $post['fnotePengembangan'];
        $this->nik = $this->session->userdata('nik');
        $this->tanggalPengembangan = date('Y-m-d');
        $this->db->insert($this->_table, $this);
    }
}

/* End of file pengembangan_m.php */
