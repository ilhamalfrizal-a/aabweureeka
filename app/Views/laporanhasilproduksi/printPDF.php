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
    <h2 style="text-align: center;">Laporan Hasil Produksi</h2>
    <p><strong>Tanggal: </strong><?= $tglawal ?> - <?= $tglakhir ?></p>

    <table>
        <thead>
            <tr>
            <th>No</th>
                  <th>Nota</th>
                  <th>Lokasi</th>
                  <th>Kelompok Produksi</th>
                  <th>Nama Stock</th>
                  <th>Satuan</th>
                  <th>Qty 1</th>
                  <th>Qty 2</th>
                  <th>Harga Satuan</th>
                  <th>Jml. Harga</th>
                  <th>Tanggal</th>
                  <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dthasilproduksi)) : ?>
                <?php foreach ($dthasilproduksi as $key => $value) : ?>
                    <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value->nota_produksi ?></td>
                    <td><?= $value->lokasi_asal ?></td>
                    <td><?= $value->nama_kelproduksi ?></td>
                    <td><?= $value->nama_stock ?></td>
                    <td><?= $value->kode_satuan ?></td>
                    <td><?= $value->qty_1 ?></td>
                    <td><?= $value->qty_2 ?></td>
                    <td><?= "Rp " . number_format($value->harga_satuan, 0, ',', '.') ?></td>
                    <td><?= "Rp " . number_format($value->jml_harga, 0, ',', '.') ?></td>
                    <td><?= $value->tanggal ?></td>
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
