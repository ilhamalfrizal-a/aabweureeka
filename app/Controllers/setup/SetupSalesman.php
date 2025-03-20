<?php

namespace App\Controllers\setup;

use App\Models\setup\ModelSetupsalesman;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class SetupSalesman extends ResourceController
{
    protected $objSetupSalesman, $db;
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objSetupSalesman = new ModelSetupsalesman();
        $this->db = \Config\Database::connect();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $month = date('m');
        $year = date('Y');

        if (!in_groups('admin')) {
            // Periksa apakah tutup buku periode bulan ini ada
            $cek = $this->db->table('closed_periods')->where('month', $month)->where('year', $year)->where('is_closed', 1)->get();
            $closeBookCheck = $cek->getResult();
            if ($closeBookCheck == TRUE) {
                $data['is_closed'] = 'TRUE';
            } else {
                $data['is_closed'] = 'FALSE';
            }
        } else {
            $data['is_closed'] = 'FALSE';
        }
        $data['dtsetupsalesman'] = $this->objSetupSalesman->findAll();
        return view('setup/salesman/index', $data);
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
        $builder = $this->db->table('setupsalesman1');
        $query = $builder->get();
        $data['dtsetupsalesman'] = $query->getResult();
        return view('setup/salesman/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $namaSetupsalesman = $this->request->getVar('nama_setupsalesman');

        // Ekstrak huruf pertama dari nama
        $initial = strtoupper(substr($namaSetupsalesman, 0, 1));

        // Hitung jumlah entri dengan kode yang sama untuk menentukan nomor urut
        $builder = $this->db->table('setupsalesman1');
        $count = $builder->like('kode_setupsalesman', $initial, 'after')->countAllResults();

        // Buat kode otomatis
        $kodeSetupsalesman = $initial . str_pad($count + 1, 5, '0', STR_PAD_LEFT);

        // Data untuk disimpan
        $data = [
            'kode_setupsalesman' => $kodeSetupsalesman,
            'nama_setupsalesman' => $namaSetupsalesman,
            'lokasi_setupsalesman' => $this->request->getVar('lokasi_setupsalesman'),
            'tanggal_setupsalesman' => $this->request->getVar('tanggal_setupsalesman'),
        ];
        $this->db->table('setupsalesman1')->insert($data);

        return redirect()->to(site_url('setup/salesman'))->with('Sukses', 'Data Berhasil Disimpan');
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
        // Ambil data berdasarkan ID
        $dtsetupsalesman = $this->objSetupSalesman->find($id);

        // Cek jika data tidak ditemukan
        if (!$dtsetupsalesman) {
            return redirect()->to(site_url('setup/salesman'))->with('error', 'Data tidak ditemukan');
        }


        // Lanjutkan jika semua pengecekan berhasil
        $data['dtsetupsalesman'] = $dtsetupsalesman;

        return view('setup/salesman/edit', $data);
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
        $namaSetupsalesman = $this->request->getVar('nama_setupsalesman');

        // Ekstrak huruf pertama dari nama
        $initial = strtoupper(substr($namaSetupsalesman, 0, 1));

        // Hitung jumlah entri dengan kode yang sama untuk menentukan nomor urut
        $builder = $this->db->table('setupsalesman1');
        $count = $builder->like('kode_setupsalesman', $initial, 'after')->countAllResults();

        // Buat kode otomatis
        $kodeSetupsalesman = $initial . str_pad($count + 1, 5, '0', STR_PAD_LEFT);

        // Data untuk disimpan
        $data = [
            'kode_setupsalesman' => $kodeSetupsalesman,
            'nama_setupsalesman' => $namaSetupsalesman,
            'lokasi_setupsalesman' => $this->request->getVar('lokasi_setupsalesman'),
            'tanggal_setupsalesman' => $this->request->getVar('tanggal_setupsalesman'),
        ];
        // Update data berdasarkan ID
        $this->objSetupSalesman->update($id, $data);

        return redirect()->to(site_url('setup/salesman'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('setupsalesman1')->where(['id_setupsalesman' => $id])->delete();
        return redirect()->to(site_url('setup/salesman'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
