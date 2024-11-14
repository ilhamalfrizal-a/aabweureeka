<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
     <a href="<?=site_url('stock')?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <div class="section-body">
  <!-- HALAMAN DINAMIS -->
  <div class="card">
    <div class="card-header">
                    <h4>Simple Table</h4>
    </div>
        <div class="card-body">
            <form method="post" action="<?=site_url('stock') ?> ">
            <?= csrf_field() ?>

            <div class="form-group">
                <label>Nama Lokasi</label>
                <select class="form-control" name="id_lokasi">
                    <option value="" hidden></option>
                    <?php foreach ($dtlokasi as $key => $value) : ?>
                        <option value="<?= $value->id_lokasi ?>"><?= $value->nama_lokasi ?>"></option>
                    <?php endforeach; ?>    
                </select>    
            </div>
            <div class="form-group">
                <label>Jumlah </label>
                <input type="text" class="form-control" name="satuan_stock" placeholder="Jumlah" required>
            </div>
            <div class="form-group">
                <label>Satuan</label>
                <input type="text" class="form-control" name="satuan" placeholder="Satuan" required>
            </div>
            <div class="form-group">
                <label>Jumlah Harga</label>
                <input type="text" class="form-control" name="jml_harga" placeholder="Jumlah Harga" required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>
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