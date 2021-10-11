<?= $this->extend('layout_transaksi') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card" style="width: 26rem; margin-top: 8px;">
                <?php if ($gambarB != '') { ?>
                    <center>
                        <h5>Gambar A</h5><img src="<?= base_url('gambar_mdl/' . $gambarA) ?>" class="card-img-top" alt="produk" style="width: 300px; height: 300px; margin-right: 6px">
                        <h5>Gambar B</h5><img src="<?= base_url('gambar_mdl/' . $gambarB) ?>" class="card-img-top" alt="produk" style="width: 300px; height: 300px; margin-right: 6px">
                    </center>
                <?php } else { ?>
                    <h5>Gambar A</h5><img src="<?= base_url('gambar_mdl/' . $gambarA) ?>" class="card-img-top" alt="produk" style="width: 300px; height: 300px; margin-right: 6px">
                <?php } ?>
                <div class="card-body">
                    <?php foreach ($id_kategori as $id) { ?>
                        <h5 class="card-title text-dark">Kategori : <?= $id['kategori'] ?></h5>

                        <?php foreach ($model as $mod) { ?>
                            <p class="card-text">Model : <?= $mod['nama_model'] ?></p>
                            <p class="card-text text-info">Deskripsi : <?= $ukuran ?>, <?= $warna ?></p>
                            <p class="card-text">Qty : <?= $qty ?></p>
                            <?php
                            $harga_kat = $id['Harga'];
                            $harga_mod = $mod['harga'];
                            $kuan = $qty;
                            $subtotal = ($harga_kat + $harga_mod) * $kuan;

                            ?>
                            <p class="card-text text-success"><b>Subtotal : Rp.<?= $subtotal ?></b></p>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top: 8px;">
            <h3>Pengiriman</h3><br>
            <form action="<?= base_url('transaksi_desain/bayar') ?>" method="POST">
                <label for="provinsi">Pilih Provinsi</label>
                <select name="provinsi" id="provinsi" class="form-control">
                    <option>Pilih Provinsi</option>
                    <?php foreach ($provinsi as $prov) { ?>
                        <option value="<?= $prov->province_id ?>" nama="<?= $prov->province ?>"><?= $prov->province ?></option>
                    <?php } ?>
                </select>
                <?php foreach ($id_kategori as $id) { ?>
                    <input type="hidden" value="<?= $id['id_kategori'] ?>" name="kategori">
                <?php } ?>
                <?php foreach ($model as $mod) { ?>
                    <input type="hidden" value="<?= $mod['id_model'] ?>" name="model">
                <?php } ?>

                <input type="hidden" value="<?= $gambarA ?>" name="gambarA">
                <input type="hidden" value="<?= $gambarB ?>" name="gambarB">
                <input type="hidden" name="warna" value="<?= $warna ?>">
                <input type="hidden" name="ukuran" value="<?= $ukuran ?>">
                <input type="hidden" name="qty" value="<?= $qty ?>">
                <input type="hidden" id="prov" name="prov">
                <label for="kota">Pilih Kabupaten/Kota</label>
                <select name="kota" id="kota" class="form-control">
                    <option>Pilih Kabupaten/Kota</option>
                </select>
                <input type="hidden" id="kta" name="kta">
                <label for="jasa">Pilih Jasa</label>
                <select name="jasa" id="jasa" class="form-control">
                    <option>Pilih Jasa</option>
                </select>
                <input type="hidden" id="jsa" name="jsa">
                <input type="hidden" id="subtotal" value="<?= $subtotal ?>" name="subtotal">
                <strong>Estimasi : <span id="estimasi"></span></strong><br>
                <label for="ongkir">Ongkir</label>
                <input type="text" name="ongkir" id="ongkir" readonly="true" class="form-control">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
                <label for="total">Total</label>
                <input type="text" name="total" id="total" class="form-control" readonly="true"><br>
                Pilih Metode Pembayaran :<br>
                <input type="radio" name="method" value="BCA" class="form-check-input">
                <h6 class="text-primary">BCA</h6>
                <input type="radio" name="method" value="BRI" class="form-check-input">
                <h6 class="text-primary">BRI</h6>
                <input type="radio" name="method" value="Mandiri" class="form-check-input">
                <h6 class="text-primary">Mandiri</h6>
                <button type="submit" class="btn btn-primary btn-md">Mulai Pembayaran</button>
        </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $('document').ready(function() {
        var subtotal = 1;
        var ongkir = 0;
        $("#provinsi").on('change', function() {
            $("#kota").empty();
            var id_province = $(this).val();
            var nama = $('option:selected', this).attr('nama');
            $("#prov").val(nama);
            $.ajax({
                url: "<?= site_url('transaksi_desain/getCity') ?>",
                type: 'GET',
                data: {
                    'id_province': id_province,
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    var results = data["rajaongkir"]["results"];
                    for (var i = 0; i < results.length; i++) {
                        $("#kota").append($('<option>', {
                            value: results[i]["city_id"],
                            text: results[i]['city_name'],
                            nama: results[i]['city_name']
                        }));
                    }

                },
            });
        });
        $("#kota").on('change', function() {
            var id_city = $(this).val();
            var nama = $('option:selected', this).attr('nama');
            $("#kta").val(nama);
            $.ajax({
                url: "<?= site_url('transaksi_desain/getCost') ?>",
                type: 'GET',
                data: {
                    'origin': 51,
                    'destination': id_city,
                    'weight': 500,
                    'courir': 'jne',
                },
                dataType: 'json',
                success: function(data) {

                    console.log(data);
                    var results = data["rajaongkir"]["results"][0]["costs"];
                    for (var i = 0; i < results.length; i++) {
                        var text = results[i]["description"] + "(" + results[i]["service"] + ")";
                        $("#jasa").append($('<option>', {
                            value: results[i]["cost"][0]["value"],
                            text: text,
                            etd: results[i]["cost"][0]["etd"],
                            jsa: results[i]["service"]
                        }));
                    }
                },
            });
        });
        $("#jasa").on('change', function() {
            var estimasi = $('option:selected', this).attr('etd');
            var jasa = $('option:selected', this).attr('jsa');
            $("#jsa").val(jasa);
            $("#estimasi").html(estimasi + " Hari");
            ongkir = parseInt($(this).val());
            subtotal = parseInt($("#subtotal").val());
            $("#ongkir").val(ongkir);
            var total = subtotal + ongkir;
            $("#total").val(total);
        });
    });
</script>
<?= $this->endSection() ?>