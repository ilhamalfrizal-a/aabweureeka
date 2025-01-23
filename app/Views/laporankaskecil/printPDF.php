<!DOCTYPE html>
<html>
<head>
    <style>
        /* Styling umum untuk tabel */
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

        /* Styling khusus untuk tampilan cetak */
        @media print {
            body {
                font-family: Arial, sans-serif;
            }
            h2 {
                text-align: center;
                font-size: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            td, th {
                padding: 8px;
                border: 1px solid black;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h2>Laporan Pengeluaran Kas Kecil</h2>
    <p><strong>Tanggal: </strong><?= isset($filter['tglawal']) ? $filter['tglawal'] : 'N/A' ?> - <?= isset($filter['tglakhir']) ? $filter['tglakhir'] : 'N/A' ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nota</th>
                <th>Kas dan Setara Kas</th>
                <th>Kelompok Produksi</th>
                <th>Rekening</th>
                <th>B.Pembantu</th>
                <th>Nama Rekening</th>
                <th>Nama Buku Pembantu</th>
                <th>Mutasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dtkaskecil)) : ?>
                <?php foreach ($dtkaskecil as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= date('d-m-Y', strtotime($value->tanggal)) ?></td>
                        <td><?= $value->nota ?></td>
                        <td><?= $value->kas_interface ?></td>
                        <td><?= $value->nama_kelproduksi ?></td>
                        <td><?= $value->rekening ?></td>
                        <td><?= $value->b_pembantu ?></td>
                        <td><?= $value->nama_rekening ?></td>
                        <td><?= $value->nama_bpembantu ?></td>
                        <td><?= "Rp " . number_format($value->rp, 0, ',', '.') ?></td>
                        <td><?= $value->keterangan ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="11" style="text-align: center;">Tidak ada data untuk ditampilkan</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="9" class="text-right">Total Mutasi:</th>
                <th><?= "Rp " . number_format($totalMutasi ?? 0, 0, ',', '.') ?></th>
            </tr>
        </tfoot>
    </table>

    <!-- Menambahkan tombol untuk cetak -->
    <div class="no-print" style="text-align: center; margin-top: 20px;">
        <button onclick="window.print()">Print</button>
    </div>
</body>
</html>
