<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_barang;
use App\Models\M_operator;
use CodeIgniter\Controller;

class login_op extends BaseController
{
    public function __construct()
    {
        $this->m_op = new M_operator;
        helper('form');
    }
    public function index()
    {
        return view('operator/login');
    }
    public function check()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $vrk = $this->m_op->get_data($email, $password);
        if ($vrk) {
            session()->set('email', $vrk['email_op']);
            session()->set('nama', $vrk['nama']);
            session()->set('id_operator', $vrk['id_operator']);
            session()->set('password', $vrk['password_op']);
            return redirect()->to(base_url('berandaOp'));
        } else {
            session()->setFlashdata('gagal', 'Email atau Password Salah');
            return redirect()->to(base_url('login_op'));
        }
    }
    //--------------------------------------------------------------------
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login_op'));
    }
}
