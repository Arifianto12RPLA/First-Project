<?php

namespace App\Controllers;

use App\Models\M_user;
use App\Models\M_kategori;
use App\Models\M_operator;
use App\Models\M_barang;
use App\Models\M_model;

class beranda extends BaseController
{
    public function __construct()
    {
        $this->model1 = new M_operator;
        $this->model2 = new M_kategori;
        $this->model3 = new M_barang;
        $this->model4 = new M_model;
        $this->model5 = new M_user;
        helper('form');
    }
    public function index()
    {
        $id_admin = session()->get('id_admin');
        $data = [
            'jumlahOp' => $this->model1->hitungPegawai(), 'jumlahKat' => $this->model2->hitungKategori(),
            'jumlahProd' => $this->model3->hitungProduk(), 'jumlahMod' => $this->model4->hitungModel(),
            'admin' => $this->model5->getOne($id_admin)
        ];
        return view('admin/beranda', $data);
    }
    public function edit($id)
    {
        $id = $this->request->getPost('id_admin');
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];
        $query = $this->model5->edit($id, $data);
        if ($query) {
            return redirect()->to(base_url('beranda'));
        }
    }

    //--------------------------------------------------------------------

}
