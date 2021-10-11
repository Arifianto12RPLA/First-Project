<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_kategori;
use App\Models\M_model;
use App\Models\M_pesanan;
use ErrorException;

class transaksi_desain extends BaseController
{
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "af74a59f8360e34815f36b1cd80f88d5";
    public function __construct()
    {
        $this->model1 = new M_model;
        $this->model2 = new M_kategori;
        $this->model3 = new M_pesanan;
        helper('form');
    }
    public function index()
    {
        $id_kategori = $this->request->getPost('id_kategori');
        $id_model = $this->request->getPost('model');
        $file = $this->request->getFile('gambar');
        $namabaru = $file->getRandomName();
        $file->move('gambar_mdl', $namabaru);

        $file2 = $this->request->getFile('gambarB');
        if ($file2->getError() == 4) {
            $namabaru2 = '';
        } else {
            $namabaru2 = $file->getRandomName();
            $file2->move('gambar_mdl', $namabaru2);
        }
        $provinsi = $this->rajaongkir('province');

        $data = [
            'kategori' => $this->model2->getAllData(),
            'id_kategori' => $this->model2->getAllData($id_kategori),
            'model' => $this->model1->getAllData($id_model),
            'gambarA' => $namabaru,
            'gambarB' => $namabaru2,
            'ukuran' => $this->request->getPost('ukuran'),
            'warna' => $this->request->getPost('warna'),
            'qty' => $this->request->getPost('qty'),
            'provinsi' => json_decode($provinsi)->rajaongkir->results,
        ];
        return view('member/transaksi_desain', $data);
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
        $provinsi = $this->request->getPost('prov');
        $kota = $this->request->getPost('kta');
        $alamat = $this->request->getPost('alamat');
        $warna = $this->request->getPost('warna');
        $ukuran = $this->request->getPost('ukuran');
        $metode = $this->request->getPost('method');
        $total = $this->request->getPost('total');
        $create = [
            "id_user" => session()->get('id_user'),
            'id_model' => $this->request->getPost("model"),
            'id_kategori' => $this->request->getPost('kategori'),
            'gambar1' => $this->request->getPost('gambarA'),
            'gambar2' => $this->request->getPost('gambarB'),
            'deskripsi' => $warna . ", " . $ukuran,
            'tanggal' => date("Y-m-d"),
            'jumlah' => $this->request->getPost('qty'),
            'alamat' => $provinsi . ", " . $kota . ", " . $alamat,
            'subtotal' => $this->request->getPost('subtotal'),
            'ongkir' => $this->request->getPost('ongkir'),
            'total' => $total,
            'jasa' => $this->request->getPost('jsa'),
            'metode' => $metode,
            'status' => 2
        ];
        $query = $this->model3->tambah($create);
        if ($query) {
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
            $data = [
                'rekening' => $rekening,
                'bank' => $bank,
                'total' => $total,
                'kategori' => $this->model2->getAllData()
            ];
            return view('member/pembayaran', $data);
        }
    }
}
