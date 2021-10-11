<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_model;

class model extends BaseController
{
    public function __construct()
    {
        $this->model = new M_model;
        helper('form');
    }
    public function index()
    {
        session();
        $data = [
            'model' => $this->model->getAllData(),

        ];
        return view('admin/V_model', $data);
    }

    //--------------------------------------------------------------------
    public function tambah()
    {
        if (!$this->validate([
            'nama' => 'required|is_unique[model.nama_model]',
            'harga' => 'required|min_length[3]',
            'gambar' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ])) {
            session()->setFlashdata('gal', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('model'));
        } else {
            $file = $this->request->getFile('gambar');
            $namabaru = $file->getRandomName();
            $file->move('gambarmdl', $namabaru);
            $create = [
                'nama_model' => $this->request->getPost('nama'),
                'gambar' => $namabaru,
                'Harga' => $this->request->getPost('harga'),
                'id_admin' => session()->get('id_admin')

            ];
            $query = $this->model->tambah($create);
            if ($query) {
                session()->setFlashdata('pesan', 'Ditambahkan');
                return redirect()->to(base_url('model'));
            }
        }
    }
    public function hapus($id)
    {
        $data = ['model' => $this->model->getAllData($id)];

        $query = $this->model->hapus($id);
        if ($query) {
            return redirect()->to(base_url('model'));
        }
    }
    public function edit($id)
    {
        $nama = $this->request->getPost('nama');
        $nama_lama = $this->request->getPost('nama_lama');
        if ($nama == $nama_lama) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[model.nama_model]';
        }
        if (!$this->validate([
            'nama' => $rule_nama,
            'harga' => 'required|min_length[3]',
            'gambar' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ])) {
            session()->setFlashdata('gal', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('model'));
        } else {
            $file = $this->request->getFile('gambar');
            if ($file->getError() == 4) {
                $img = $this->request->getPost('modelLama');
            } else {
                $namabaru = $file->getRandomName();
                $file->move('gambarmdl', $namabaru);
                $img = $namabaru;
            }
            $id = $this->request->getPost('id');
            $data = [
                'nama_model' => $nama,
                'gambar' => $img,
                'Harga' => $this->request->getPost('harga'),
                'id_admin' => session()->get('id_admin')
            ];

            $query = $this->model->ubah($data, $id);
            if ($query) {
                return redirect()->to(base_url('model'));
            }
        }
    }
}
