<!-- DASHBOARD SETUP -->
<li class="menu-header">Dashboard Setup</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown"><i class="fas fa-fire"></i><span>Setup</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="<?= site_url('setup/periode') ?>">Periode Akuntansi</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup/antarmuka') ?>">Interface</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup/klasifikasi') ?>">Klasifikasi</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup/posneraca') ?>">Pos Laporan Keuangan</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup/buku') ?>">Buku Besar</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup/salesman') ?>">Salesman</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup/pelanggan') ?>">Pelanggan</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setuppiutang') ?>">Piutang lain-lain</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setupsupplier') ?>">Supplier</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setupbiaya') ?>">Biaya</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('kelompokproduksi') ?>">Kelompok Produksi</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setupbank') ?>">Bank</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setupuser') ?>">User Stock Opname</a></li>
  </ul>
</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown"><i class="fas fa-fire"></i><span>Setup Persediaan</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="<?= site_url('setup_persediaan/satuan') ?>">Satuan</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup_persediaan/lokasi') ?>">Lokasi</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup_persediaan/group') ?>">Group</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup_persediaan/kelompok') ?>">Kelompok</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup_persediaan/stock') ?>">Stock</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('setup_persediaan/harga') ?>">Harga Jual/Beli</a></li>
  </ul>
</li>

<!-- DASHBOARD TRANSAKSI -->
<li class="menu-header text-dark">Dashboard Transaksi</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Transaksi</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="<?= site_url('pembelian') ?>">Pembelian</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('returpembelian') ?>">Retur Pembelian</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('penjualan') ?>">Penjualan</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('returpenjualan') ?>">Retur Penjualan</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('penyesuaianstock') ?>">Penyesuaian Stock</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('pindahlokasi') ?>">Pindah Lokasi</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('bahansablon') ?>">Bahan Di Sablon</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('hasilsablon') ?>">Hasil Sablon</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('pemakaianbahan') ?>">Pemakaian Bahan</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('hasilproduksi') ?>">Hasil Produksi</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('tutangusaha') ?>">Pelunasan Piutang Usaha</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('lunassalesman') ?>">Pelunasan Piutang Sales</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('pelunasanhutang') ?>">Pelunasan Hutang</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('mutasikasbank') ?>">Mutasi Kas dan Bank</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('jurnalumum') ?>">Jurnal Umum</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('kaskecil') ?>">Pengeluaran Kas Kecil</a></li>
    <!-- <li><a class="nav-link text-dark" href="<?= site_url('transaksi/posting') ?>">Posting</a></li>  -->
    <li><a class="nav-link text-dark" href="<?= site_url('close-period') ?>">Tutup Buku</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('stockopname') ?>">Stock Opname</a></li>
  </ul>
</li>

<!-- DASHBOARD LAPORAN -->
<li class="menu-header">Dashboard Laporan</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Laporan</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="<?= site_url('laporanpembelian') ?>">Pembelian</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanreturpembelian') ?>">Retur Pembelian</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanpenjualan') ?>">Penjualan</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanPenjualanP') ?>">Penjualan Per Salesman Per Pelanggan Per Barang</a></li>
    <li><a class="nav-link text-dark" href="layout-top-navigation.html">Penjualan Per Salesman Per Pelanggan Per Barang (Tahun)</a></li>
    <li><a class="nav-link text-dark" href="layout-top-navigation.html">Penjualan Per Barang (Tahun)</a></li>
    <li><a class="nav-link text-dark" href="layout-top-navigation.html">Penjualan Per Salesman</a></li>
    <li><a class="nav-link text-dark" href="layout-top-navigation.html">Penjualan Per Salesman (Tahun)</a></li>
    <li><a class="nav-link text-dark" href="layout-top-navigation.html">Penjualan Per Pelanggan</a></li>
    <li><a class="nav-link text-dark" href="layout-top-navigation.html">Penjualan Per Pelanggan (Tahun)</a></li>
    <li><a class="nav-link text-dark" href="layout-top-navigation.html">Penjualan Per Supplier Per Barang</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanreturpenjualan') ?>">ReturPenjualan</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanpenyesuaianstock') ?>">Penyesuaian Stock</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanpindahlokasi') ?>">Pindah Lokasi</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanbahansablon') ?>">Bahan di Sablon</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanhasilsablon') ?>">Hasil Sablon</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanpemakaianbahan') ?>">Pemakaian Bahan</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanhasilproduksi') ?>">Hasil Produksi</a></li>
    <li><a class="nav-link text-dark" href="layout-top-navigation.html">Kas Keluar</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporankaskecil') ?>">Pengeluaran Kas Kecil</a></li>
    <li><a class="nav-link text-dark" href="<?= site_url('laporanjurnalumum') ?>">Jurnal Umum</a></li>
  </ul>
</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown"><i class="fas fa-fire"></i><span>Bank</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="index-0.html">Kartu Bank</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Bank</a></li>
  </ul>
</li>

<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown"><i class="fas fa-fire"></i><span>Piutang Usaha</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="index-0.html">Kartu Piutang Usaha</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Piutang Usaha</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Piutang Usaha Per Nota</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Laporan Umur Piutang</a></li>
  </ul>
</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown"><i class="fas fa-fire"></i><span>Piutang Salesman</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="index-0.html">Kartu Piutang Salesman</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Piutang Salesman</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Piutang Salesman Per Nota</a></li>
  </ul>
</li>

<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown"><i class="fas fa-fire"></i><span>Supplier</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="index-0.html">Kartu Hutang Usaha</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Hutang Usaha</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Hutang Per Nota</a></li>
  </ul>
</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown"><i class="fas fa-fire"></i><span>Persedian</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="index-0.html">Kartu Stock</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Stock (Rp)</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Stock (Qty)</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Stock Akhir Kosong</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Stock Akhir Minimal</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Stock Opname</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Perbandingan Stock Opname</a></li>
  </ul>
</li>

<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown"><i class="fas fa-fire"></i><span>Keuangan</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="index-0.html">Daftar Biaya</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Kartu Biaya</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Buku Besar</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Neraca Lajur</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Neraca</a></li>
    <li><a class="nav-link text-dark" href="index-0.html">Rugi Laba</a></li>
  </ul>
</li>

<!-- DASHBOARD SUPERVISOR -->
<li class="menu-header">Dashboard Supervisor</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link text-dark has-dropdown"><i class="far fa-file-alt"></i> <span>Supervisor</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link text-dark" href="forms-advanced-form.html">Advanced Form</a></li>
    <li><a class="nav-link text-dark" href="forms-editor.html">Editor</a></li>
    <li><a class="nav-link text-dark" href="forms-validation.html">Validation</a></li>
  </ul>
</li>
</li>

<li><a class="nav-link text-dark" href="<?= site_url('user') ?>"><i class="fas fa-users"></i> <span>User</span></a></li>