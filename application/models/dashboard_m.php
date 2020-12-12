<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

    public function sum_created()
    {
        $query = $this->db->query("SELECT COUNT(noPermintaan) as created from permintaan where status = 1 and  deleted = 0");
        $hasil = $query->row();
        return $hasil->created;
    }
    public function sum_accepted()
    {
        $query = $this->db->query("SELECT COUNT(noPermintaan) as accepted from permintaan where status = 2 and  deleted = 0");
        $hasil = $query->row();
        return $hasil->accepted;
    }
    public function sum_onprogress()
    {
        $query = $this->db->query("SELECT COUNT(noPermintaan) as progress from permintaan where status = 3 and  deleted = 0");
        $hasil = $query->row();
        return $hasil->progress;
    }
    public function sum_finished()
    {
        $query = $this->db->query("SELECT COUNT(noPermintaan) as finished from permintaan where status = 4 and  deleted = 0");
        $hasil = $query->row();
        return $hasil->finished;
    }
}

/* End of file Dashboard.php */
