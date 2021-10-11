<?php

namespace App\Models;

use CodeIgniter\Model;

class M_model extends Model
{
    protected $table = 'model';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = "")
    {
        if ($id == "") {
            return $this->builder
                ->join('admin', 'admin.id_admin=model.id_admin')->get()->getResultArray();
        } else {
            $this->builder->where('id_model', $id);
            return $this->builder->get()->getResultArray();
        }
    }
    public function hitungModel()
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

    public function hapus($id)
    {
        return $this->builder->delete(['id_model' => $id]);
    }

    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_model' => $id]);
    }
}
