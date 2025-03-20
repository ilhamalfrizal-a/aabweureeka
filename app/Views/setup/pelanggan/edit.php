<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>

<section class="section">
    <div class="section-header">
        <a href="<?= site_url('setup/pelanggan') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
    </div>

    <div class="section-body">
        <!-- HALAMAN DINAMIS -->
        <div class="card">
            <div class="card-header">
                <h4>Edit Pelanggan</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= site_url('setup/pelanggan/' . $dtsetuppelanggan->id_pelanggan) ?>">
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control" name="kode_pelanggan" value="<?= isset($dtsetuppelanggan->kode_pelanggan) ? $dtsetuppelanggan->kode_pelanggan : '' ?>" placeholder="Kode" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_pelanggan" value="<?= esc($dtsetuppelanggan->nama_pelanggan) ?>" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat_pelanggan" value="<?= esc($dtsetuppelanggan->alamat_pelanggan) ?>" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Kota</label>
                        <input type="text" class="form-control" name="kota_pelanggan" value="<?= esc($dtsetuppelanggan->kota_pelanggan) ?>" placeholder="Kota" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telp_pelanggan" value="<?= esc($dtsetuppelanggan->telp_pelanggan) ?>" placeholder="Telepon" required>
                    </div>
                    <div class="form-group">
                        <label>Plafond</label>
                        <input type="text" class="form-control" name="plafond" value="<?= esc($dtsetuppelanggan->plafond) ?>" placeholder="Plafond" required>
                    </div>
                    <div class="form-group">
                        <label>NPWP</label>
                        <input type="text" class="form-control" name="npwp" value="<?= esc($dtsetuppelanggan->npwp) ?>" placeholder="NPWP" required>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" class="form-control" name="class_pelanggan" value="<?= esc($dtsetuppelanggan->class_pelanggan) ?>" placeholder="Class" required>
                    </div>
                    <div class="form-group">
                        <label>Tipe</label>
                        <select type="text" class="form-control" name="tipe" required>
                            <option value="Exclude" <?= $dtsetuppelanggan->tipe == 'Exclude' ? 'selected' : '' ?>>Exclude</option>
                            <option value="Include" <?= $dtsetuppelanggan->tipe == 'Include' ? 'selected' : '' ?>>Include</option>
                            <option value="Non PPN" <?= $dtsetuppelanggan->tipe == 'Non PPN' ? 'selected' : '' ?>>Non PPN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="<?= esc($dtsetuppelanggan->tanggal) ?>" placeholder="Tanggal" required>
                    </div>
                    <div class="form-group">
                        <label>Saldo</label>
                        <input type="text" class="form-control" name="saldo" value="<?= esc($dtsetuppelanggan->saldo) ?>" placeholder="Saldo" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update Data</button>
                        <a href="<?= site_url('setuppelanggan') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection(); ?>