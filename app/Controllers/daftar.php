<?php

namespace App\Controllers;

use App\Models\M_detailTrans;
use App\Models\M_kategori;
use App\Models\M_model;
use App\Models\M_pesanan;
use CodeIgniter\Controller;

class daftar extends BaseController
{
    public function __construct()
    {
        $this->modelKat = new M_kategori;
        $this->modelTransaksi = new M_detailTrans;
        $this->pesanan = new M_pesanan;
        helper('form');
    }
    public function index()
    {
        $data = [
            'kategori' => $this->modelKat->getAllData(),
            'transaksi' => $this->modelTransaksi->getAllData(session()->get('id_user'))
        ];
        if (session()->get('id_user') != null) {
            return view('member/daftar1.php', $data);
        } else {
            return redirect()->to(base_url('sign'));
        }
    }

    public function pesanan()
    {
        $data = [
            'kategori' => $this->modelKat->getAllData(),
            'pesanan' => $this->pesanan->getAllData(session()->get('id_user'))
        ];
        if (session()->get('id_user') != null) {
            return view('member/daftar2.php', $data);
        } else {
            return redirect()->to(base_url('sign'));
        }
    }
}
