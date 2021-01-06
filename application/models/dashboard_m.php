<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

    public function sum_created()
    {
        $query = $this->db->query("SELECT COUNT(idProduk) as created from produk where status = 1 and  deleted = 0");
        $hasil = $query->row();
        return $hasil->created;
    }
    public function sum_accepted()
    {
        $query = $this->db->query("SELECT COUNT(idProduk) as accepted from produk where status = 2 and  deleted = 0");
        $hasil = $query->row();
        return $hasil->accepted;
    }
    public function sum_onprogress()
    {
        $query = $this->db->query("SELECT COUNT(idProduk) as progress from produk where status = 3 and  deleted = 0");
        $hasil = $query->row();
        return $hasil->progress;
    }
    public function sum_finished()
    {
        $query = $this->db->query("SELECT COUNT(idProduk) as finished from produk where status = 4 and  deleted = 0");
        $hasil = $query->row();
        return $hasil->finished;
    }
}

/* End of file Dashboard.php */
