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
        <h1 class="mt-4">Data Pegawai</h1>
        <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalTambah">
            <b class="fa fa-plus"> Tambah Data</b></button>
        <?php if (session()->get('message')) { ?>
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data pegawai berhasil <strong> <?= session()->get('message'); ?></strong>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-6">
                <?php
                if (session()->get('err')) {
                    echo "<div class='alert alert-danger' role='alert'>
                            " . session()->get('err') . "
                        </div>";
                    session()->remove('err');
                }
                ?>
            </div>
        </div>
        <table class="table" border="3px" style="background-color: #FFFFFF">
            <thead>
                <tr>
                    <th style="background-color: #FFFFFF">#</th>
                    <th style="background-color: #FFFFFF">Username</th>
                    <th style="background-color: #FFFFFF">Email</th>
                    <th style="background-color: #FFFFFF">Password</th>
                    <th style="background-color: #FFFFFF">telepon</th>
                    <th style="background-color: #FFFFFF">Alamat</th>
                    <th style="background-color: #FFFFFF">Admin</th>
                    <th style="background-color: #FFFFFF">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 0;
                foreach ($operator as $row) {
                    $i++; ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['email_op']; ?></td>
                        <td><?= $row['password_op']; ?></td>
                        <td><?= $row['telepon']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td>
                            <a href="operator/editpage/<?= $row['id_operator'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> </a>
                            <button type="button" data-toggle="modal" data-target="#modalHapus<?= $row['id_operator'] ?>" id="btn-hapus" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>


                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Operator</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="operator/tambah" name="myform">
                    <div class="form-group">
                        <label for="username"></label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" required>
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password"></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon"></label>
                        <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukan Nomor Telepon" required onkeyup="format_number(this)">
                    </div>
                    <div class="form-group">
                        <label for="alamat"></label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required></textarea>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name='tambah' class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php $i = 0;
foreach ($operator as $row) {
    $i++; ?>
    <div class="modal fade" id="modalEdit<?= $row['id_operator'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Operator</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="operator/edit/<?= $row['id_operator'] ?>" name="form_edit">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id-oper" value="<?= $row['id_operator'] ?>">
                            <label for="username"></label>
                            <input type="text" name="username" class="form-control" placeholder="Masukan Username" value="<?= $row['nama'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" value="<?= $row['email_op'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password"></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" value="<?= $row['password_op'] ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="telepon" id="phone_number_edit" onkeyup="format_number_edit(this)" class="form-control" placeholder="Masukan Nomor Telepon" value="<?= $row['telepon'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat"></label>
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required="true"><?= $row['alamat'] ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($operator as $row) { ?>
    <div class="modal fade" id="modalHapus<?= $row['id_operator'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Operator</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('operator/hapus/' . $row['id_operator']) ?>
                    Apakah anda yakin untuk menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
<?php } ?>

<?= $this->include('enc/footer') ?>