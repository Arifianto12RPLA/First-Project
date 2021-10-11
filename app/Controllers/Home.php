<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_barang;
use CodeIgniter\Controller;

class Home extends BaseController
{
	public function __construct()
	{
		$this->modelBarang = new M_barang;
		$this->modelKat = new M_kategori;
		helper('form');
	}
	public function index()
	{
		$data = [
			'barang' => $this->modelBarang->special(),
			'kategori' => $this->modelKat->getAllData()
		];
		return view('member/index.php', $data);
	}
	//--------------------------------------------------------------------
}
