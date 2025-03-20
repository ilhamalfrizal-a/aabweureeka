<?php

namespace App\Controllers\setup;

use App\Models\setup\ModelSetuppelanggan;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class SetupPelanggan extends ResourceController
{
    protected $objSetupPelanggan;
    protected $db;
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objSetupPelanggan = new ModelSetuppelanggan();
        $this->db = \Config\Database::connect();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtsetuppelanggan'] = $this->objSetupPelanggan->findAll();
        return view('setup/pelanggan/index', $data);
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
        $builder = $this->db->table('setuppelanggan1');
        $query = $builder->get();
        $data['dtsetuppelanggan'] = $query->getResult();
        return view('setup/pelanggan/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $nama_pelanggan = $this->request->getVar('nama_pelanggan');

        // Ambil huruf pertama dari nama pelanggan
        $kode_prefix = strtoupper(substr($nama_pelanggan, 0, 1));

        // Cari kode terakhir yang dimulai dengan prefix ini
        $builder = $this->db->table('setuppelanggan1');
        $lastKode = $builder->select('kode_pelanggan')
            ->like('kode_pelanggan', $kode_prefix, 'after')
            ->orderBy('kode_pelanggan', 'DESC')
            ->limit(1)
            ->get()
            ->getRow();

        // Hitung nomor urut baru
        if ($lastKode) {
            $lastNumber = intval(substr($lastKode->kode_pelanggan, 1));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format kode pelanggan baru (e.g., I00001)
        $kode_pelanggan = $kode_prefix . str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        $data = [
            'kode_pelanggan' => $kode_pelanggan,
            'nama_pelanggan' => $nama_pelanggan,
            'alamat_pelanggan' => $this->request->getVar('alamat_pelanggan'),
            'kota_pelanggan' => $this->request->getVar('kota_pelanggan'),
            'telp_pelanggan' => $this->request->getVar('telp_pelanggan'),
            'plafond' => $this->request->getVar('plafond'),
            'npwp' => $this->request->getVar('npwp'),
            'class_pelanggan' => $this->request->getVar('class_pelanggan'),
            'tipe' => $this->request->getVar('tipe'),
            'tanggal' => $this->request->getVar('tanggal'),
            'saldo' => $this->request->getVar('saldo'),
        ];
        $this->db->table('setuppelanggan1')->insert($data);

        return redirect()->to(site_url('setup/pelanggan'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $dtsetuppelanggan = $this->objSetupPelanggan->find($id);

        // Cek jika data tidak ditemukan
        if (!$dtsetuppelanggan) {
            return redirect()->to(site_url('setup/pelanggan'))->with('error', 'Data tidak ditemukan');
        }


        // Lanjutkan jika semua pengecekan berhasil
        $data['dtsetuppelanggan'] = $dtsetuppelanggan;

        return view('setuppelanggan/edit', $data);
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
        $nama_pelanggan = $this->request->getVar('nama_pelanggan');

        // Ambil huruf pertama dari nama pelanggan
        $kode_prefix = strtoupper(substr($nama_pelanggan, 0, 1));

        // Cari kode terakhir yang dimulai dengan prefix ini
        $builder = $this->db->table('setuppelanggan1');
        $lastKode = $builder->select('kode_pelanggan')
            ->like('kode_pelanggan', $kode_prefix, 'after')
            ->orderBy('kode_pelanggan', 'DESC')
            ->limit(1)
            ->get()
            ->getRow();

        // Hitung nomor urut baru
        if ($lastKode) {
            $lastNumber = intval(substr($lastKode->kode_pelanggan, 1));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format kode pelanggan baru (e.g., I00001)
        $kode_pelanggan = $kode_prefix . str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        $data = [
            'kode_pelanggan' => $kode_pelanggan,
            'nama_pelanggan' => $nama_pelanggan,
            'alamat_pelanggan' => $this->request->getVar('alamat_pelanggan'),
            'kota_pelanggan' => $this->request->getVar('kota_pelanggan'),
            'telp_pelanggan' => $this->request->getVar('telp_pelanggan'),
            'plafond' => $this->request->getVar('plafond'),
            'npwp' => $this->request->getVar('npwp'),
            'class_pelanggan' => $this->request->getVar('class_pelanggan'),
            'tipe' => $this->request->getVar('tipe'),
            'tanggal' => $this->request->getVar('tanggal'),
            'saldo' => $this->request->getVar('saldo'),
        ];
        // Update data berdasarkan ID
        $this->objSetupPelanggan->update($id, $data);

        return redirect()->to(site_url('setup/pelanggan'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('setuppelanggan1')->where(['id_pelanggan' => $id])->delete();
        return redirect()->to(site_url('setup/pelanggan'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
