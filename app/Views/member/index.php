<?= $this->include('inc_mbr/head.php') ?>
<!-- Jumbotron -->
<section>
    <div class="jumbotron text-black" style="background: url(asseets/bg.jpg); background-size: cover; ">
        <div class="container">
            <h1 class="display-4"><b>Selamat Datang Di ARF.Wears</b></h1>
            <p class="lead text-dark"><b><u>Create your own design</u></b></p>
            <hr class="my-4 bg-dark">
            <p class="text-dark">Mulai membeli produk dengan jutaan desain baju</p>
            <a class="btn btn-primary btn-lg" href="<?= base_url('product') ?>" role="button">Mulai Belanja</a>
        </div>
    </div>
    <!-- End Jumbotron -->
    <!-- Contain -->
    <div class="container">
        <h3>Produk</h3>
        <div class="row">
            <?php foreach ($barang as $bar) { ?>
                <div class="col-md-3 mb-1">
                    <a href="<?= base_url('product_detail/index/' . $bar['id_produk']) ?>">
                        <div class="card" style="width: 18rem;">
                            <img src="gambar/<?= $bar['gambar'] ?>" class="card-img-top" alt="produk" style="width: 275px; height: 300px">
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
</section>

<!-- End Contain -->
<!-- JB -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="asseets/design.jpg" class="img-thumbnail">
            </div>

            <div class="col-md-9">
                <h2>Create Your Own Design</h2>
                <p class="lead">Disini kamu bisa membuat desain gambar bajumu sendiri, setelah itu kamu bisa memesan bajumu dengan stok maksimal 20. Sebelum itu, pastikan kamu sudah login untuk masuk ke halaman ini</p><br>
                <a href="<?= base_url('desain') ?>"><button type="button" class="btn-lg btn-info">Mulai Desain</button></a>
            </div>
        </div>
    </div>
</div>
<!-- End JB -->
<?= $this->include('inc_mbr/foot.php') ?>