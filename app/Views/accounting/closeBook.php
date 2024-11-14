<?= $this->extend('layout/backend') ?>
<?= $this->section('content') ?>

<div class="section-header bg-white p-4 rounded shadow" style="border: 1px solid #e0e0e0;">
    <h1 class="mb-0" style="color: #333; font-weight: 600;">Tutup Buku</h1>
</div>

<div class="section-body mt-3">
    <!-- Menampilkan pesan sukses atau error -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success p-2">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger p-2">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('accounting/closeBook/closePeriod') ?>">
        <?= csrf_field() ?>
        
        <div class="form-group">
            <label for="start_date">Periode Mulai</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="end_date">Periode Akhir</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-danger mt-3">Tutup Buku</button>
    </form>
</div>

<?= $this->endSection() ?>
