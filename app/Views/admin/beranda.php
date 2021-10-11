<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<?= $this->include('enc/header') ?>
<?= $this->include('enc/sidebar') ?>
<div id="page-content-wrapper" style="background-color: #FDEAA0">

    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>

    <div class="container-fluid">
        <a href="operator"><button class="button" style="background-color:red"><span>Pegawai : <?php print_r($jumlahOp); ?></span></button></a>
        <a href="barang"><button class="button" style="background-color:teal"><span>Barang : <?php print_r($jumlahProd); ?></span></button></a>
        <a href="kategori"><button class="button" style="background-color:orange"><span>Kategori : <?php print_r($jumlahKat); ?></span></button></a>
        <a href="model"><button class="button" style="background-color:blue"><span>Model : <?php print_r($jumlahMod) ?></span></button></a>
        <?php foreach ($admin as $kat) ?>
        <h1 class="mt-4">Selamat datang, <?= $kat['username'] ?> !</h1><br>
        <hr style="background-color: black;">
        <?= form_open('beranda/edit/' . $kat['id_admin']) ?>
        <input type="hidden" name="id_admin" value="<?= $kat['id_admin'] ?>">
        <h4>Username :</h4>
        <input type="text" class="form-control" name="username" value="<?= $kat['username'] ?>" required>
        <h4>Email :</h4>
        <input type="email" class="form-control" name="email" value="<?= $kat['email'] ?>" required>
        <h4>Password</h4>
        <input type="password" class="form-control" name="password" value="<?= $kat['password'] ?>" required>
        <p></p>
        <button class="btn btn-lg btn-primary" type="submit">Simpan</button>
        <?= form_close() ?>
    </div>
</div>

<?= $this->include('enc/footer') ?>