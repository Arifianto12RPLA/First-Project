<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_member;
use CodeIgniter\Controller;

class sign extends BaseController
{
    public function __construct()
    {
        $this->modelKat = new M_kategori;
        $this->mem = new M_member;
        helper('form');
    }
    public function index()
    {
        $data = [
            'kategori' => $this->modelKat->getAllData()
        ];
        return view('member/signin.php', $data);
    }
    public function verifikasi()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $cek = $this->mem->get_data($email, $password);

        if ($cek) {
            session()->set('email', $cek['email']);
            session()->set('nama', $cek['email']);
            session()->set('id_user', $cek['id_user']);
            session()->set('password', $cek['password']);
            return redirect()->to(base_url('account'));
        } else {
            session()->setFlashdata('fail', 'Email atau Password Salah');
            return redirect()->to(base_url('sign'));
        }
    }
    public function daftar()
    {
        session();
        $data = [
            'kategori' => $this->modelKat->getAllData(),
            'validation' => \Config\Services::validation()
        ];
        return view('member/signup', $data);
    }
    public function register()
    {
        if (!$this->validate([
            'nama' => 'required|min_length[3]|max_length[50]',
            'alamat' => 'required',
            'email' => 'required|is_unique[user.email]',
            'pass' => 'required|min_length[5]',
            'telepon' => 'required|is_unique[user.telepon]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('sign/daftar'))->withInput()->with('validation', $validation);
        } else {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'alamat_us' => $this->request->getPost('alamat'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('pass'),
                'telepon' => $this->request->getPost('telepon')
            ];

            $query = $this->mem->register($data);
            if ($query) {
                return redirect()->to(base_url('sign'));
            }
        }
    }
}
