<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pesanan extends Model
{
    protected $table = 'pesanan';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = "")
    {
        if ($id == "") {
            $this->builder
                ->join('model', 'model.id_model=pesanan.id_model')
                ->join('kategori', 'kategori.id_kategori=pesanan.id_kategori')
                ->join('user', 'pesanan.id_user=user.id_user')->orderBy('id_pesanan', 'DESC');
            return $this->builder->get()->getResultArray();
        } else {
            $this->builder
                ->join('model', 'model.id_model=pesanan.id_model')
                ->join('kategori', 'kategori.id_kategori=pesanan.id_kategori')
                ->where('id_user', $id);
            return $this->builder->get()->getResultArray();
        }
    }
    public function getInvoice($id)
    {
        $this->builder
            ->join('model', 'model.id_model=pesanan.id_model')
            ->join('kategori', 'kategori.id_kategori=pesanan.id_kategori')
            ->where('id_pesanan', $id);
        return $this->builder->get()->getResultArray();
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
    public function asd($id)
    {
    }

    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_pesanan' => $id]);
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
