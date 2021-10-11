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
        <h1 class="mt-4">Data Produk</h1>
        <button type="button" class="btn btn-sm
         btn-primary mb-2" data-toggle="modal" data-target="#modalTambah">
            <b class="fa fa-plus">Tambah Data</b>
        </button>
        <?php if (session()->get('pesan')) { ?>
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data barang berhasil <strong><?= session()->get('pesan'); ?></strong>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-6">
                <?php
                if (session()->get('gagal')) {
                    echo "<div class='alert alert-danger' role='alert'>
                            " . session()->get('gagal') . "
                        </div>";
                    session()->remove('gagal');
                }
                ?>
            </div>
        </div>
        <table class="table" border="3px" style="background-color: #FFFFFF">
            <thead>
                <tr>
                    <th style="background-color: #FFFFFF">ID</th>
                    <th style="background-color: #FFFFFF">Judul</th>
                    <th style="background-color: #FFFFFF">Deskripsi</th>
                    <th style="background-color: #FFFFFF">Harga</th>
                    <th style="background-color: #FFFFFF">Stok</th>
                    <th style="background-color: #FFFFFF">Gambar</th>
                    <th style="background-color: #FFFFFF">kategori</th>
                    <th style="background-color: #FFFFFF">Admin</th>
                    <th style="background-color: #FFFFFF">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang as $kat) { ?>
                    <tr>
                        <td style="background-color: #FFFFFF"><?= $kat['id_produk'] ?></td>
                        <td style="background-color: #FFFFFF"><?= $kat['judul']; ?></td>
                        <td style="background-color: #FFFFFF"><?= $kat['deskripsi']; ?></td>
                        <td style="background-color: #FFFFFF">Rp. <?= number_format($kat['harga'], 0, '.', '.') ?></td>
                        <td style="background-color: #FFFFFF"><?= $kat['stok']; ?></td>
                        <td style="background-color: #FFFFFF"><img src="gambar/<?= $kat['gambar']; ?>" style="width: 125px;"></td>
                        <td style="background-color: #FFFFFF"><?= $kat['kategori']; ?></td>
                        <td style="background-color: #FFFFFF"><?= $kat['username']; ?></td>
                        <td style="background-color: #FFFFFF">
                            <button type="button" data-toggle="modal" data-target="#modalEdit<?= $kat['id_produk'] ?>" id="btn-edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                            <button type="button" data-toggle="modal" data-target="#modalHapus<?= $kat['id_produk'] ?>" class="btn btn-sm btn-danger" id="btn-hapus"><i class="fa fa-trash"></i></button>
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
                <h5 class="modal-title">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('barang/tambah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="gambar" class="dropify" data-height="125">
                    </div>
                    <div class="form-group">
                        <label for="judul"></label>
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi"></label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan Deskripsi Barang"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga"></label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan Harga Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="stok"></label>
                        <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukan Stok Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori"></label>
                        Kategori: <select name="kategori" class="form-control">
                            <?php foreach ($kategori as $kit) { ?>
                                <option value="<?= $kit['id_kategori'] ?>"><?= $kit['kategori'] ?></option>
                            <?php } ?>
                        </select>
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
<?php foreach ($barang as $kat) { ?>
    <div class="modal fade" id="modalEdit<?= $kat['id_produk'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('barang/edit/' . $kat['id_produk']) ?>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id_kat" value="<?= $kat['id_produk'] ?>">
                        <input type="hidden" name="bajuLama" id="bajuLama" value="<?= $kat['gambar'] ?>">
                    </div>
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <p align="center"><img src="gambar/<?= $kat['gambar'] ?>" width="150px"></p><input type="file" name="gambar" data-height="125" class="dropify">
                    </div>
                    <div class="form-group">
                        <label for="judul"></label>
                        <input type="hidden" name="judul_lama" value="<?= $kat['judul'] ?>">
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan Nama Barang" required value="<?= $kat['judul'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi"></label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan Deskripsi Barang"><?= $kat['deskripsi'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga"></label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan Harga Barang" required value="<?= $kat['harga'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="stok"></label>
                        <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukan Stok Barang" required value="<?= $kat['stok'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kategori"></label>
                        Kategori: <select name="kategori" class="form-control">
                            <?php foreach ($kategori as $kit) { ?>
                                <option value="<?= $kit['id_kategori'] ?>"><?= $kit['kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php foreach ($barang as $row) { ?>
    <div class="modal fade" id="modalHapus<?= $row['id_produk'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('barang/hapus/' . $row['id_produk']) ?>
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