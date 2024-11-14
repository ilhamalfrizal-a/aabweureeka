<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>
<title>Akuntansi Eureeka &mdash; Pemakaian Bahan</title>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
     <a href="<?=site_url('pemakaianbahan/new')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
  </div>


  <!-- untuk menangkap session success dengan bawaan with -->

<?php if (session()->getFlashdata('Sukses')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        <?= session()->getFlashdata('Sukses') ?>
      </div>
    </div>
<?php endif; ?>

  <div class="section-body">
  <!-- HALAMAN DINAMIS -->
  <div class="card">
                  <div class="card-header">
                    <h4>Pemakaian Bahan</h4>
                  </div>
                  <div class="section-body">
                  <div class="card-body">
                    <div class="table-responsive">
                    <table border="2px" class="tablet able-striped table-md" id="myTable" style="border-color: #6777ef; border-width: 4px; border-style: solid;">
                      <thead>
                        <tr style="background-color: #6777ef; color: white;">
                          <th>No</th>
                          <th>Nota</th>
                          <th>Lokasi</th>
                          <th>Kelompok Produksi</th>
                          <th>Biaya Produksi</th>
                          <th>Nama Stock</th>
                          <th>Satuan</th>
                          <th>Qty 1</th>
                          <th>Qty 2</th>
                          <th>Tanggal</th>
                          <th>Action</th>
                        </tr>
                      </thead>  
                      <tbody>
                    <!-- TEMPAT FOREACH -->
                      <?php foreach ($dtpemakaianbahan as $key => $value) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value->nota_bahan ?></td>
                    <td><?= $value->lokasi_asal ?></td>
                    <td><?= $value->nama_kelproduksi ?></td>
                    <td><?= $value->nama_setupbank ?></td>
                    <td><?= $value->nama_stock ?></td>
                    <td><?= $value->kode_satuan ?></td>
                    <td><?= $value->qty_1 ?></td>
                    <td><?= $value->qty_2 ?></td>
                    <td><?= $value->tanggal ?></td>

      <td class="text-center">
        <!-- Tombol Edit Data -->
        <a href="<?= site_url('pemakaianbahan/' . $value->id_bahan) .  '/edit' ?>" class="btn btn-warning"><i class="fas fa-pencil-alt btn-small"></i> Edit</a>
        <input type="hidden" name="_method" value="PUT">
       
        

        <!-- Tombol Hapus Data -->
        <form action="<?= site_url('pemakaianbahan/' . $value->id_bahan) ?>" method="post" id="del-<?= $value->id_bahan ?>" class="d-inline">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="DELETE">
          <button class="btn btn-danger btn-small" data-confirm="Hapus Data....?" data-confirm-yes="hapus(<?= $value->id_bahan ?>)">
            <i class="fas fa-trash"></i>
          </button>
        </form>

      </td>
    </tr>
  <?php endforeach; ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
  </div>

  </div>
</section>

<?= $this->endSection(); ?>