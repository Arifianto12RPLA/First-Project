<?= $this->include('enc/header'); ?>
<?= $this->include('enc/sidebar'); ?>

<h1 class="text-center">Edit Data Operator</h1>
<br>
<div class="container">
    <div class="row">
        <div class="col-6 md-4 center"> <?php foreach ($operator as $row) { ?> <form method="POST" action="<?= base_url('operator/edit/' . $row['id_operator']) ?>" name="form_edit">

                    <div class="form-group">
                        <input type="hidden" name="id" id="id-oper" value="<?= $row['id_operator'] ?>">
                        <label for="username"></label>
                        <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Username" value="<?= (old('username')) ? old('username') : $row['nama'] ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('username') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="hidden" name="email_lama" value="<?= $row['email_op'] ?>">
                        <input type="email" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Email" value="<?= (old('email')) ? old('email') : $row['email_op'] ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password"></label>
                        <input type="password" name="password" id="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Password" value="<?= (old('password')) ? old('password') : $row['password_op'] ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="telepon_lama" value="<?= $row['telepon'] ?>">
                        <input type="text" name="telepon" id="phone_number_edit" onkeyup="format_number_edit(this)" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nomor Telepon" value="<?= (old('telepon')) ? old('telepon') : $row['telepon'] ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('telepon') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat"></label>
                        <textarea name="alamat" id="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Alamat" required="true"><?= (old('alamat')) ? old('alamat') : $row['alamat'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat') ?>
                        </div>
                    </div>
                    <a href="<?= base_url('operator') ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            <?php } ?>
        </div>
    </div>
</div>
<?= $this->include('enc/footer'); ?>