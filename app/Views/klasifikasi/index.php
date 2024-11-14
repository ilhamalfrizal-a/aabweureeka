<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>
<title>Akuntansi Eureeka &mdash; Klasifikasi</title>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
     <a href="<?=site_url('klasifikasi/new')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
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
                    <h4>Klasifikasi</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table border="2px" class="tablet able-striped table-md" id="myTable" style="border-color: #6777ef; border-width: 4px; border-style: solid;">
                      <thead>
                        <tr style="background-color: #6777ef; color: white;">
                          <th>No</th>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Action</th>
                        </tr>
                      </thead>  
                      <tbody>
                        <?php foreach ($dtklasifikasi as $key => $value) : ?>
                        <tr>
                          <td><?= $key+1 ?></td>
                          <td><?= $value->kode_klasifikasi ?></td>
                          <td><?= $value->nama_klasifikasi ?></td>

                          <td class="text-center">
                            <!-- Tombol Edit Data -->
                            <a href="<?= site_url('klasifikasi/edit/' . $value->id_klasifikasi) ?>" class="btn btn-warning"><i class="fas fa-pencil-alt btn-small"></i> Edit</a>
                            <!-- Tombol Hapus Data -->
                            <form action="<?= site_url('klasifikasi/'.$value->id_klasifikasi) ?>" method="post" id="del-<?=$value->id_klasifikasi?>" class="d-inline">
                              <?= csrf_field() ?>
                              <input type="hidden" name="_method" value="DELETE">
                              <button class="btn btn-danger btn-small" data-confirm="Hapus Data....?" data-confirm-yes="hapus(<?=$value->id_klasifikasi?>)"><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
                          <!-- <td><a href="#" class="btn btn-secondary">Detail</a></td> -->
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                  <!-- <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div> -->
                </div>
  </div>

  </div>
</section>

<?= $this->endSection(); ?>