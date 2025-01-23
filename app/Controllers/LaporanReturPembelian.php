<?php

namespace App\Controllers;

use TCPDF;
use App\Models\ModelLokasi;
use App\Models\ModelSatuan;
use App\Models\ModelSetupbank;
use App\Models\ModelSetupsupplier;
use App\Models\ModelReturPembelian;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class LaporanReturPembelian extends ResourceController
{
    
    protected $db, $objLokasi, $objSatuan, $objReturPembelian, $objSetupbank, $objSetupsupplier;
    function __construct()
    {
        $this->objLokasi = new ModelLokasi();
        $this->objSatuan = new ModelSatuan();
        $this->objSetupsupplier = new ModelSetupsupplier();
        $this->objReturPembelian = new ModelReturPembelian();
        $this->objSetupbank = new ModelSetupbank();
        $this->db = \Config\Database::connect();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir')? $this->request->getVar('tglakhir') : '';

        // Panggil model untuk mendapatkan data laporan
        $dtreturpembelian = $this->objReturPembelian->get_laporan($tglawal, $tglakhir);

        // Ambil data tambahan untuk dropdown filter
        $data['dtsetupsupplier'] = $this->objSetupsupplier->getAll();

        
       // Hitung subtotal dan total
       $subtotal = 0;
       $grandtotal = 0;
       foreach ($dtreturpembelian as $row) {
       $subtotal += $row->sub_total;
       $grandtotal += $row->grand_total;
   }

        // $data['dtpembelian'] = $rowdata;
        $data = [
            'dtreturpembelian'    => $dtreturpembelian,
            'subtotal'       => $subtotal,
            'grandtotal'     => $grandtotal,
        ];
        $data['dtlokasi'] = $this->objLokasi->getAll();
        $data['dtsatuan'] = $this->objSatuan->getAll();
        $data['dtsetupsupplier'] = $this->objSetupsupplier->getAll();
        $data['dtsetupbank'] = $this->objSetupbank->getAll();
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;
        return view('laporanreturpembelian/index', $data);
    }

    public function printPDF($id = null)
    {
        // Ambil data filter dari request
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';

        // Dapatkan data pembelian berdasarkan filter
        $dtreturpembelian = $this->objReturPembelian->get_laporan($tglawal, $tglakhir);

        // Hitung subtotal dan grand total
        $subtotal = 0;
        $grandtotal = 0;
        if ($dtreturpembelian) {
        foreach ($dtreturpembelian as $row) {
            $subtotal += $row->jml_harga; // Total jumlah harga retur
            $grandtotal += $row->total;  // Total setelah diskon atau pajak
        }
    }
    $data = [
        'dtreturpembelian' => $dtreturpembelian,
        'dtlokasi'         => $this->objLokasi->getAll(),
        'dtsatuan'         => $this->objSatuan->getAll(),
        'dtsetupsupplier'  => $this->objSetupsupplier->getAll(),
        'dtsetupbank'      => $this->objSetupbank->getAll(),
        'tglawal'          => $tglawal,
        'tglakhir'         => $tglakhir,
        'subtotal'         => $subtotal,
        'grandtotal'       => $grandtotal,
    ];
        // Debugging: Tampilkan konten HTML sebelum PDF
        $html = view('laporanreturpembelian/printPDF', $data);
        // echo $html;
        // exit; // Jika perlu debugging

        // Buat PDF baru
        $pdf = new TCPDF('landscape', PDF_UNIT, 'A4', true, 'UTF-8', false);

        // Hapus header/footer default
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Tambah halaman baru
        $pdf->AddPage();

        // Cetak konten menggunakan WriteHTML
        $pdf->writeHTML($html, true, false, true, false, '');

        // Set tipe respons menjadi PDF
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan_retur_pembelian.pdf', 'D');
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
