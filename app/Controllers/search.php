<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_barang;
use CodeIgniter\Controller;

class search extends BaseController
{
    public function __construct()
    {
        $this->modelBarang = new M_barang;
        $this->modelKat = new M_kategori;
        helper('form');
    }
    public function index()
    {
        $kode = $this->request->getPost('kode');
        $data = [
            'kode' => $kode,
            'kategori' => $this->modelKat->getAllData(),
            'barang' => $this->modelBarang->search($kode)
        ];
        return view('member/search.php', $data);
    }
}
