<?= $this->include('inc_mbr/head.php') ?>
<div class="container">
    <h3>Daftar Pesanan</h3>
    <hr>
    <table class="table table-bordered" style="margin-bottom: 175px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kategori</th>
                <th scope="col">Model</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Metode</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <?php if ($pesanan != null) { ?>
            <tbody>
                <?php $i = 0; ?>
                <?php foreach ($pesanan as $c) { ?>
                    <?php $i++; ?>
                    <tr>
                        <td scope="row"><?= $i ?></td>
                        <td class="text-info"><?= $c['kategori'] ?></td>
                        <td><?= $c['nama_model'] ?></td>
                        <td><?= $c['deskripsi'] ?></td>
                        <td><?= $c['jumlah'] ?></td>
                        <td>Rp. <?=number_format($c['total'], 0, '.', '.')?></td>
                        <?php
                            $tgl = explode("-", $c['tanggal']);
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
                        <td><?= $c['metode'] ?></td>
                        <?php if ($c['status'] == 1) { ?>
                            <td class="text-success">Success</td>
                        <?php } elseif ($c['status'] == 2) { ?>
                            <td class="text-warning">Pending</td>
                        <?php } else { ?>
                            <td class="text-danger">Abborted</td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="9">
                        <center class="text-info">Daftar Pesanan Kosong</center>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
    </table>
</div>
<?= $this->include('inc_mbr/foot.php') ?>