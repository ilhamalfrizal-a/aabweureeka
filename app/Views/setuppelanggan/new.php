<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
     <a href="<?=site_url('setuppelanggan')?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <div class="section-body">
  <!-- HALAMAN DINAMIS -->
  <div class="card">
    <div class="card-header">
                    <h4>Setup Pelanggan</h4>
    </div>
        <div class="card-body">
            <form method="post" action="<?=site_url('setuppelanggan') ?> ">
            <?= csrf_field() ?>


            <div class="form-group">
                <label>Kode</label>
                <input type="text" class="form-control" name="kode_pelanggan" placeholder="Kode" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat_pelanggan" placeholder="Alamat" required>
            </div>
            <div class="form-group">
                <label>Kota</label>
                <input type="text" class="form-control" name="kota_pelanggan" placeholder="Kota" required>
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" class="form-control" name="telp_pelanggan" placeholder="Telepon" required>
            </div>
            <div class="form-group">
                <label>Plafond</label>
                <input type="text" class="form-control" name="plafond" placeholder="Plafond" required>
            </div>
            <div class="form-group">
                <label>NPWP</label>
                <input type="text" class="form-control" name="npwp" placeholder="NPWP" required>
            </div>
            <div class="form-group">
                <label>Class</label>
                <input type="text" class="form-control" name="class_pelanggan" placeholder="Class" required>
            </div>
            <div class="form-group">
                <label>Tipe</label>
                <select type="text" class="form-control" name="tipe" placeholder="Tipe" required>
                    <option value="Exclude">Exclude</option>
                    <option value="Include">Include</option>
                    <option value="Non PPN">Non PPN</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>
            </div>
            <div class="form-group">
                <label>Saldo</label>
                <input type="text" class="form-control" name="saldo" placeholder="Saldo" required>
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