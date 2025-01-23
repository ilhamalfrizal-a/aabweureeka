<?= $this->extend("layout/backend") ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <a href="<?= site_url('setupuser') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <div class="section-body">
  <!-- HALAMAN DINAMIS -->
  <div class="card">
    <div class="card-header">
        <h4>Edit Setup User Stock Opname</h4>
    </div>
    <div class="card-body">
        <form method="post" action="<?= site_url('setupuser/' . $dtsetupuser->id_setupuser) ?>">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field() ?>

        <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" name="kode_setupuser" value="<?= esc($dtsetupuser->kode_setupuser) ?>" placeholder="Kode" required>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama_setupuser" value="<?= esc($dtsetupuser->nama_setupuser) ?>" placeholder="Nama" required>
        </div>

        <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" value="<?= esc($dtsetupuser->password) ?>" placeholder="Masukkan Password" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>
        </div>

        <div class="form-group">
            <label>Kode Aktivasi</label>
            <input type="text" class="form-control" name="kode_aktivasi" value="<?= esc($dtsetupuser->kode_aktivasi) ?>" placeholder="Masukkan Kode Aktivasi" required>
        </div>

        <div class="form-group">
            <label>Check</label>
            <select type="text" class="form-control" name="check_setupuser" required>
                <option value="Aktif" <?= $dtsetupuser->check_setupuser == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="Tidak Aktif" <?= $dtsetupuser->check_setupuser == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a href="<?= site_url('setupuser') ?>" class="btn btn-danger">Batal</a>
        </div>
    </form>          
    </div>
  </div>

  </div>
</section>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');

        // Toggle the password visibility
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>


<?= $this->endSection(); ?>
