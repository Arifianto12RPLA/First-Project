<?php

namespace App\Models;

use CodeIgniter\Model;

class M_kategori extends Model
{
    protected $table = 'kategori';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = "")
    {
        if ($id == false) {
            return $this->builder
                ->join('admin', 'admin.id_admin=kategori.id_admin')->get()->getResultArray();
        } else {
            $this->builder->where('id_kategori', $id);
            return $this->builder->get()->getResultArray();
        }
    }
    public function hitungKategori()
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
        return $this->builder->delete(['id_kategori' => $id]);
    }

    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_kategori' => $id]);
    }
}
