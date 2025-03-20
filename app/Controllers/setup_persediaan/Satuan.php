<?php

namespace App\Controllers\setup_persediaan;

use App\Models\setup_persediaan\ModelSatuan;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Satuan extends ResourceController
{
    protected $objSatuan;
    protected $db;
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objSatuan = new ModelSatuan();
        $this->db = \Config\Database::connect();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtsatuan'] = $this->objSatuan->findAll();
        return view('setup_persediaan/satuan/index', $data);
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

        $builder = $this->db->table('satuan1');
        $query = $builder->get();
        $data['dtsatuan'] = $query->getResult();
        return view('setup_persediaan/satuan/new', $data);
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
            'id_satuan' => $this->request->getVar('id_satuan'),
            'kode_satuan' => $this->request->getVar('kode_satuan'),
            'nama_satuan' => $this->request->getVar('nama_satuan'),
        ];
        $this->db->table('satuan1')->insert($data);

        return redirect()->to(site_url('setup_persediaan/satuan'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $dtsatuan = $this->objSatuan->find($id);

        // Cek jika data tidak ditemukan
        if (!$dtsatuan) {
            return redirect()->to(site_url('satuan'))->with('error', 'Data tidak ditemukan');
        }


        // Lanjutkan jika semua pengecekan berhasil
        $data['dtsatuan'] = $dtsatuan;

        return view('setup_persediaan/satuan/edit', $data);
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
            'id_satuan' => $this->request->getVar('id_satuan'),
            'kode_satuan' => $this->request->getVar('kode_satuan'),
            'nama_satuan' => $this->request->getVar('nama_satuan'),
        ];
        // Update data berdasarkan ID
        $this->objSatuan->update($id, $data);

        return redirect()->to(site_url('setup_persediaan/satuan'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('satuan1')->where(['id_satuan' => $id])->delete();
        return redirect()->to(site_url('setup_persediaan/satuan'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
