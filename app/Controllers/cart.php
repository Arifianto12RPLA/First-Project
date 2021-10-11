<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_cart;
use CodeIgniter\Controller;

class cart extends BaseController
{
    public function __construct()
    {
        $this->cart = new M_cart;
        $this->modelKat = new M_kategori;
        helper('form');
    }
    public function index()
    {
        $id = session()->get('id_user');
        $data = [
            'kategori' => $this->modelKat->getAllData(),
            'cart' => $this->cart->getCart($id)
        ];
        if (session()->get('id_user') != null) {
            return view('member/cart.php', $data);
        } else {
            return redirect()->to(base_url('sign'));
        }
    }
    public function add()
    {
        if (session()->get('id_user') != null) {
            $harga = $this->request->getPost('harga');
            $jumlah = $this->request->getPost('qty');
            $subtotal = $harga * $jumlah;

            $data = [
                'id_user' => session()->get('id_user'),
                'id_produk' => $this->request->getPost('id_produk'),
                'deskripsi_cart' => 'warna : ' . $this->request->getPost('warna') . ' ukuran : ' . $this->request->getPost('ukuran'),
                'jumlah' => $jumlah,
                'subtotal' => $subtotal
            ];
            $query = $this->cart->tambah($data);
            if ($query) {
                return redirect()->to(base_url('cart'));
            }
        } else {
            return redirect()->to(base_url('sign'));
        }
    }
    public function hapus($id)
    {
        $query = $this->cart->hapus($id);
        if ($query) {
            return redirect()->to(base_url('cart'));
        }
    }
    //--------------------------------------------------------------------
}
