<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Session\Session;

class M_cart extends Model
{
    protected $table = 'cart';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
    public function getCart($id)
    {
        return $this->builder
            ->join('produk', 'produk.id_produk=cart.id_produk')->where('id_user', $id)->get()->getResultArray();
    }

    public function hapus($id)
    {
        return $this->builder->delete(['id_cart' => $id]);
    }
    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
    public function deleteUser($id)
    {
        return $this->builder->delete(['id_user' => $id]);
    }
    //--------------------------------------------------------------------
}
