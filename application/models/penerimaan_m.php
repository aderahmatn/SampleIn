<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penerimaan_m extends CI_Model
{

    private $_table = "penerimaan";

    public $idPenerimaan;
    public $idPermintaan;
    public $nik;
    public $tanggalPenerimaan;
    public $notePenerimaan;

    public function add_penerimaan()
    {
        $post = $this->input->post();
        $this->idPenerimaan = uniqid('acc');
        $this->idPermintaan = $post['fidPermintaan'];
        $this->notePenerimaan = $post['fnotePenerimaan'];
        $this->nik = $this->session->userdata('nik');
        $this->tanggalPenerimaan = date('Y-m-d');
        $this->db->insert($this->_table, $this);
    }
}

/* End of file penerimaan_m.php */
