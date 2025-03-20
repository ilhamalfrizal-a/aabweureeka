<?php

namespace App\Controllers\setup_persediaan;

use App\Models\setup_persediaan\ModelLokasi;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Lokasi extends ResourceController
{
    protected $objLokasi;
    protected $db;
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objLokasi = new ModelLokasi();
        $this->db = \Config\Database::connect();
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtlokasi'] = $this->objLokasi->findAll();
        return view('setup_persediaan/lokasi/index', $data);
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
        $builder = $this->db->table('lokasi1');
        $query = $builder->get();
        $data['dtlokasi'] = $query->getResult();
        return view('setup_persediaan/lokasi/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = $this->request->getPost();
        $data = [
            'id_lokasi' => $this->request->getVar('id_lokasi'),
            'kode_lokasi' => $this->request->getVar('kode_lokasi'),
            'nama_lokasi' => $this->request->getVar('nama_lokasi'),
        ];
        $this->db->table('lokasi1')->insert($data);

        return redirect()->to(site_url('setup_persediaan/lokasi'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $dtlokasi = $this->objLokasi->find($id);

        // Cek jika data tidak ditemukan
        if (!$dtlokasi) {
            return redirect()->to(site_url('setup_persediaan/lokasi'))->with('error', 'Data tidak ditemukan');
        }


        // Lanjutkan jika semua pengecekan berhasil
        $data['dtlokasi'] = $dtlokasi;

        return view('setup_persediaan/lokasi/edit', $data);
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
        $data = $this->request->getPost();
        $data = [
            'id_lokasi' => $this->request->getVar('id_lokasi'),
            'kode_lokasi' => $this->request->getVar('kode_lokasi'),
            'nama_lokasi' => $this->request->getVar('nama_lokasi'),
        ];
        // Update data berdasarkan ID
        $this->objLokasi->update($id, $data);

        return redirect()->to(site_url('setup_persediaan/lokasi'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('lokasi1')->where(['id_lokasi' => $id])->delete();
        return redirect()->to(site_url('setup_persediaan/lokasi'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
