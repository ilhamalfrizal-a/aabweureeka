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
                    <h4>Setup Stock</h4>
    </div>
        <div class="card-body">
            <form method="post" action="<?=site_url('stock') ?> ">
            <?= csrf_field() ?>

            <div class="form-group">
                <label>Nama Lokasi</label>
                <select class="form-control" name="id_lokasi">
                    <option value="" hidden>--Pilih Lokasi--</option>
                    <?php foreach ($dtlokasi as $key => $value) : ?>
                        <option value="<?= $value->id_lokasi ?>"><?= $value->nama_lokasi ?></option>
                    <?php endforeach; ?>    
                </select>    
            </div>
            <div class="form-group">
                <label>Kode </label>
                <input type="text" class="form-control" name="kode" placeholder="Kode" required>
            </div>
            <div class="form-group">
                <label>Nama Barang </label>
                <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required>
            </div>

            <div class="form-group">
            <label>Group</label>
            <select class="form-control" name="id_group" required>
                <option value="" hidden>--Pilih Group--</option>
                <?php foreach ($dtgroup as $group) : ?>
                <option value="<?= $group->id_group ?>"><?= $group->kode_group . ' - ' . $group->nama_group ?></option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="form-group">
            <label>Kelompok</label>
            <select class="form-control" name="id_kelompok" required>
                <option value="" hidden>--Pilih Kelompok--</option>
                <?php foreach ($dtkelompok as $kelompok) : ?>
                <option value="<?= $kelompok->id_kelompok ?>"><?= $kelompok->kode_kelompok . ' - ' . $kelompok->nama_kelompok ?></option>
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
            <label>Supplier</label>
            <select class="form-control" name="id_setupsupplier" required>
                <option value="" hidden>--Pilih Supplier--</option>
                <?php foreach ($dtsupplier as $supplier) : ?>
                <option value="<?= $supplier->id_setupsupplier ?>"><?= $supplier->kode . ' - ' . $supplier->nama ?></option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="form-group">
                <label>Jumlah Harga</label>
                <input type="text" class="form-control" id="jml_harga" name="jml_harga" placeholder="Jumlah Harga" oninput="formatHarga(this)" required>
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