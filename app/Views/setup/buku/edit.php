<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>
<title>Setup Salesman &mdash; Akuntansi Eureeka</title>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<section class="section">
    <div class="section-header">
        <!-- <h1>APA INI</h1> -->
        <a href="<?= site_url('setup/buku') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
    </div>

    <div class="section-body">
        <!-- HALAMAN DINAMIS -->
        <div class="card">
            <div class="card-header">
                <h4>Setup Buku Besar</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= site_url('setup/buku/' . $dtsetupbuku->id_setupbuku) ?>" onsubmit="return validateForm()">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">


                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control" name="kode_setupbuku" value="<?= $dtsetupbuku->kode_setupbuku ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_setupbuku" value="<?= $dtsetupbuku->nama_setupbuku ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Pos Neraca</label>
                        <select type="text" class="form-control" name="id_posneraca" required>
                            <option value="" selected disabled>Pilih</option>
                            <?php foreach ($dtposneraca as $key => $value) : ?>
                                <option value="<?= esc($value->id_posneraca) ?>" <?= $dtsetupbuku->id_posneraca == $value->id_posneraca ? 'selected' : '' ?>>
                                    <?= esc($value->nama_posneraca) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Saldo</label>
                        <input type="text" class="form-control" name="saldo_setupbuku" value="<?= $dtsetupbuku->saldo_setupbuku ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Awal Saldo</label>
                        <input type="date" class="form-control" name="tanggal_awal_saldo" value="<?= $dtsetupbuku->tanggal_awal_saldo ?>" required>
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
    function validateForm() {
        const posNeraca = document.querySelector('select[name="id_posneraca"]');
        if (posNeraca.value === "") {
            alert("Silakan pilih Pos Neraca yang valid.");
            return false;
        }
        return true;
    }
</script>

<?= $this->endSection(); ?>