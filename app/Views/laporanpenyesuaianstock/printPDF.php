<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th {
            background-color: #009548;
            color: white;
            text-align: center;
        }

        td {
            text-align: left;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Penyesuaian Stock</h2>
    <p><strong>Tanggal: </strong><?= $tglawal ?> - <?= $tglakhir ?></p>

    <table>
        <thead>
            <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nota</th>
                  <th>Rekening</th>
                  <th>Lokasi</th>
                  <th>Group</th>
                  <th>Nama Stock</th>
                  <th>Satuan</th>
                  <th>Saldo (Qty1/Qty2)</th>
                  <th>Qty 1(F)</th>
                  <th>Qty 2(F)</th>
                  <th>Penyesuaian(+/-)</th>
                  <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dtpenyesuaianstock)) : ?>
                <?php foreach ($dtpenyesuaianstock as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $value->tanggal ?></td>
                        <td><?= $value->nota ?></td>
                        <td><?= $value->nama_setupbank ?></td>
                        <td><?= $value->lokasi_asal ?></td>
                        <td><?= $value->nama_group ?></td>
                        <td><?= $value->nama_stock ?></td>
                        <td><?= $value->kode_satuan ?></td>
                        <td><?= $value->saldo ?></td>
                        <td><?= $value->qty_1 ?></td>
                        <td><?= $value->qty_2 ?></td>
                        <td><?= $value->penyesuaian ?></td>
                        <td><?= $value->keterangan ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="13" style="text-align: center;">Tidak ada data untuk ditampilkan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
