<?php

namespace App\Controllers;

use App\Models\M_user;
use CodeIgniter\Controller;

class login extends BaseController
{
    public function index()
    {
        return view('admin/user_form');
    }
    public function login_action()
    {
        $muser = new M_user();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $cek = $muser->get_data($email, $password);

        if ($cek) {
            session()->set('email', $cek['email']);
            session()->set('username', $cek['username']);
            session()->set('id_admin', $cek['id_admin']);
            session()->set('password', $cek['password']);
            return redirect()->to(base_url('beranda'));
        } else {
            session()->setFlashdata('gagal', 'Email atau Password Salah');
            return redirect()->to(base_url('login'));
        }
    }

    //--------------------------------------------------------------------
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
