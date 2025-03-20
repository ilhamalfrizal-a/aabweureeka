<?= $this->extend("layout/backend") ?>

<?= $this->section("content") ?>

<section class="section">
    <div class="section-header">
        <!-- <h1>APA INI</h1> -->
        <a href="<?= site_url('setup_persediaan/harga') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
    </div>

    <div class="section-body">
        <!-- HALAMAN DINAMIS -->
        <div class="card">
            <div class="card-header">
                <h4>Setup Harga</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= site_url('setup_persediaan/harga') ?>">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control" name="kode_harga" placeholder="Kode" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual (EXC)</label>
                        <input type="text" class="form-control" name="harga_jualexc" placeholder="Harga Jual (EXC)" oninput="formatHarga(this)" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual (INC)</label>
                        <input type="text" class="form-control" name="harga_jualinc" placeholder="Harga Jual (INC)" oninput="formatHarga(this)" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="text" class="form-control" name="harga_beli" placeholder="Harga Beli" oninput="formatHarga(this)" required>
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