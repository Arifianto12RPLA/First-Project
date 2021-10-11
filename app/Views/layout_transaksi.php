<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('bootstrap-4.0.0/dist/css/bootstrap.min.css') ?>">

    <title>Index</title>
</head>

<body>
    <!-- Header -->
    <div class="container-fluid" style="background-color: #FF8D27;">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="<?= base_url('Home') ?>"><u class="text-white"><img src="<?= base_url('asseets/logonw.jpg') ?>" width="175px"></u></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('Home') ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?= base_url('account') ?>">Profil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                        <div class="dropdown-menu" aria-labelledby="#dropdown01">
                            <?php foreach ($kategori as $kat) { ?>
                                <a class="dropdown-item" href="<?= base_url('product/index/' . $kat['id_kategori']) ?>"><?= $kat['kategori'] ?></a>

                            <?php } ?>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?= base_url('cart') ?>">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0" method="POST" action="<?= base_url('search/index') ?>">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="kode" aria-label="Search">
                            <button class="btn btn-outline-white my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <?= $this->renderSection('content') ?>
    <!-- End Header -->
    <!-- Footer -->
    <footer class="container-fluid text-dark" style="background-color: #FF8D27;">
        <hr class="my-4 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4>AKUN SAYA</h4>
                    <ul>
                        <li><a href="account" class="text-dark">Pengaturan Akun</a></li>
                        <li><a href="order_history.php" class="text-dark">Daftar Pemesanan</a></li>
                        <li><a href="cart.php" class="text-dark">Keranjang Belanja</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>INFORMASI</h4>
                    <ul>
                        <li><a href="#" class="text-dark">Persyaratan Penggunaan</a></li>
                        <li><a href="#" class="text-dark">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-dark">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>LAINYA</h4>
                    <ul>
                        <li><a href="contact.php" class="text-dark">Tentang</a></li>
                        <li><a href="contact.php" class="text-dark">Hubungi</a></li>
                        <li><a href="blog.php" class="text-dark">Blog</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h4>HUBUNGI KAMI</h4>
                    <ul>
                        <li><a href="http://www.instagram.com" class="text-dark">Instagram</a></li>
                        <li><a href="http://www.facebook.com" class="text-dark">Facebook</a></li>
                    </ul>
                </div>
            </div>
            <section class="clearfix">
                <div id="payments">
                    <h4>CARA PEMBAYARAN KAMI</h4>
                    <img src="<?= base_url('asseets/payment-methods.gif') ?>" alt="Supported Payment Methods">
                </div>
            </section>
            </section>
        </div>
        <div class=" text-center pt-3 pb-3">
            <b>Author @Ari.arf 2020</b>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('bootstrap-4.0.0/dist/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-4.0.0/dist/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-4.0.0/dist/js/bootstrap.min.js') ?>"></script>
    <?= $this->renderSection('script') ?>

</body>

</html>