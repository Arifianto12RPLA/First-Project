<?= $this->include('inc_op/header.php') ?>
<?= $this->include('inc_op/sidebar.php') ?>
<div id="page-content-wrapper" style="background-color: #FFFFFF">

    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>

    <div class="container-fluid">
        <h1>Halaman Pesanan</h1><br>
        <?php if (session()->get('pesan')) { ?>
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data Pesanan berhasil <strong><?= session()->get('pesan'); ?></strong>
            </div>
        <?php } ?>
        <table class="table table-striped" border="3px" style="background-color: #FFFFFF">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Gambar 1</th>
                    <th>Gambar 2</th>
                    <th>Tanggal</th>
                    <th>Alamat</th>
                    <th>Subtotal</th>
                    <th>Ongkir</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) { ?>
                    <tr>
                        <td><?= $d['id_pesanan'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['nama_model'] ?>, <?= $d['kategori'] ?>, <?= $d['deskripsi'] ?></td>
                        <td><?= $d['jumlah'] ?></td>
                        <td><img src="<?= base_url('gambar_mdl/' . $d['gambar1']) ?>" alt="Gambar 1" width="150px" height="75px"></td>
                        <?php if ($d['gambar2'] != null) { ?>
                            <td><img src="<?= base_url('gambar_mdl/' . $d['gambar2']) ?>" alt="Gambar 2" width="150px" height="75px"></td>
                        <?php } else { ?>
                            <td>Kosong</td>
                        <?php } ?>
                        <?php 
                            $tgl = explode("-", $d['tanggal']);
    $tanggal= $tgl[2];
    $bulan = $tgl[1];
    $tahun = $tgl[0];  
    switch($bulan){
        case 1:
        $bulan="Januari";
        break;
        case 2:
        $bulan="Februari";
        break;
        case 3:
        $bulan="Maret";
        break;
        case 4:
        $bulan="April";
        break;
        case 5:
        $bulan="Mei";
        break;
        case 6:
        $bulan="Juni";
        break;
        case 7:
        $bulan="Juli";
        break;
        case 8:
        $bulan="Agustus";
        break;
        case 9:
        $bulan="September";
        break;
        case 10:
        $bulan="Oktober";
        break;
        case 11:
        $bulan="November";
        break;
        case 12:
        $bulan="Desember";
        break;
    }
                        ?>
                        <td><?= $tanggal." ".$bulan." ".$tahun ?></td>
                        <td><?= $d['alamat'] ?></td>
                        <td>Rp. <?=number_format($d['subtotal'], 0, '.', '.')?></td>
                        <td>Rp. <?=number_format($d['ongkir'], 0, '.', '.')?>, <?= $d['jasa'] ?></td>
                        <td><?= $d['metode'] ?></td>
                        <?php if ($d['status'] == 1) { ?>
                            <td class="text-success">Success</td>
                        <?php } elseif ($d['status'] == 2) { ?>
                            <td class="text-warning">Pending</td>
                        <?php } else { ?>
                            <td class="text-danger">Abborted</td>
                        <?php } ?>
                        <td>
                            <a href="<?= base_url('pesananop/invoice/' . $d['id_pesanan'] . "/" . $d['id_user']) ?>"><button type="button" class="btn btn-success">1</button></a>
                            <a href="<?= base_url('pesananop/edit/' . $d['id_pesanan']) . "/2" ?>"><button type="button" class="btn btn-warning">2</button></a>
                            <a href="<?= base_url('pesananop/edit/' . $d['id_pesanan']) . "/3" ?>"><button type="button" class="btn btn-danger">3</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->include('inc_op/footer.php') ?>