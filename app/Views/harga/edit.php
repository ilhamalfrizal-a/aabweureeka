<?= $this->extend("layout/backend") ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <a href="<?= site_url('harga') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <div class="section-body">
    <!-- HALAMAN DINAMIS -->
    <div class="card">
      <div class="card-header">
        <h4>Edit Harga</h4>
      </div>
      <div class="card-body">
        <!-- Form to Edit Harga Data -->
        <form method="post" action="<?= site_url('harga/' . $dtharga->id_harga) ?>">
        <input type="hidden" name="_method" value="PUT">
          <?= csrf_field() ?>

          <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" name="kode_harga" value="<?= old('kode_harga', $dtharga->kode_harga) ?>" placeholder="Kode" required>
          </div>

          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama_barang" value="<?= old('nama_barang', $dtharga->nama_barang) ?>" placeholder="Nama Barang" required>
          </div>

          <div class="form-group">
            <label>Harga Jual (EXC)</label>
            <input type="text" class="form-control" name="harga_jualexc" value="<?= old('harga_jualexc', number_format(floatval($dtharga->harga_jualexc), 0, ',', '.')) ?>" placeholder="Harga Jual (EXC)" oninput="formatHarga(this)" required>
          </div>

          <div class="form-group">
            <label>Harga Jual (INC)</label>
            <input type="text" class="form-control" name="harga_jualinc" value="<?= old('harga_jualinc', number_format(floatval($dtharga->harga_jualinc), 0, ',', '.')) ?>" placeholder="Harga Jual (INC)" oninput="formatHarga(this)" required>
          </div>

          <div class="form-group">
            <label>Harga Beli</label>
            <input type="text" class="form-control" name="harga_beli" value="<?= old('harga_beli', number_format(floatval($dtharga->harga_beli), 0, ',', '.')) ?>" placeholder="Harga Beli" oninput="formatHarga(this)" required>
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
// Fungsi untuk memformat angka ke dalam format Rupiah
function formatHarga(input) {
    let value = input.value.replace(/\./g, '').replace(',', '.');
    let formattedValue = formatRupiah(value);
    input.value = formattedValue;
}

// Fungsi untuk format angka menjadi Rupiah
function formatRupiah(angka) {
    let numberString = angka.replace(/\D/g, ''); // Hapus semua karakter yang bukan angka
    let formattedNumber = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Format menjadi ribuan
    return formattedNumber ? 'Rp ' + formattedNumber : ''; // Tambahkan simbol "Rp"
}
</script>

<?= $this->endSection(); ?>
