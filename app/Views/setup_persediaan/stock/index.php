<?= $this->extend("layout/backend") ?>;

<?= $this->section("content") ?>
<title>Akuntansi Eureeka &mdash; Setup Stock </title>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<section class="section">
  <div class="section-header">
    <!-- <h1>APA INI</h1> -->
    <a href="<?= site_url('setup_persediaan/stock/new') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
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
        <h4>Setup Stock</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table border="2px" class="tablet able-striped table-md display nowrap compact" id="myTable" style="border-color: #009548; border-width: 4px; border-style: solid;">
            <thead>
              <tr style="background-color: #009548; color: white;">
                <th>#</th>
                <th>Nama Lokasi</th>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Group</th>
                <th>Kelompok</th>
                <th>Supplier</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Jml Harga</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- TEMPAT FOREACH -->
              <?php foreach ($dtstock as $key => $value) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $value->nama_lokasi ?></td>
                  <td><?= $value->kode ?></td>
                  <td><?= $value->nama_barang ?></td>
                  <td><?= $value->nama_group ?></td>
                  <td><?= $value->nama_kelompok ?></td>
                  <td><?= $value->nama_setupsupplier ?></td>
                  <td><?= $value->jumlah ?></td>
                  <td><?= $value->kode_satuan ?></td>
                  <td><?= $value->jml_harga ?></td>
                  <td><?= $value->tanggal ?></td>


                  <td class="text-center">
                    <!-- Tombol Edit Data -->
                    <a href="<?= site_url('setup_persediaan/stock/' . $value->id_stock) .  '/edit' ?>"><i class="fas fa-pencil-alt btn-small"></i> Edit</a>
                    <!-- Tombol Hapus Data -->
                    <form action="<?= site_url('setup_persediaan/stock/' . $value->id_stock) ?>" method="post" id="del-<?= $value->id_stock ?>" class="d-inline">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <a href="#" data-confirm="Hapus Data....?" data-confirm-yes="hapus(<?= $value->id_stock ?>)"><i class="fas fa-trash"></i> Hapus</a>
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