<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_barang;
use CodeIgniter\Controller;

class product extends BaseController
{
    public function __construct()
    {
        $this->modelBarang = new M_barang;
        $this->modelKat = new M_kategori;
        helper('form');
    }
    public function index($kat = "")
    {
        $data = [
            'barang' => $this->modelBarang->kategori($kat),
            'kategori' => $this->modelKat->getAllData()
        ];
        return view('member/product.php', $data);
    }
}
