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
    <h2 style="text-align: center;">Laporan Jurnal Umum</h2>
    <p><strong>Tanggal: </strong><?= $tglawal ?> - <?= $tglakhir ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nota</th>
                <th>Rekening</th>
                <th>B.Pembantu</th>
                <th>Nama Rekening</th>
                <th>Nama Buku Pembantu</th>
                <th>No.Ref</th>
                <th>Debet</th>
                <th>Kredit</th>
                <th>Tgl.Nota</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($laporan)) : ?>
                <?php foreach ($laporan as $key => $value) : ?>
                    <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value->tanggal ?></td>
                    <td><?= $value->nota ?></td>
                    <td><?= $value->rekening ?></td>
                    <td><?= $value->b_pembantu ?></td>
                    <td><?= $value->nama_rekening ?></td>
                    <td><?= $value->nama_bpembantu ?></td>
                    <td><?= $value->no_ref ?></td>
                    <td><?= "Rp " . number_format($value->debet, 0, ',', '.') ?></td>
                    <td><?= "Rp " . number_format($value->kredit, 0, ',', '.') ?></td>
                    <td><?= $value->tgl_nota ?></td>
                    <td><?= $value->keterangan ?></td>
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
                  <th colspan="11" style="text-align: right;">Total Debet:</th>
                  <th><?= "Rp " . number_format($total_debet, 0, ',', '.') ?></th>
                  <th colspan="3"></th>
              </tr>
              <tr>
                  <th colspan="11" style="text-align: right;">Total Kredit:</th>
                  <th><?= "Rp " . number_format($total_kredit, 0, ',', '.') ?></th>
                  <th colspan="3"></th>
              </tr>
        </tfoot>
    </table>
</body>
</html>
