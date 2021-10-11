<?php

namespace App\Controllers;

use App\Models\M_user;
use App\Models\M_kategori;
use App\Models\M_operator;
use App\Models\M_barang;
use App\Models\M_model;
use App\Models\M_pesanan;
use App\Models\M_transaksi;

class berandaOp extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->model1 = new M_pesanan;
        $this->model2 = new M_transaksi;
    }
    public function index()
    {
        $username = session()->get('nama');
        $data = [
            'nama' => $username,
            'hitung1' => $this->model2->hitung(),
            'hitung2' => $this->model1->hitung()
        ];
        return view('operator/beranda', $data);
    }

    //--------------------------------------------------------------------

}
