<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<?= $this->include('inc_op/header') ?>
<?= $this->include('inc_op/sidebar') ?>
<div id="page-content-wrapper" style="background-color: #FFFFFF">

    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>

    <div class="container-fluid">
        <h1>Selamat Datang <?= $nama ?> !</h1><br>
        <p>Ada <a href="<?= base_url('pesananop') ?>"><?= $hitung2 ?></a> pesanan yang belum diproses</p>
        <p>Ada <a href="#"><?= $hitung1 ?></a> transaksi yang belum diproses</p>
    </div>
</div>

<?= $this->include('inc_op/footer') ?>