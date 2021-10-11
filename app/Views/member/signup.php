<?= $this->include('inc_mbr/head.php') ?>
<section class="main-content">
    <div class="container">
        <h3>Registrasi</h3>
        <hr style="background-color: #000000">
        <h5>DATA PRIBADI</h5>
        <form method="POST" action="<?= base_url('sign/register') ?>" name="myform">
            <label for="nama">Nama :</label><br>
            <input type="text" name="nama" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama') ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('nama') ?>
            </div>
            <label for="alamat">Alamat :</label><br>
            <textarea class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat"><?= old('alamat') ?></textarea>
            <div class="invalid-feedback">
                <?= $validation->getError('alamat') ?>
            </div>
            <label for="email">Email :</label><br>
            <input type="email" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= old('email') ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('email') ?>
            </div>
            <label for="email">password :</label><br>
            <input type="password" name="pass" id="pass" class="form-control <?= ($validation->hasError('pass')) ? 'is-invalid' : ''; ?>" value="<?= old('pass') ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('pass') ?>
            </div>
            <label for="telepon">Telepon :</label><br>
            <input type="text" name="telepon" id="telepon" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" onkeyup="format_number(this)" value="<?= old('telepon') ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('telepon') ?>
            </div>
            <small class="text-info">*Wajib Diisi</small>
            <hr style="background-color: #000000">
            <button type="submit" class="btn btn-dark btn-lg">Daftar</button>
        </form>
    </div>
</section>
<?= $this->include('inc_mbr/foot.php') ?>