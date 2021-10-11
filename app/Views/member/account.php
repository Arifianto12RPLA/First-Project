<?= $this->include('inc_mbr/head.php') ?>
<section class="main-content">
    <div class="container">
        <?php foreach ($member as $mbr) { ?>
            <h3>Akun Saya</h3>
            <hr style="background-color: #000000">
            <form method="POST" action="<?= base_url('account/update/' . $mbr['id_user']) ?>" name="myform">
                <input type="hidden" name="id_user" value="<?= $mbr['id_user'] ?>">
                <h5>DATA PRIBADI</h5>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= (old('nama')) ? old('nama') : $mbr['nama'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama') ?>
                </div>
                <label for="alamat">Alamat :</label>
                <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat"><?= (old('alamat')) ? old('alamat') : $mbr['alamat_us'] ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat') ?>
                </div>
                <label for="email">Email :</label>
                <input type="hidden" name="email_lama" value="<?= $mbr['email'] ?>">
                <input type="email" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= (old('email')) ? old('email') : $mbr['email'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email') ?>
                </div>
                <label for="telepon">Telepon :</label>
                <input type="hidden" name="telepon_lama" value="<?= $mbr['telepon'] ?>">
                <input type="text" name="telepon" id="telepon" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" value="<?= (old('telepon')) ? old('telepon') : $mbr['telepon'] ?>" onkeyup="format_number(this)">
                <div class="invalid-feedback">
                    <?= $validation->getError('telepon') ?>
                </div>
                <input type="hidden" name="pass" id="pass" value="<?= $mbr['password'] ?>">
                <small class="text-info">*Wajib Diisi</small>
                <hr style="background-color: #000000">
                <button type="submit" class="btn btn-dark btn-lg">Simpan</button>
            </form><br>
            <a href="<?= base_url('account/logout') ?>"><button class="btn btn-danger btn-lg">Logout</button></a>
        <?php } ?>

    </div>
</section>
<?= $this->include('inc_mbr/foot.php') ?>