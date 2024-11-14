<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pelunasan Piutang Usaha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <h2 class="text-center">Laporan Pelunasan Piutang Usaha</h2>

    <table>
        <thead>
            <tr>
                <th>Nota</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Rekening Pelunasan</th>
                <th>Saldo</th>
                <th>Nilai Pelunasan</th>
                <th>Discount</th>
                <th>PDPT.lain-lain</th>
                <th>Sisa</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
    <?php if (is_array($dtpiutangusaha)): ?> 
        <!-- Jika data berupa array, lakukan foreach -->
        <?php $no = 1; ?>
        <?php foreach ($dtpiutangusaha as $value): ?>
            <tr>
                <td><?= $value->nota ?></td>
                <td><?= $value->nama_pelanggan ?></td>
                <td><?= $value->tanggal ?></td>
                <td><?= $value->nama_setupbank ?></td>
                <td><?= $value->saldo ?></td>
                <td><?= $value->nilai_pelunasan ?></td>
                <td><?= $value->diskon ?></td>
                <td><?= $value->pdpt ?></td>
                <td><?= $value->sisa ?></td>
                <td><?= $value->keterangan ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?> 
        <!-- Jika data hanya satu objek, cetak langsung -->
        <tr>
            <td><?= $dtpiutangusaha->nota ?></td>
            <td><?= $dtpiutangusaha->nama_pelanggan ?></td>
            <td><?= $dtpiutangusaha->tanggal ?></td>
            <td><?= $dtpiutangusaha->nama_setupbank ?></td>
            <td><?= $dtpiutangusaha->saldo ?></td>
            <td><?= $dtpiutangusaha->nilai_pelunasan ?></td>
            <td><?= $dtpiutangusaha->diskon ?></td>
            <td><?= $dtpiutangusaha->pdpt ?></td>
            <td><?= $dtpiutangusaha->sisa ?></td>
            <td><?= $dtpiutangusaha->keterangan ?></td>
        </tr>
    <?php endif; ?>
</tbody>

    </table>

    <div class="text-right">
        <p>Tanggal Cetak: <?= date('d-m-Y') ?></p>
    </div>
</body>
</html>
