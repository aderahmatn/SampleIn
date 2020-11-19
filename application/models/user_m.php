<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    private $_table = "users";

    public $idUser;
    public $nama;
    public $nik;
    public $email;
    public $username;
    public $password;
    public $role;
    public $image;

    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ['idUser' => $id])->row();
    }
}

/* End of file User_m.php */
