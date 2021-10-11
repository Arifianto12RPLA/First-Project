<?php

namespace App\Controllers;

use App\Models\M_member;
use App\Models\M_kategori;

class account extends BaseController
{
    public function __construct()
    {
        $this->model1 = new M_member;
        $this->model2 = new M_kategori;
        helper('form');
    }
    public function index()
    {
        $validation = \Config\Services::validation();
        session();
        $id_member = session()->get('id_user');
        $data = [
            'kategori' => $this->model2->getAllData(),
            'member' => $this->model1->getOne($id_member),
            'validation' => $validation
        ];
        if (session()->get('id_user') != null) {
            return view('member/account', $data);
        } else {
            return redirect()->to(base_url('sign'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Home'));
    }
    public function update($id)
    {
        $email_lama = $this->request->getPost('email_lama');
        $telepon_lama = $this->request->getPost('telepon_lama');
        if ($email_lama == $this->request->getPost('email') and $telepon_lama != $this->request->getPost('telepon')) {
            $rule_email = 'required|max_length[50]';
            $rule_telepon = 'required|max_length[25]|min_length[9]|is_unique[operator.telepon]';
        } elseif ($email_lama != $this->request->getPost('email') and $telepon_lama == $this->request->getPost('telepon')) {
            $rule_email = 'required|max_length[50]|is_unique[operator.email_op]';
            $rule_telepon = 'required|max_length[25]|min_length[9]';
        } elseif ($email_lama != $this->request->getPost('email') and $telepon_lama != $this->request->getPost('telepon')) {
            $rule_email = 'required|max_length[50]|is_unique[operator.email_op]';
            $rule_telepon = 'required|max_length[25]|min_length[9]|is_unique[operator.telepon]';
        } else {
            $rule_email = 'required|max_length[50]';
            $rule_telepon = 'required|max_length[25]|min_length[9]';
        }
        if (!$this->validate([
            'nama' => 'required|max_length[25]|min_length[5]',
            'email' => $rule_email,
            'telepon' => $rule_telepon,
            'password' => 'required|min_length[5]',
            'alamat' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('account'))->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getPost('id_user');
            $data = [
                'nama' => $this->request->getPost('nama'),
                'alamat_us' => $this->request->getPost('alamat'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('pass'),
                'telepon' => $this->request->getPost('telepon')
            ];

            $query = $this->model1->edit($id, $data);
            if ($query) {
                return redirect()->to(base_url('account'));
            }
        }
    }
    public function SS()
    {
        $data = [
            'kategori' => $this->model2->getAllData(),
        ];
        return view('member/tentang', $data);
    }
}
