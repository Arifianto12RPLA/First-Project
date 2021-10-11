<?php

namespace App\Models;

use CodeIgniter\Model;

class M_detailTrans extends Model
{
    protected $table = 'detail_transaksi';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = "")
    {
        if ($id == "") {
            $this->builder
                ->join('transaksi', 'transaksi.id_transaksi=detail_transaksi.id_transaksi')
                ->join('produk', 'detail_transaksi.id_produk=produk.id_produk')
                ->join('user', 'transaksi.id_user=user.id_user')->orderBy('detail_transaksi.id_transaksi', 'DESC');
            return $this->builder->get()->getResultArray();
        } else {
            $this->builder
                ->join('transaksi', 'transaksi.id_transaksi=detail_transaksi.id_transaksi')
                ->join('produk', 'produk.id_produk=detail_transaksi.id_produk')
                ->where('id_user', $id);
            return $this->builder->get()->getResultArray();
        }
    }
    public function getInvoice($id)
    {
        $this->builder
            ->join('transaksi', 'transaksi.id_transaksi=detail_transaksi.id_transaksi')
            ->join('produk', 'produk.id_produk=detail_transaksi.id_produk')
            ->where('detail_transaksi.id_transaksi', $id);
        return $this->builder->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }


    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_detail' => $id]);
    }
}
