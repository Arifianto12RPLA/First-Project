<?= $this->include('inc_mbr/head.php') ?>
<div class="container">
    <h3>Keranjang Belanja</h3>
    <hr>
    <table class="table table-bordered" style="margin-bottom: 175px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($cart != null) {
                $total = 0;
                $i = 0; ?>

                <?php foreach ($cart as $c) {

                    $i++; ?>
                    <tr>
                        <td scope="row"><?= $i ?></td>
                        <td class="text-info"><?= $c['judul'] ?></td>
                        <td>Rp. <?=number_format($c['harga'], 0, '.', '.')?></td>
                        <td><?= $c['deskripsi_cart'] ?></td>
                        <td><?= $c['jumlah'] ?></td>
                        <td>Rp. <?=number_format($c['subtotal'], 0, '.', '.')?> <a href="<?= base_url('cart/hapus/' . $c['id_cart']) ?>"><img src="<?= base_url('asseets/remove.gif') ?>"></a></td>
                    </tr>
                    <?php $total = $c['subtotal'] + $total; ?>
                <?php } ?>
                <tr>
                    <th colspan="6">
                        <center>
                            <p>Total : Rp. <?=number_format($total, 0, '.', '.')?></p><a href="<?= base_url('home') ?>"><button class="btn btn-warning">Lanjutkan Belanja</button></a> <a href="<?= base_url('transaksi') ?>"><button class="btn btn-success">Lakukan Pembayaran</button></a>
                        </center>
                    </th>
                </tr>
            <?php } else { ?>
                <tr>
                    <td colspan="6">
                        <center class="text-info">Keranjang Kosong</center>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?= $this->include('inc_mbr/foot.php') ?>