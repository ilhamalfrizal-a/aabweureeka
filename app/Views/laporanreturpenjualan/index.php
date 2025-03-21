<?= $this->extend("layout/backend") ?>

<?= $this->section("content") ?>
<title>Akuntansi Eureeka &mdash; Laporan Retur Penjualan</title>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <h1>Laporan Retur Penjualan</h1>
  </div>

  <!-- Tombol Print All -->
  <div class="section-body">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <a href="<?= base_url('LaporanReturPenjualan/printPDF?tglawal=' . $tglawal . '&tglakhir=' . $tglakhir . '&salesman=' . $salesman . '&lokasi=' . $lokasi) ?>" class="btn btn-success" target="_blank">
            <i class="fas fa-print"></i> Cetak PDF
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Menampilkan Pesan Sukses -->
  <?php if (session()->getFlashdata('Sukses')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        <?= session()->getFlashdata('Sukses') ?>
      </div>
    </div>
  <?php endif; ?>

  <!-- Tabel Data -->
  <div class="section-body">
    <div class="card-body">
      <form method="GET" action="<?= base_url('LaporanReturPenjualan') ?>">
        <div class="row">
          <div class="col-md-3">
            <label for="tglawal">Tanggal Awal</label>
            <input type="date" name="tglawal" class="form-control" value="<?= $tglawal ?>">
          </div>
          <div class="col-md-3">
            <label for="tglakhir">Tanggal Akhir</label>
            <input type="date" name="tglakhir" class="form-control" value="<?= $tglakhir ?>">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-3">
            <button type="submit" class="btn btn-primary mt-4">Filter</button>
          </div>
        </div>
      </form>
    </div>
  </div>

      <div class="card-body">
        
        <div class="table-responsive">
          <table border="2px" class="tablet able-striped table-md" id="myTable" style="border-color: #009548; border-width: 4px; border-style: solid;">
            <thead>
              <tr style="background-color: #009548; color: white;">
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nota</th>
                  <th>Pelanggan</th>
                  <th>Salesman</th>
                  <th>Lokasi</th>
                  <th>Nama Stock</th>
                  <th>Satuan</th>
                  <th>Qty 1</th>
                  <th>Qty 2</th>
                  <th>Harga</th>
                  <th>Jml. Harga</th>
                  <th>Disc.1</th>
                  <th>Disc.2</th>
                  <th>Total</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
              <!-- Iterasi Data -->
              <?php foreach ($dtreturpenjualan as $key => $value) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value->tanggal ?></td>
                    <td><?= $value->nota ?></td>
                    <td><?= $value->nama_pelanggan ?></td>
                    <td><?= $value->nama_setupsalesman ?></td>
                    <td><?= $value->lokasi_asal ?></td>
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
            </tbody>
              <tfoot>
              <tr>
                <th colspan="2" style="text-align: right;">Jml. Harga:</th>
                <th><?= "Rp " . number_format($jml_harga, 0, ',', '.') ?></th>
                <th colspan="2" style="text-align: right;">Sub Total:</th>
                <th><?= "Rp " . number_format($subtotal, 0, ',', '.') ?></th>
                <th colspan="2" style="text-align: right;">Discount Cash:</th>
                <th><?= "Rp " . number_format($discount_cash, 0, ',', '.') ?></th>
                <th colspan="2" style="text-align: right;">DPP:</th>
                <th><?= "Rp " . number_format($dpp, 0, ',', '.') ?></th>
                <th colspan="2" style="text-align: right;">PPN:</th>
                <th><?= "Rp " . number_format($ppn, 0, ',', '.') ?></th>
              </tr>
                <tr>
                <th colspan="2" style="text-align: right;">Total:</th>
                <th><?= "Rp " . number_format($total, 0, ',', '.') ?></th>
                <th colspan="2" style="text-align: right;">HPP:</th>
                <th><?= "Rp " . number_format($hpp, 0, ',', '.') ?></th>
                <th colspan="2" style="text-align: right;">Laba:</th>
                <th><?= "Rp " . number_format($laba, 0, ',', '.') ?></th>
              </tr>
              </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>
