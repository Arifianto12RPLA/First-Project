<?= $this->include('inc_mbr/head.php') ?>
<div class="container">
    <h1>Pesanan sudah terkirim, lakukan pembayaran di bank <?= $bank ?> terdekat</h1>
    <h4>Total : Rp. <?=number_format($total, 0, '.', '.')?></h4>
    <h3 style="margin-bottom: 300px">Nomor Rekening : <?= $rekening ?></h3><br>


    <a href="<?= base_url('home') ?>"><button class="btn btn-dark">Kembali Belanja</button></a>
</div>
<?= $this->include('inc_mbr/foot.php') ?>