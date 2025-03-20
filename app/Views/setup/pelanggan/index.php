<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>
<title>Akuntansi Eureeka &mdash; Setup Pelanggan </title>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
    <a href="<?= site_url('setup/pelanggan/new') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
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
        <h4>Setup Pelanggan</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table border="2px" class="tablet able-striped table-md" id="myTable" style="border-color: #009548; border-width: 4px; border-style: solid;">
            <thead>
              <tr style="background-color: #009548; color: white;">
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Telepon</th>
                <th>Plafond</th>
                <th>NPWP</th>
                <th>Class</th>
                <th>Tipe</th>
                <th>Tanggal</th>
                <th>Saldo</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- TEMPAT FOREACH -->
              <?php foreach ($dtsetuppelanggan as $key => $value) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $value->kode_pelanggan ?></td>
                  <td><?= $value->nama_pelanggan ?></td>
                  <td><?= $value->alamat_pelanggan ?></td>
                  <td><?= $value->kota_pelanggan ?></td>
                  <td><?= $value->telp_pelanggan ?></td>
                  <td><?= $value->plafond ?></td>
                  <td><?= $value->npwp ?></td>
                  <td><?= $value->class_pelanggan ?></td>
                  <td><?= $value->tipe ?></td>
                  <td><?= $value->tanggal ?></td>
                  <td><?= $value->saldo ?></td>

                  <td class="text-center">
                    <!-- Tombol Edit Data -->
                    <a href="<?= site_url('setuppelanggan/' . $value->id_pelanggan) .  '/edit' ?>" class="btn btn-warning"><i class="fas fa-pencil-alt btn-small"></i> Edit</a>
                    <input type="hidden" name="_method" value="PUT">
                    <!-- Tombol Hapus Data -->
                    <form action="<?= site_url('setuppelanggan/' . $value->id_pelanggan) ?>" method="post" id="del-<?= $value->id_pelanggan ?>" class="d-inline">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btn btn-danger btn-small" data-confirm="Hapus Data....?" data-confirm-yes="hapus(<?= $value->id_pelanggan ?>)"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
                  <!-- <td><a href="#" class="btn btn-secondary">Detail</a></td> -->
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