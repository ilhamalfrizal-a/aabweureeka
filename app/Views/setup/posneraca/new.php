<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
    <a href="<?= site_url('setup/posneraca') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>

  <div class="section-body">
    <!-- HALAMAN DINAMIS -->
    <div class="card">
      <div class="card-header">
        <h4>Simple Table</h4>
      </div>
      <div class="card-body">
        <?php if (session()->getFlashdata('errors')) : ?>
          <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
              <p><?= esc($error) ?></p>
            <?php endforeach ?>
          </div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('setup/posneraca') ?> ">
          <?= csrf_field() ?>


          <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" name="kode_posneraca" placeholder="Kode" required>
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama_posneraca" placeholder="Nama" style="text-transform: uppercase;" required>
          </div>

          <div class="form-group">
            <label>Klasifikasi</label>
            <select class="form-control" name="id_klasifikasi" required>
              <option value="" hidden>-- Pilih Klasifikasi --</option>
              <?php foreach ($dtklasifikasi as $key => $value) : ?>
                <option value="<?= esc($value->id_klasifikasi) ?>" <?= old('id_klasifikasi') == $value->id_klasifikasi ? 'selected' : '' ?>>
                  <?= esc($value->nama_klasifikasi) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Posisi</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="debet" name="posisi_posneraca" value="debet" required>
              <label class="form-check-label" for="debet">Debet</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="kredit" name="posisi_posneraca" value="kredit" required>
              <label class="form-check-label" for="kredit">Kredit</label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan Data</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  </div>
</section>

<?= $this->endSection(); ?>