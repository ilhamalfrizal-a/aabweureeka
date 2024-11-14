<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
     <a href="<?=site_url('posneraca')?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
  </div>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        <?= session()->getFlashdata('success') ?>
      </div>
    </div>
<?php endif; ?>

  <div class="section-body">
  <!-- HALAMAN DINAMIS -->
  <div class="card">
    <div class="card-header">
                    <h4>Simple Table</h4>
    </div>
        <div class="card-body">
            <form method="post" action="<?=site_url('posneraca/'. $dtposneraca->id_posneraca) ?> ">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">


            <div class="form-group">
                <label>Kode</label>
                <input type="text" class="form-control" name="kode_posneraca" placeholder="Kode" required value="<?= $dtposneraca->id_posneraca?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_posneraca" placeholder="Nama" required value="<?= $dtposneraca->nama_posneraca?>">
            </div>
            </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Update Data</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
        </form>          
    </div>
  </div>

  </div>
</section>

<?= $this->endSection(); ?>