<?php

namespace App\Controllers;

use TCPDF;
use App\Models\M_user;
use App\Models\M_kategori;
use App\Models\M_operator;
use App\Models\M_barang;
use App\Models\M_detailTrans;
use App\Models\M_member;
use App\Models\M_model;
use App\Models\M_pesanan;
use App\Models\M_transaksi;

class transaksiop extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->model2 = new M_detailTrans;
        $this->transaksi = new M_transaksi;
        $this->member = new M_member;
        $this->email = \Config\Services::email();
    }
    public function index()
    {
        $username = session()->get('nama');
        $data = [
            'data' => $this->model2->getAllData()
        ];
        return view('operator/transaksi', $data);
    }
    public function invoice($id, $idus)
    {
        $satu = $this->member->getSatu($idus);
        $data = [
            'invoice' => $this->model2->getInvoice($id),
            'member' => $satu
        ];
        $html = view('operator/invoiceTrans', $data);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Ari Arf');
        $pdf->SetTitle('invoice');
        $pdf->SetSubject('invoice');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        $pdf->writeHTML($html, true, false, true, false, '');
        //$this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output(__DIR__ . '/../../public/uploads/invoice.pdf', 'F');

        $attachment = base_url('uploads/invoice.pdf');
        $message = '<h1>Invoice Transaksi</h1><p>Kepada ' . $satu['nama'] . '</p>';
        $to = $satu['email'];

        $this->sendEmail($attachment, $to, 'Invoice', $message);
        $status = [
            'status' => 1
        ];
        $this->transaksi->ubah($status, $id);
        session()->setFlashdata('pesan', 'Diedit');
        return redirect()->to(base_url('transaksiop'));
    }
    private function sendEmail($attachment, $to, $tittle, $meesage)
    {
        $this->email->setFrom('arifiantogik@gmail.com');
        $this->email->setTo($to);
        $this->email->attach($attachment);
        $this->email->SetSubject($tittle);
        $this->email->setMessage($meesage);

        if (!$this->email->send()) {
            return false;
        } else {
            return true;
        }
    }
    public function edit($id, $sta)
    {
        $status = [
            'status' => $sta
        ];
        $query = $this->transaksi->ubah($status, $id);
        if ($query) {
            session()->setFlashdata('pesan', 'Diedit');
            return redirect()->to(base_url('transaksiop'));
        }
    }
    //--------------------------------------------------------------------
}
