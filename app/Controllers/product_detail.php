<?php

namespace App\Controllers;

use App\Models\M_kategori;
use CodeIgniter\Controller;
use App\Models\M_barang;


class product_detail extends BaseController
{
    public function __construct()
    {
        $this->modelBarang = new M_barang;
        $this->modelKat = new M_kategori;
        helper('form');
    }
    public function index($id)
    {
        $data = [
            'barang' => $this->modelBarang->getAllData($id),
            'kategori' => $this->modelKat->getAllData()
        ];
        return view('member/detail.php', $data);
    }
    //--------------------------------------------------------------------
}
