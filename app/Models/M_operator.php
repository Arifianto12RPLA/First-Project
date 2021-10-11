<?php

namespace App\Models;

use CodeIgniter\Model;

class M_operator extends Model
{
    protected $table = 'operator';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = "")
    {
        if ($id == "") {
            return $this->builder
                ->join('admin', 'admin.id_admin=operator.id_admin')->get()->getResultArray();
        } else {
            return $this->builder
                ->join('admin', 'admin.id_admin=operator.id_admin')->where('id_operator', $id)->get()->getResultArray();
        }
    }
    public function hitungPegawai()
    {
        $query = $this->builder->get()->getResultArray();

        if ($query) {
            return count($query);
        } else {
            return 0;
        }
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
    public function get_data($email, $password)
    {
        return $this->builder->where(array('email_op' => $email, 'password_op' => $password))
            ->get()->getRowArray();
    }

    public function hapus($id)
    {
        return $this->builder->delete(['id_operator' => $id]);
    }

    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_operator' => $id]);
    }
}
