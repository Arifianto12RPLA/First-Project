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
    <!-- End Header -->