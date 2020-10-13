<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{

    private $_table = 'users';

    public $idUser;
    public $nama;
    public $nik;
    public $email;
    public $username;
    public $password;
    public $role;

    public function rules()
    {
        return [
            [
                'field' => 'fnama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'fnik',
                'label' => 'NIK',
                'rules' => 'required'
            ],
            [
                'field' => 'femail',
                'label' => 'Email',
                'rules' => 'required'
            ],
            [
                'field' => 'fusername',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'fpassword',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'frole',
                'label' => 'Role',
                'rules' => 'required'
            ],
        ];
    }

    public function GetAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function Register()
    {
        $post = $this->input->post();
        $this->idUser = uniqid('us');
        $this->nik = $post['fnik'];
        $this->nama = $post['fnama'];
        $this->email = $post['femail'];
        $this->username = $post['fusername'];
        $this->password = md5($post['fpassword']);
        $this->role = $post['frole'];
        $this->db->insert($this->_table, $this);
    }
}

/* End of file Auth_m.php */
