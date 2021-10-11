<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_model;
use CodeIgniter\Controller;

class desain extends BaseController
{
    public function __construct()
    {
        $this->modelKat = new M_kategori;
        $this->mod = new M_model;
        helper('form');
    }
    public function index()
    {
        $data = [
            'kategori' => $this->modelKat->getAllData(),
            'model' => $this->mod->getAllData()
        ];
        if (session()->get('id_user') != null) {
            return view('member/desain.php', $data);
        } else {
            return redirect()->to(base_url('sign'));
        }
    }
}
