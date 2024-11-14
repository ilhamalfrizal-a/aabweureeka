<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
     <a href="<?=site_url('setupbuku')?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <div class="section-body">
  <!-- HALAMAN DINAMIS -->
  <div class="card">
    <div class="card-header">
                    <h4>Setup Buku Besar</h4>
    </div>
        <div class="card-body">
            <form method="post" action="<?=site_url('setupbuku') ?> ">
            <?= csrf_field() ?>

            <div class="form-group">
                <label>Kode</label>
                <input type="text" class="form-control" name="kode_setupbuku" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_setupbuku" required>
            </div>
            <div class="form-group">
                <label>Pos Neraca</label>
                <select type="text" class="form-control" name="pos_neraca" required>
                    <option value="Satu">Satu</option>
                    <option value="Dua">Dua</option>
                    <option value="Tiga">Tiga</option>
                </select>
            </div>
            <div class="form-group">
                <label>Saldo</label>
                <input type="text" class="form-control" name="saldo_setupbuku" required>
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