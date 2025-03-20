<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>

<section class="section">
    <div class="section-header">
        <!-- <h1>APA INI</h1> -->
        <a href="<?= site_url('setup_persediaan/stock') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
    </div>

    <div class="section-body">
        <!-- HALAMAN DINAMIS -->
        <div class="card">
            <div class="card-header">
                <h4>Setup Stock</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= site_url('setup_persediaan/stock') ?> ">
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
                        <label>Satuan 1</label>
                        <select class="form-control" name="id_satuan" required>
                            <option value="" hidden>--Pilih Satuan--</option>
                            <?php foreach ($dtsatuan as $satuan) : ?>
                                <option value="<?= $satuan->id_satuan ?>"><?= $satuan->kode_satuan . ' - ' . $satuan->nama_satuan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Faktor Konversi </label>
                        <input type="text" class="form-control" name="conv_factor" placeholder="Faktor Konversi" required>
                    </div>
                    <div class="form-group">
                        <label>Satuan 2</label>
                        <select class="form-control" name="id_satuan2" required>
                            <option value="" hidden>--Pilih Satuan--</option>
                            <?php foreach ($dtsatuan as $satuan) : ?>
                                <option value="<?= $satuan->id_satuan ?>"><?= $satuan->kode_satuan . ' - ' . $satuan->nama_satuan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Stock Minimal </label>
                        <input type="text" class="form-control" name="min_stock" placeholder="Stock Minimal" required>
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