<?= $this->extend("layout/backend") ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <a href="<?= site_url('lunassalesman') ?>" class="btn btn-primary">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Edit Pelunasan Piutang Salesman</h4>
      </div>
      <div class="card-body">
        <form method="post" action="<?= site_url('lunassalesman/' . $dtlunassalesman->id_lunashusalesman) ?>">
          <?= csrf_field() ?>
          <!-- Hidden field for method spoofing -->
          <input type="hidden" name="_method" value="PUT">

          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="<?= esc($dtlunassalesman->tanggal) ?>" required>
          </div>
          
          <div class="form-group">
            <label>Nota</label>
            <input type="text" class="form-control" name="nota" value="<?= esc($dtlunassalesman->nota) ?>" required>
          </div>
          
          <div class="form-group">
            <label>Salesman</label>
            <select class="form-control" name="id_setupsalesman" required>
              <option value="" hidden>-- Pilih Salesman --</option>
              <?php foreach ($dtsetupsalesman as $key => $value) : ?>
                <option value="<?= esc($value->id_setupsalesman) ?>" <?= $dtlunassalesman->id_setupsalesman == $value->id_setupsalesman ? 'selected' : '' ?>>
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
                <option value="<?= esc($value->id_setupbank) ?>" <?= $dtlunassalesman->id_setupbank == $value->id_setupbank ? 'selected' : '' ?>>
                  <?= esc($value->nama_setupbank) ?>
                </option>
              <?php endforeach; ?>    
            </select>    
          </div>

          <div class="form-group">
            <label>Saldo</label>
            <input type="text" class="form-control" name="saldo" value="<?= number_format(floatval(old('saldo', $dtlunassalesman->saldo) ?: 0), 0, ',', '.') ?>">
          </div>

          <div class="form-group">
            <label>Nilai Pelunasan</label>
            <input type="text" class="form-control" name="nilai_pelunasan" value="<?= number_format(floatval(old('nilai_pelunasan', $dtlunassalesman->nilai_pelunasan) ?: 0), 0, ',', '.') ?>">
          </div>

          <div class="form-group">
            <label>Discount</label>
            <input type="number" class="form-control" name="diskon" value="<?= esc($dtlunassalesman->diskon) ?>" required>
          </div>

          <div class="form-group">
            <label>PDPT.Lain-lain</label>
            <input type="text" class="form-control" name="pdpt" value="<?= esc($dtlunassalesman->pdpt) ?>" required>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success">Update Data</button>
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
