<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_kategori;

class kategori extends BaseController
{
    public function __construct()
    {
        $this->model = new M_kategori;
        helper('form');
    }
    public function index()
    {
        session();
        $data = ['kategori' => $this->model->getAllData()];
        return view('admin/V_kategori', $data);
    }

    //--------------------------------------------------------------------
    public function tambah()
    {
        if (!$this->validate([
            'nama' => 'required|max_length[25]|min_length[3]|is_unique[kategori.kategori]',
            'harga' => 'required|max_length[10]|min_length[2]'
        ])) {
            session()->setFlashdata('erro', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('kategori'));
        } else {
            $create = [
                'kategori' => $this->request->getPost('nama'),
                'Harga' => $this->request->getPost('harga'),
                'id_admin' => session()->get('id_admin')
            ];
            $query = $this->model->tambah($create);
            if ($query) {
                session()->setFlashdata('pesan', 'Ditambahkan');
                return redirect()->to(base_url('kategori'));
            }
        }
    }
    public function hapus($id)
    {
        $query = $this->model->hapus($id);
        if ($query) {
            session()->setFlashdata('pesan', 'Dihapus');
            return redirect()->to(base_url('kategori'));
        }
    }
    public function edit($id)
    {
        $nama_lama = $this->request->getPost('nama_lama');
        $nama = $this->request->getPost('nama');
        if ($nama_lama == $nama) {
            $rule = 'required|max_length[25]|min_length[3]';
        } else {
            $rule = 'required|max_length[25]|min_length[3]|is_unique[kategori.kategori]';
        }
        if (!$this->validate([
            'nama' => $rule,
            'harga' => 'required|max_length[10]|min_length[2]'
        ])) {
            session()->setFlashdata('erro', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('kategori'));
        } else {
            $id = $this->request->getPost('id');
            $data = [
                'kategori' => $nama,
                'Harga' => $this->request->getPost('harga')
            ];
            $query = $this->model->ubah($data, $id);
            if ($query) {
                session()->setFlashdata('pesan', 'Diedit');
                return redirect()->to(base_url('kategori'));
            }
        }
    }
}
