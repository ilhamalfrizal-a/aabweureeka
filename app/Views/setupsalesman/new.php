<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
     <a href="<?=site_url('setupsalesman')?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <div class="section-body">
  <!-- HALAMAN DINAMIS -->
  <div class="card">
    <div class="card-header">
                    <h4>Setup Salesman</h4>
    </div>
        <div class="card-body">
            <form method="post" action="<?=site_url('setupsalesman') ?> ">
            <?= csrf_field() ?>


            <div class="form-group">
                <label>Kode</label>
                <input type="text" class="form-control" name="kode_setupsalesman" placeholder="Kode" value="<?= old('kode_setupsalesman') ?>" readonly>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_setupsalesman" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <select type="text" class="form-control" name="lokasi_setupsalesman" placeholder="Lokasi" required>
                    <option value="Lokasi 1">Lokasi 1</option>
                    <option value="Lokasi 2">Lokasi 2</option>
                    <option value="Lokasi 3">Lokasi 3</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal_setupsalesman" placeholder="Tanggal" required>
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