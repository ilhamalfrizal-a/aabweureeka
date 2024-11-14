<?php

namespace App\Controllers;

use App\Models\ModelLokasi;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Lokasi extends ResourceController
{
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
        return view('lokasi/index', $data);
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
        return view('lokasi/new', $data);
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

        return redirect()->to(site_url('lokasi'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('lokasi1')->where(['id_lokasi' => $id])->delete();
        return redirect()->to(site_url('lokasi'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
