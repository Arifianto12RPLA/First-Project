<?php

namespace App\Models;

use CodeIgniter\Model;

class M_barang extends Model
{
    protected $table = 'produk';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = "")
    {
        if ($id == "") {
            return $this->builder
                ->join('kategori', 'kategori.id_kategori=produk.id_kategori')
                ->join('admin', 'admin.id_admin=produk.id_admin')->get()->getResultArray();
        } else {
            $this->builder
                ->join('kategori', 'kategori.id_kategori=produk.id_kategori')
                ->join('admin', 'admin.id_admin=produk.id_admin')->where('id_produk', $id);
            return $this->builder->get()->getResultArray();
        }
    }
    public function hitungProduk()
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
        return $this->builder->delete(['id_produk' => $id]);
    }

    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_produk' => $id]);
    }
    public function special()
    {
        return $this->builder
            ->join('kategori', 'kategori.id_kategori=produk.id_kategori')
            ->join('admin', 'admin.id_admin=produk.id_admin')->where('id_produk<= 13')->get()->getResultArray();
    }
    public function search($kode)
    {
        $this->builder
            ->join('kategori', 'kategori.id_kategori=produk.id_kategori')
            ->join('admin', 'admin.id_admin=produk.id_admin')->like("judul", $kode);
        return $this->builder->get()->getResultArray();
    }
    public function kategori($kat = "")
    {
        if ($kat == "") {
            return $this->builder
                ->join('kategori', 'kategori.id_kategori=produk.id_kategori')
                ->join('admin', 'admin.id_admin=produk.id_admin')->get()->getResultArray();
        } else {
            $this->builder
                ->join('kategori', 'kategori.id_kategori=produk.id_kategori')
                ->join('admin', 'admin.id_admin=produk.id_admin')->where('produk.id_kategori', $kat);
            return $this->builder->get()->getResultArray();
        }
    }
}
