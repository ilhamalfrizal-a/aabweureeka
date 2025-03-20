<?= $this->extend("layout/backend") ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <a href="<?= site_url('setup_persediaan/kelompok') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <div class="section-body">
    <!-- HALAMAN DINAMIS -->
    <div class="card">
      <div class="card-header">
        <h4>Edit Kelompok</h4>
      </div>
      <div class="card-body">
        <!-- Form to Edit Kelompok Data -->
        <form method="post" action="<?= site_url('setup_persediaan/kelompok/' . $dtkelompok->id_kelompok) ?>">
          <input type="hidden" name="_method" value="PUT">
          <?= csrf_field() ?>

          <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" name="kode_kelompok" value="<?= old('kode_kelompok', $dtkelompok->kode_kelompok) ?>" placeholder="Kode Kelompok" required>
          </div>

          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama_kelompok" value="<?= old('nama_kelompok', $dtkelompok->nama_kelompok) ?>" placeholder="Nama Kelompok" required>
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

<?= $this->endSection(); ?>