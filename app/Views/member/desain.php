<?= $this->include('inc_mbr/head.php') ?>
<div class="container">
    <h3 class="text">Halaman Desain</h3><br>
    <form method="POST" action="<?= base_url('transaksi_desain') ?>" enctype="multipart/form-data">
        Kategori :<br>
        <select name="id_kategori" class="form-control">
            <?php foreach ($kategori as $kat) { ?>
                <option value="<?= $kat['id_kategori'] ?>"><?= $kat['kategori'] ?></option>
            <?php } ?>
        </select><br>
        Model :<br>
        <div class="row">
            <?php foreach ($model as $mod) { ?>
                <div class="col-md-3">
                    <input type="radio" value="<?= $mod['id_model'] ?>" name="model" class="form-check-input"><img src="<?= base_url('gambarmdl/' . $mod['gambar']) ?>" width="250px" height="180px">
                </div>
            <?php } ?>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">Pilih Gambar A :<br><small></small><br><input type="file" name="gambar" id="gambarA" class="form-control" onchange="previewA()"><br>
                <img src="<?= base_url('asseets/default.jpg') ?>" width="250px" height="250px" class="img-preview">
            </div>
            <div class="col-md-6">
                Pilih Gambar B :<br><small class="text-danger">*Jika ada</small><br>
                <input type="file" name="gambarB" class="form-control" id="gambarB" onchange="previewB()"><br>
                <img src="<?= base_url('asseets/default.jpg') ?>" width="250px" height="250px" class="img-preview2">
            </div>
        </div>
        <p></p>
        Ukuran :<br>
        <small class="text-info">Format : Panjang , Lebar</small>
        <select name="ukuran" class="form-control">
            <option value="S">S (10cm , 8cm)</option>
            <option value="M">M (15cm , 10cm)</option>
            <option value="L">L (17cm , 13cm)</option>
            <option value="XL">XL (20cm , 15cm)</option>
        </select><br>
        Warna :<br>
        <div class="row">
            <div class="col-md-6">
                <input type="radio" name="warna" value="merah" class="form-check-input">
                <h6 class="text-danger">Merah</h6>
                <input type="radio" name="warna" value="Biru" class="form-check-input">
                <h6 class="text-primary">Biru</h6>
                <input type="radio" name="warna" value="kuning" class="form-check-input">
                <h6 class="text-warning">Kuning</h6>
            </div>
            <div class="col-md-6">
                <input type="radio" name="warna" value="hitam" class="form-check-input">
                <h6 class="text-dark">Hitam</h6>
                <input type="radio" name="warna" value="hijau" class="form-check-input">
                <h6 class="text-success">Hijau</h6>
                <input type="radio" name="warna" value="putih" class="form-check-input">
                <h6>Putih</h6>
            </div>
        </div>
        <br>
        Qty :<br>
        <small class="text-info">*Maksimal 20</small>
        <input type="number" name="qty" class="form-control"><br>
        <button class="btn btn-success btn-lg" type="submit">Lakukan Pembayaran</button>
    </form>
</div>
<?= $this->include('inc_mbr/foot.php') ?>