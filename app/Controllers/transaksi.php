<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_kategori;
use App\Models\M_cart;
use App\Models\M_detailTrans;
use App\Models\M_transaksi;
use Config\Paths;
use Error;

class transaksi extends BaseController
{
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "af74a59f8360e34815f36b1cd80f88d5";
    public function __construct()
    {
        $this->model1 = new M_cart;
        $this->model2 = new M_kategori;
        $this->model3 = new M_transaksi;
        $this->model4 = new M_detailTrans;
        helper('form');
    }
    public function index()
    {
        $provinsi = $this->rajaongkir('province');
        $id = session()->get('id_user');
        $data = [
            'kategori' => $this->model2->getAllData(),
            'cart' => $this->model1->getCart($id),
            'provinsi' => json_decode($provinsi)->rajaongkir->results,
        ];
        return view('member/transaksi', $data);
    }
    public function getCost()
    {
        if ($this->request->isAJAX()) {
            $origin = $this->request->getGet('origin');
            $destination = $this->request->getGet('destination');
            $weight = $this->request->getGet('weight');
            $courir = $this->request->getGet('courir');
            $data = $this->rajaongkircost($origin, $destination, $weight, $courir);
            return $this->response->setJSON($data);
        }
    }
    private function rajaongkircost($origin, $destination, $weight, $courir)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courir,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        return $response;
    }
    public function getCity()
    {
        if ($this->request->isAJAX()) {
            $id_province = $this->request->getGet('id_province');
            $data = $this->rajaongkir('city', $id_province);
            return $this->response->setJSON($data);
        }
    }

    private function rajaongkir($method, $id_provinsi = null)
    {
        $endPoint = $this->url . $method;
        if ($id_provinsi != null) {
            $endPoint = $endPoint . "?province=" . $id_provinsi;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        return $response;
    }
    public function bayar()
    {
        $id = session()->get('id_user');
        $cart = $this->model1->getCart($id);
        $provinsi = $this->request->getPost('prov');
        $kota = $this->request->getPost('kta');
        $alamat = $this->request->getPost('alamat');
        $metode = $this->request->getPost('method');
        $create = [
            "id_user" => session()->get('id_user'),
            'tanggal' => date("Y-m-d"),
            'subtotal' => $this->request->getPost('subtotal'),
            'total' => $this->request->getPost('total'),
            'ongkir' => $this->request->getPost('ongkir'),
            'jasa' => $this->request->getPost('jsa'),
            'metode' => $metode,
            'status' => 2,
            'alamat' => $provinsi . ", " . $kota . ", " . $alamat

        ];
        $query = $this->model3->tambah($create);
        if ($query) {
            $detil = $this->model3->getOne();
            foreach ($cart as $c) {
                $ss = [
                    'id_transaksi' => $detil['id_transaksi'],
                    'id_produk' => $c['id_produk'],
                    'deskripsi_det' => $c['deskripsi_cart'],
                    'jumlah' => $c['jumlah']
                ];
                $quer = $this->model4->tambah($ss);
            }
            if ($quer) {
                $quere = $this->model1->deleteUser(session()->get('id_user'));
                if ($quere) {
                    $rekening = "0";
                    $bank = "qwe";
                    if ($metode == 'BCA') {
                        $rekening = "1231231312313123";
                        $bank = "BCA";
                    } elseif ($metode == 'BRI') {
                        $rekening = "54343434353344";
                        $bank = "BRI";
                    } else {
                        $rekening = "456765568786";
                        $bank = "Mandiri";
                    }
                }
                $data = [
                    'rekening' => $rekening,
                    'bank' => $bank,
                    'kategori' => $this->model2->getAllData(),
                    'total' => $this->request->getPost('total')
                ];
                return view('member/pembayaran', $data);
            }
        }
    }
}
