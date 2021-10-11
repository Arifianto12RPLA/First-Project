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
        <h1 class="mt-4">Data Kategori Produk</h1>
        <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalTambah">
            <b class="fa fa-plus"> Tambah Data</b>
        </button>
        <?php if (session()->get('pesan')) { ?>
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data kategori berhasil <strong><?= session()->get('pesan'); ?></strong>
            </div>
        <?php } ?>
        <div class="col-md-6">
            <?php
            if (session()->get('erro')) {
                echo "<div class='alert alert-danger' role='alert'>
                            " . session()->get('erro') . "
                        </div>";
                session()->remove('erro');
            }
            ?>
        </div>
        <table class="table" border="3px" style="background-color: #FFFFFF">
            <thead>
                <tr>
                    <th style="background-color: #FFFFFF">ID</th>
                    <th style="background-color: #FFFFFF">Nama Kategori</th>
                    <th style="background-color: #FFFFFF">Harga</th>
                    <th style="background-color: #FFFFFF">Admin</th>
                    <th style="background-color: #FFFFFF">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kategori as $kat) { ?>
                    <tr>
                        <td><?= $kat['id_kategori']; ?></td>
                        <td><?= $kat['kategori']; ?></td>
                        <td>Rp. <?= number_format($kat['Harga'], 0, '.', '.') ?></td>
                        <td><?= $kat['username']; ?></td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#modalEdit<?= $kat['id_kategori'] ?>" id="btn-edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                            <button type="button" data-toggle="modal" data-target="#modalHapus<?= $kat['id_kategori'] ?>" class="btn btn-sm btn-danger" id="btn-hapus"><i class="fa fa-trash"></i></button>
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
                <h5 class="modal-title">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('kategori/tambah') ?>
                <div class="form-group">
                    <label for="nama"></label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Kategori" required>
                </div>
                <div class="form-group">
                    <label for="harga"></label>
                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan Harga" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php foreach ($kategori as $kat) { ?>
    <div class="modal fade" id="modalEdit<?= $kat['id_kategori'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit data kategori</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('kategori/edit/' . $kat['id_kategori']) ?>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id_kat" value="<?= $kat['id_kategori'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="nama_lama" value="<?= $kat['kategori'] ?>">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Kategori" value="<?= $kat['kategori'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan Harga" value="<?= $kat['Harga'] ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php foreach ($kategori as $row) { ?>
    <div class="modal fade" id="modalHapus<?= $row['id_kategori'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('kategori/hapus/' . $row['id_kategori']) ?>
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