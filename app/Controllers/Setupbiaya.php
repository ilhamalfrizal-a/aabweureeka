<?php

namespace App\Controllers;

use App\Models\ModelSetupbiaya;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Setupbiaya extends ResourceController
{
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objSetupbiaya = new ModelSetupbiaya();
        $this->db = \Config\Database::connect();
    }
    
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtsetupbiaya'] = $this->objSetupbiaya->findAll();
        return view('setupbiaya/index', $data);
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
        $builder = $this->db->table('setupbiaya1');
        $query = $builder->get();
        $data['dtsetupbiaya'] = $query->getResult();
        return view('setupbiaya/new', $data);
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
            'id_setupbiaya' => $this->request->getVar('id_setupbiaya'),
            'kode_setupbiaya' => $this->request->getVar('kode_setupbiaya'),
            'nama_setupbiaya' => $this->request->getVar('nama_setupbiaya'),
            'rekening_setupbiaya' => $this->request->getVar('rekening_setupbiaya'),
        ];
        $this->db->table('setupbiaya1')->insert($data);

        return redirect()->to(site_url('setupbiaya'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('setupbiaya1')->where(['id_setupbiaya' => $id])->delete();
        return redirect()->to(site_url('setupbiaya'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
