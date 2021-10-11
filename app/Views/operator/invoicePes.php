<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="font-size: 64px; color:#dddddd;"><i>Invoice Pesanan</i></div>
    <p>
        <i>
            <h1>ARF.Wears</h1>
        </i><br>
        Batu, Jawa Timur, Indonesia <br>
        089683561396
    </p>
    <hr>
    <hr>
    <p>
        Pembeli : <?= $member['nama'] ?> <br>
        Email : <?= $member['email'] ?> <br>
        Telepon : <?= $member['telepon'] ?>
    </p>
    <table cellpadding="6">
        <thead class="thead-dark">
            <tr>
                <th><strong>#</strong></th>
                <th><strong>Kategori</strong></th>
                <th><strong>Model</strong></th>
                <th><strong>Deskripsi</strong></th>
                <th><strong>Jumlah</strong></th>
                <th><strong>Total</strong></th>
                <th><strong>Tanggal</strong></th>
                <th><strong>Metode</strong></th>
            </tr>
            <?php $i = 0; ?>
            <?php foreach ($invoice as $c) { ?>
                <?php $i++; ?>
                <tr>
                    <td scope="row"><?= $i ?></td>
                    <td class="text-info"><?= $c['kategori'] ?></td>
                    <td><?= $c['nama_model'] ?></td>
                    <td><?= $c['deskripsi'] ?></td>
                    <td><?= $c['jumlah'] ?></td>
                    <td>Rp. <?= $c['total'] ?></td>
                    <td><?= $c['tanggal'] ?></td>
                    <td><?= $c['metode'] ?></td>
                </tr>
            <?php } ?>
    </table>
</body>

</html>