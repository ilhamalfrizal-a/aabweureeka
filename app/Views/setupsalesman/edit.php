<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
     <a href="<?= site_url('setupsalesman') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <div class="section-body">
  <!-- HALAMAN DINAMIS -->
  <div class="card">
    <div class="card-header">
        <h4>Edit Salesman</h4>
    </div>
    <div class="card-body">
        <form method="post" action="<?= site_url('setupsalesman/' . $dtsetupsalesman->id_setupsalesman) ?>">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field() ?>

        <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" name="kode_setupsalesman" placeholder="Kode" value="<?= isset($dtsetupsalesman->kode_setupsalesman) ? $dtsetupsalesman->kode_setupsalesman : old('kode_setupsalesman') ?>" readonly>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama_setupsalesman" value="<?= esc($dtsetupsalesman->nama_setupsalesman) ?>" placeholder="Nama" required>
        </div>
        <div class="form-group">
            <label>Lokasi</label>
            <select type="text" class="form-control" name="lokasi_setupsalesman" required>
                <option value="Lokasi 1" <?= $dtsetupsalesman->lokasi_setupsalesman == 'Lokasi 1' ? 'selected' : '' ?>>Lokasi 1</option>
                <option value="Lokasi 2" <?= $dtsetupsalesman->lokasi_setupsalesman == 'Lokasi 2' ? 'selected' : '' ?>>Lokasi 2</option>
                <option value="Lokasi 3" <?= $dtsetupsalesman->lokasi_setupsalesman == 'Lokasi 3' ? 'selected' : '' ?>>Lokasi 3</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" name="tanggal_setupsalesman" value="<?= esc($dtsetupsalesman->tanggal_setupsalesman) ?>" placeholder="Tanggal" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a href="<?= site_url('setupsalesman') ?>" class="btn btn-danger">Batal</a>
        </div>
    </form>
    </div>
  </div>

  </div>
</section>



<?= $this->endSection(); ?>
