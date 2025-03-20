<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
    <a href="<?= site_url('setup_persediaan/lokasi') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <div class="section-body">
    <!-- HALAMAN DINAMIS -->
    <div class="card">
      <div class="card-header">
        <h4>Setup Lokasi</h4>
      </div>
      <div class="card-body">
        <form method="post" action="<?= site_url('setup_persediaan/lokasi') ?> ">
          <?= csrf_field() ?>


          <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" name="kode_lokasi" placeholder="Kode Lokasi" required>
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama_lokasi" placeholder="Nama Lokasi" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan Data</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </div>
      </div>
      </form>
    </div>
  </div>

  </div>
</section>

<?= $this->endSection(); ?>