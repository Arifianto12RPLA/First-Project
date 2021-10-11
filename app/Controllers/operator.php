<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_admin;
use App\Models\M_operator;

class operator extends BaseController
{
    public function __construct()
    {
        $this->model = new M_operator;
        helper('form');
    }
    public function index()
    {
        session();
        $data = ['operator' => $this->model->getAllData()];
        return view('admin/V_operator', $data);
    }

    //--------------------------------------------------------------------
    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'username' => 'required|max_length[25]|min_length[5]',
                'email' => 'required|max_length[50]|is_unique[operator.email_op]',
                'telepon' => 'required|max_length[25]|min_length[9]|is_unique[operator.telepon]',
                'password' => 'required|min_length[5]',
                'alamat' => 'required'
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                return redirect()->to(base_url('operator'));
            } else {
                $create = [
                    'nama' => $this->request->getPost('username'),
                    'email_op' => $this->request->getPost('email'),
                    'password_op' => $this->request->getPost('password'),
                    'telepon' => $this->request->getPost('telepon'),
                    'alamat' => $this->request->getPost('alamat'),
                    'id_admin' => session()->get('id_admin')
                ];
                $query = $this->model->tambah($create);
                if ($query) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('operator'));
                }
            }
        } else {
            return redirect()->to(base_url('operator'));
        }
    }
    public function hapus($id)
    {
        $query = $this->model->hapus($id);
        if ($query) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to(base_url('operator'));
        }
    }
    public function edit($id)
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
            'username' => 'required|max_length[25]|min_length[5]',
            'email' => $rule_email,
            'telepon' => $rule_telepon,
            'password' => 'required|min_length[5]',
            'alamat' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('operator/editpage/' . $this->request->getPost('id')))->withInput()->with('validation', $validation);
        } else {

            $data = [
                'nama' => $this->request->getPost('username'),
                'email_op' => $this->request->getPost('email'),
                'password_op' => $this->request->getPost('password'),
                'telepon' => $this->request->getPost('telepon'),
                'alamat' => $this->request->getPost('alamat')
            ];
            $query = $this->model->ubah($data, $id);
            if ($query) {
                session()->setFlashdata('message', 'Diedit');
                return redirect()->to(base_url('operator'));
            }
        }
    }
    public function editpage($id)
    {
        session();
        $data = [
            'operator' => $this->model->getAllData($id),
            'validation' => \config\Services::validation()
        ];
        return view('admin/V_edit_op', $data);
    }
}
