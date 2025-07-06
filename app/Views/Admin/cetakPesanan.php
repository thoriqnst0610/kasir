<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 10pt;
        }
    </style>

    <h3>Pesanan Meja No.<?= $pesanan['nomorMeja'] ?></h3>
    <h3><strong>Total Bayar:</strong> <?= $pesanan['total'] ?></h3>

    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Pesanan</th>
                <th>Harga</th>
                <th>Jumlah Pesanan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data as $pesanan) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $pesanan['namaMenu']; ?></td>
                    <td><?php echo $pesanan['hargaMenu']; ?></td>
                    <td><?php echo $pesanan['jumlah']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>