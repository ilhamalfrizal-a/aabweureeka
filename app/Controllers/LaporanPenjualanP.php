<?php

namespace App\Controllers;

use App\Models\ModelLokasi;
use App\Controllers\BaseController;
use App\Models\ModelPenjualan;
use App\Models\setup\ModelSetupsalesman;
use App\Models\setup\ModelSetuppelanggan;
use App\Models\ModelSetupsupplier;
use App\Models\ModelStock;
use CodeIgniter\HTTP\ResponseInterface;
use TCPDF;

class LaporanPenjualanP extends BaseController
{
    protected $objLokasi;
    protected $objSetupsalesman;
    protected $objPenjualan;
    protected $objPelanggan;
    protected $objSupplier;
    protected $objStock;
    protected $db;
    function __construct()
    {
        $this->objLokasi = new ModelLokasi();
        $this->objSetupsalesman = new ModelSetupsalesman();
        $this->objPenjualan = new ModelPenjualan();
        $this->objPelanggan = new ModelSetuppelanggan();
        $this->objSupplier = new ModelSetupsupplier();
        $this->objStock = new ModelStock();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // Filter data
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';
        $salesman = $this->request->getVar('salesman') ? $this->request->getVar('salesman') : '';
        $lokasi = $this->request->getVar('lokasi') ? $this->request->getVar('lokasi') : '';
        $pelanggan = $this->request->getVar('pelanggan') ? $this->request->getVar('pelanggan') : '';
        $supplier = $this->request->getVar('supplier') ? $this->request->getVar('supplier') : '';
        $stock = $this->request->getVar('stock') ? $this->request->getVar('stock') : '';

        // Panggil model untuk mendapatkan data laporan
        $penjualan = $this->objPenjualan->get_laporan($tglawal, $tglakhir, $salesman, $lokasi);


        // Gabungkan data penjualan dan retur penjualan
        $dtpenjualan = array_merge($penjualan);

        // Hitung jumlah harga, subtotal, discount cash, DPP, PPN, total, HPP, dan laba
        $jml_harga = 0;
        $subtotal = 0;
        $discount_cash = 0;
        $dpp = 0;
        $ppn = 0;
        $total = 0;
        $hpp = 0;
        $laba = 0;
        foreach ($dtpenjualan as $row) {
            $jml_harga += isset($row->jml_harga) ? $row->jml_harga : 0;
            $subtotal += isset($row->sub_total) ? $row->sub_total : 0;
            $discount_cash += isset($row->discount_cash) ? $row->discount_cash : 0;
            $dpp += isset($row->dpp) ? $row->dpp : 0;
            $ppn += isset($row->ppn) ? $row->ppn : 0;
            $total += isset($row->total) ? $row->total : 0;
            $hpp += isset($row->hpp) ? $row->hpp : 0;
            $laba += isset($row->laba) ? $row->laba : 0;
        }

        // Ambil data tambahan untuk dropdown filter
        $data = [
            'dtpenjualan'    => $dtpenjualan,
            'jml_harga'      => $jml_harga,
            'subtotal'       => $subtotal,
            'discount_cash'  => $discount_cash,
            'dpp'            => $dpp,
            'ppn'            => $ppn,
            'total'          => $total,
            'hpp'            => $hpp,
            'laba'           => $laba,
            'dtlokasi'       => $this->objLokasi->getAll(),
            'dtsalesman'     => $this->objSetupsalesman->getAll(),
            'dtPelanggan'    => $this->objPelanggan->getAll(),
            'dtSupplier'     => $this->objSupplier->getAll(),
            'dtStock'        => $this->objStock->getAll(),
            'tglawal'        => $tglawal,
            'tglakhir'       => $tglakhir,
            'salesman'       => $salesman,
            'lokasi'         => $lokasi,
            'pelanggan'      => $pelanggan,
            'supplier'       => $supplier,
            'stock'          => $stock,
        ];

        return view('laporanpenjualan_p/index', $data);
    }

    public function printPDF()
    {
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';
        $salesman = $this->request->getVar('salesman') ? $this->request->getVar('salesman') : '';
        $lokasi = $this->request->getVar('lokasi') ? $this->request->getVar('lokasi') : '';

        // Panggil model untuk mendapatkan data laporan
        $penjualan = $this->objPenjualan->get_laporan($tglawal, $tglakhir, $salesman, $lokasi);


        // Gabungkan data penjualan dan retur penjualan
        $dtpenjualan = array_merge($penjualan);

        // Ambil nama salesman dan lokasi
        $nama_setupsalesman = !empty($salesman) ? $this->objSetupsalesman->find($salesman)->nama_setupsalesman : 'Semua Salesman';
        $nama_lokasi = !empty($lokasi) ? $this->objLokasi->find($lokasi)->nama_lokasi : 'Semua Lokasi';

        // Hitung jumlah harga, subtotal, discount cash, DPP, PPN, total, HPP, dan laba
        $jml_harga = 0;
        $subtotal = 0;
        $discount_cash = 0;
        $dpp = 0;
        $ppn = 0;
        $total = 0;
        $hpp = 0;
        $laba = 0;

        foreach ($dtpenjualan as $row) {
            $jml_harga += isset($row->jml_harga) ? $row->jml_harga : 0;
            $subtotal += isset($row->sub_total) ? $row->sub_total : 0;
            $discount_cash += isset($row->discount_cash) ? $row->discount_cash : 0;
            $dpp += isset($row->dpp) ? $row->dpp : 0;
            $ppn += isset($row->ppn) ? $row->ppn : 0;
            $total += isset($row->total) ? $row->total : 0;
            $hpp += isset($row->hpp) ? $row->hpp : 0;
            $laba += isset($row->laba) ? $row->laba : 0;
        }

        // Load view untuk PDF
        $html = view('laporanpenjualan/printPDF', [
            'dtpenjualan'    => $dtpenjualan,
            'jml_harga'      => $jml_harga,
            'subtotal'       => $subtotal,
            'discount_cash'  => $discount_cash,
            'dpp'            => $dpp,
            'ppn'            => $ppn,
            'total'          => $total,
            'hpp'            => $hpp,
            'laba'           => $laba,
            'tglawal'        => $tglawal,
            'tglakhir'       => $tglakhir,
            'salesman'       => $nama_setupsalesman,
            'lokasi'         => $nama_lokasi,
        ]);

        // Inisialisasi TCPDF
        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Laporan Penjualan');
        $pdf->SetSubject('Laporan Penjualan');
        $pdf->SetKeywords('TCPDF, PDF, laporan, penjualan');

        // Set header dan footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // Add a page
        $pdf->AddPage();

        // Set content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF
        $pdf->Output('laporan_penjualan.pdf', 'I');
    }
}
