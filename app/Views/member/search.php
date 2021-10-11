<?= $this->include('inc_mbr/head.php') ?>
<h1>Search</h1>
<hr>
<h4>Hasil pencarian untuk "<b class="text-warning"><?= $kode ?></b>"</h4>
<hr>
<div class="container">

    <div class="row">
        <?php if ($barang != null) { ?>
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
        <?php } else { ?>
            <h1 style="margin-bottom: 200px;">Pencarian Tidak Tersedia</h1>
        <?php } ?>
    </div>
</div>
<?= $this->include('inc_mbr/foot.php') ?>