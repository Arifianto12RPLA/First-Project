<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Session\Session;

class M_member extends Model
{
    protected $table = 'user';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
    public function get_data($email, $password)
    {
        return $this->builder->where(array('email' => $email, 'password' => $password))
            ->get()->getRowArray();
    }
    public function getOne($id)
    {
        return $this->builder->where(array('id_user' => $id))->get()->getResultArray();
    }
    public function getSatu($id)
    {
        return $this->builder->where(array('id_user' => $id))->get()->getRowArray();
    }
    public function edit($id, $data)
    {
        return $this->builder->update($data, ['id_user' => $id]);
    }
    public function register($data)
    {
        return $this->builder->insert($data);
    }
    //--------------------------------------------------------------------
}
