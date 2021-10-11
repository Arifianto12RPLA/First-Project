<?= $this->include('inc_mbr/head.php') ?>
<div class="jumbotron text-white" style="background: url(<?= base_url('asseets/product_bg.jpg') ?>); background-size: cover; ">
    <div class="container">
        <h1 class="display-4"><b>ARF.Wears</b></h1>
        <hr class="my-4 bg-white">
        <p></p><br>
        <p class="lead">
            <h2><b style="color: #FF8D27; font-family: Century Gothic;">Mulai membeli produk dengan jutaan desain baju</b></h2>
        </p>
    </div>
</div>
<div class="container">
    <h3>Produk</h3>
    <div class="row">
        <?php foreach ($barang as $bar) { ?>
            <div class="col-md-3 mb-1">
                <a href="<?= base_url('product_detail/index/' . $bar['id_produk']) ?>">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('gambar/' . $bar['gambar']) ?>" class="card-img-top" alt="produk" style="width: 275px; height: 300px">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?= $bar['judul'] ?></h5>
                            <p class="card-text">Kategori : <?= $bar['kategori'] ?></p>
                            <p class="card-text text-success"><b>Rp. <?=number_format($bar['harga'], 0, '.', '.')?></b></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<hr>
<?= $this->include('inc_mbr/foot.php') ?>