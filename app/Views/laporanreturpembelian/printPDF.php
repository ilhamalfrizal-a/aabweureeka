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
    <h2 style="text-align: center;">Laporan Pembelian</h2>
    <p><strong>Tanggal: </strong><?= $tglawal ?> - <?= $tglakhir ?></p>
    

    <table>
        <thead>
            <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nota</th>
                  <th>Supplier</th>
                  <th>Nama Stock</th>
                  <th>Satuan</th>
                  <th>Qty 1</th>
                  <th>Qty 2</th>
                  <th>Harga Satuan</th>
                  <th>Jumlah Harga</th>
                  <th>Disc. 1</th>
                  <th>Disc. 2</th>
                  <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dtreturpembelian)) : ?>
                <?php foreach ($dtreturpembelian as $key => $value) : ?>
                    <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value->tanggal ?></td>
                    <td><?= $value->nota ?></td>
                    <td><?= $value->nama_supplier ?></td>
                    <td><?= $value->nama_stock ?></td>
                    <td><?= $value->kode_satuan ?></td>
                    <td><?= $value->qty_1 ?></td>
                    <td><?= $value->qty_2 ?></td>
                    <td><?= "Rp " . number_format($value->harga_satuan, 0, ',', '.') ?></td>
                    <td><?= "Rp " . number_format($value->jml_harga, 0, ',', '.') ?></td>
                    <td><?= $value->disc_1 ?></td>
                    <td><?= $value->disc_2 ?></td>
                    <td><?= "Rp " . number_format($value->total, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="13" style="text-align: center;">Tidak ada data untuk ditampilkan</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
                <tr>
                  <th colspan="12" style="text-align: right;">Subtotal:</th>
                  <th><?= "Rp " . number_format($subtotal, 0, ',', '.') ?></th>
                  <th colspan="3"></th>
                </tr>
                <tr>
                  <th colspan="12" style="text-align: right;">Grand Total:</th>
                  <th><?= "Rp " . number_format($grandtotal, 0, ',', '.') ?></th>
                  <th colspan="3"></th>
                </tr>
              </tfoot>
    </table>
</body>
</html>
