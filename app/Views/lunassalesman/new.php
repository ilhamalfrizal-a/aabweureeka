<?= $this->extend("layout/backend") ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
     <a href="<?= site_url('lunassalesman') ?>" class="btn btn-primary">
       <i class="fas fa-arrow-left"></i> Kembali
     </a>
  </div>

  <div class="section-body">
    <!-- HALAMAN DINAMIS -->
    <div class="card">
      <div class="card-header">
        <h4>Pelunasan Piutang Salesman</h4>
      </div>
      <div class="card-body">
        <form method="post" action="<?= site_url('lunassalesman') ?>">
          <?= csrf_field() ?>

          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="<?= old('tanggal') ?>" required>
          </div>
          
          <div class="form-group">
            <label>Nota</label>
            <input type="text" class="form-control" name="nota" value="<?= old('nota') ?>" required>
          </div>
          
          <div class="form-group">
            <label>Salesman</label>
            <select class="form-control" name="id_setupsalesman" required>
              <option value="" hidden>-- Pilih Salesman --</option>
              <?php foreach ($dtsetupsalesman as $key => $value) : ?>
                <option value="<?= esc($value->id_setupsalesman) ?>" <?= old('id_setupsalesman') == $value->id_setupsalesman ? 'selected' : '' ?>>
                  <?= esc($value->nama_setupsalesman) ?>
                </option>
              <?php endforeach; ?>    
            </select>    
          </div>

          <div class="form-group">
            <label>Rekening Pelunasan</label>
            <select class="form-control" name="id_setupbank" required>
              <option value="" hidden>-- Pilih Rekening Pelunasan --</option>
              <?php foreach ($dtsetupbank as $key => $value) : ?>
                <option value="<?= esc($value->id_setupbank) ?>" <?= old('id_setupbank') == $value->id_setupbank ? 'selected' : '' ?>>
                  <?= esc($value->nama_setupbank) ?>
                </option>
              <?php endforeach; ?>    
            </select>    
          </div>

          <div class="form-group">
            <label>Saldo</label>
            <input type="text" class="form-control" name="saldo"  value="<?= number_format(old('saldo') ?: 0, 0, ',', '.') ?>" required>
          </div>

          <div class="form-group">
            <label>Nilai Pelunasan</label>
            <input type="text" class="form-control" name="nilai_pelunasan"  value="<?= number_format(old('nilai_pelunasan') ?: 0, 0, ',', '.') ?>" required>
          </div>

          <div class="form-group">
            <label>Discount</label>
            <input type="number" class="form-control" name="diskon" value="<?= old('diskon') ?>" required>
          </div>

          <div class="form-group">
            <label>PDPT.Lain-lain</label>
            <input type="text" class="form-control" name="pdpt" value="<?= old('pdpt') ?>" required>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan Data</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </div>
        </form>          
      </div>
    </div>
  </div>
</section>

<script>

// Fungsi untuk format angka ke Rupiah
function formatRupiah(angka) {
    return new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(angka);
}
</script>

<?= $this->endSection(); ?>
