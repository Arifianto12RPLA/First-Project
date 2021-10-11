<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_barang;
use App\Models\M_kategori;

class barang extends BaseController
{
    public function __construct()
    {
        $this->model = new M_barang;
        $this->model2 = new M_kategori;
        helper('form');
    }
    public function index()
    {
        session();
        $data = [
            'barang' => $this->model->getAllData(),
            'kategori' => $this->model2->getAllData()
        ];
        return view('admin/V_barang', $data);
    }

    //--------------------------------------------------------------------
    public function tambah()
    {
        if (!$this->validate([
            'judul' => 'required|is_unique[produk.judul]',
            'deskripsi' => 'required',
            'harga' => 'required|min_length[3]',
            'stok' => 'required',
            'gambar' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ])) {
            session()->setFlashdata('gagal', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('barang'));
        } else {
            $file = $this->request->getFile('gambar');
            $namabaru = $file->getRandomName();
            $file->move('gambar', $namabaru);
            $create = [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'gambar' => $namabaru,
                'id_kategori' => $this->request->getPost('kategori'),
                'id_admin' => session()->get('id_admin')

            ];
            $query = $this->model->tambah($create);
            if ($query) {
                session()->setFlashdata('pesan', 'Ditambahkan');
                return redirect()->to(base_url('barang'));
            }
        }
    }
    public function hapus($id)
    {
        $data = ['barang' => $this->model->getAllData($id)];

        $query = $this->model->hapus($id);
        if ($query) {
            session()->setFlashdata('pesan', 'Dihapus');
            return redirect()->to(base_url('barang'));
        }
    }
    public function edit($id)
    {
        $judul = $this->request->getPost('judul');
        $judul_lama = $this->request->getPost('judul_lama');
        if ($judul == $judul_lama) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[produk.judul]';
        }
        if (!$this->validate([
            'judul' => $rule,
            'deskripsi' => 'required',
            'harga' => 'required|min_length[3]',
            'stok' => 'required',
            'gambar' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ])) {
            session()->setFlashdata('gagal', \Config\Services::validation()->listErrors());
            return redirect()->to(base_url('barang'));
        } else {
            $file = $this->request->getFile('gambar');
            if ($file->getError() == 4) {
                $img = $this->request->getPost('bajuLama');
            } else {
                $namabaru = $file->getRandomName();
                $file->move('gambar', $namabaru);
                $img = $namabaru;
            }
            $id = $this->request->getPost('id');
            $data = [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'gambar' => $img,
                'id_kategori' => $this->request->getPost('kategori'),
                'id_admin' => session()->get('id_admin')
            ];

            $query = $this->model->ubah($data, $id);
            if ($query) {
                return redirect()->to(base_url('barang'));
                session()->setFlashdata('pesan', 'Diedit');
            }
        }
    }
}
