<?= $this->extend("layout/backend") ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <a href="<?= site_url('setup_persediaan/stock') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Setup Stock</h4>
      </div>
      <div class="card-body">
        <form method="post" action="<?= site_url('setup_persediaan/stock/' . $dtstock->id_stock) ?>">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="PUT">

          <div class="form-group">
            <label>Nama Lokasi</label>
            <select class="form-control" name="id_lokasi" required>
              <option value="" hidden>--Pilih Lokasi--</option>
              <?php foreach ($dtlokasi as $lokasi) : ?>
                <option value="<?= $lokasi->id_lokasi ?>" <?= $lokasi->id_lokasi == $dtstock->id_lokasi ? 'selected' : '' ?>>
                  <?= $lokasi->nama_lokasi ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" name="kode" value="<?= old('kode', $dtstock->kode) ?>" required>
          </div>

          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" value="<?= old('nama_barang', $dtstock->nama_barang) ?>" required>
          </div>

          <div class="form-group">
            <label>Group</label>
            <select class="form-control" name="id_group" required>
              <option value="" hidden>--Pilih Group--</option>
              <?php foreach ($dtgroup as $group) : ?>
                <option value="<?= $group->id_group ?>" <?= $group->id_group == $dtstock->id_group ? 'selected' : '' ?>>
                  <?= $group->kode_group . ' - ' . $group->nama_group ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Kelompok</label>
            <select class="form-control" name="id_kelompok" required>
              <option value="" hidden>--Pilih Kelompok--</option>
              <?php foreach ($dtkelompok as $kelompok) : ?>
                <option value="<?= $kelompok->id_kelompok ?>" <?= $kelompok->id_kelompok == $dtstock->id_kelompok ? 'selected' : '' ?>>
                  <?= $kelompok->kode_kelompok . ' - ' . $kelompok->nama_kelompok ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Jumlah</label>
            <input type="text" class="form-control" name="satuan_stock" value="<?= old('satuan_stock', $dtstock->satuan_stock) ?>" required>
          </div>

          <div class="form-group">
            <label>Satuan</label>
            <input type="text" class="form-control" name="satuan" value="<?= old('satuan', $dtstock->satuan) ?>" required>
          </div>

          <div class="form-group">
            <label>Supplier</label>
            <select class="form-control" name="id_setupsupplier" required>
              <option value="" hidden>--Pilih Supplier--</option>
              <?php foreach ($dtsupplier as $supplier) : ?>
                <option value="<?= $supplier->id_setupsupplier ?>" <?= $supplier->id_setupsupplier == $dtstock->id_setupsupplier ? 'selected' : '' ?>>
                  <?= $supplier->kode . ' - ' . $supplier->nama ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Jumlah Harga</label>
            <input type="text" class="form-control" id="jml_harga" name="jml_harga" value="<?= old('jml_harga', $dtstock->jml_harga) ?>" oninput="formatHarga(this)" required>
          </div>

          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="<?= old('tanggal', $dtstock->tanggal) ?>" required>
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
  function formatHarga(input) {
    let value = input.value.replace(/\./g, '').replace(',', '.');
    let formattedValue = formatRupiah(value);
    input.value = formattedValue;
  }

  function formatRupiah(angka) {
    let numberString = angka.replace(/\D/g, '');
    let formattedNumber = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    return formattedNumber ? 'Rp ' + formattedNumber : '';
  }
</script>

<?= $this->endSection(); ?>