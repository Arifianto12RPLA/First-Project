<?= $this->include('inc_mbr/head.php') ?>
<div class="container-fluid">
    <?php foreach ($barang as $bar) { ?>
        <div class="row">
            <div class="col-md-5">
                <img src="<?= base_url('gambar/' . $bar['gambar']) ?>" width="500px" height="575px">
            </div>
            <div class="col-md-7">
                <h2><?= $bar['judul'] ?></h2>
                <p><b>Kategori :</b> <?= $bar['kategori'] ?></p>
                <h5 class="text-info"><b>Harga :</b>Rp. <?=number_format($bar['harga'], 0, '.', '.')?></h5>
                <p><b>Deskripsi :</b>
                    <?= $bar['deskripsi'] ?></p>
                <p><b>Stok :</b> <?= $bar['stok'] ?></p>
                <form method="POST" action="<?= base_url('cart/add') ?>">
                    <input type="hidden" name="id_produk" value="<?= $bar['id_produk'] ?>">
                    <input type="hidden" name="harga" value="<?= $bar['harga'] ?>">
                    <input type="hidden" value="<?= $bar['id_produk'] ?>" name="id_produk">
                    Warna : <input type="text" name="warna" class="form-control mr-sm-2" required><br>
                    Ukuran : <input type="text" name="ukuran" class="form-control mr-sm-2" required><br>
                    Qty : <input type="number" name="qty" class="form-control mr-sm-2" required><br>
                    <input type="submit" class="btn btn-warning" value="Beli Sekarang">
                </form>
            </div>
        </div>
    <?php } ?>
</div>
<?= $this->include('inc_mbr/foot.php') ?>