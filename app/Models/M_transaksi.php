<?php

namespace App\Models;

use CodeIgniter\Model;

class M_transaksi extends Model
{
    protected $table = 'transaksi';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = "")
    {
        if ($id == "") {
            return $this->builder->get()->getResultArray();
        } else {
            $this->builder->where('id_transaksi', $id);
            return $this->builder->get()->getResultArray();
        }
    }
    public function getOne()
    {
        return $this->builder->orderBy('id_transaksi', 'DESC')->limit(1)->get()->getRowArray();
    }
    public function tambah($data)
    {
        return $this->builder->insert($data);
    }


    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_transaksi' => $id]);
    }
    public function hitung()
    {
        $query = $this->builder->where('status', 2)->get()->getResultArray();
        $kosong = 0;
        if ($query) {
            return count($query);
        } else {
            return $kosong;
        }
    }
}
