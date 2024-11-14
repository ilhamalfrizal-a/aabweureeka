<?php

namespace App\Controllers;

use App\Models\ModelSetupbank;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Setupbank extends ResourceController
{
    // INISIALISASI OBJECT DATA
    function __construct()
    {
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
        $builder = $this->db->table('setupbank1');
        $query = $builder->get();
        $data['dtsetupbank'] = $query->getResult();
        return view('setupbank/index');
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
        $data = $this->request->getPost();
        $data = [
            'id_setupbank' => $this->request->getVar('id_setupbank'),
            'kode_setupbank' => $this->request->getVar('kode_setupbank'),
            'nama_setupbank' => $this->request->getVar('nama_setupbank'),
            'rekening_setupbank' => $this->request->getVar('rekening_setupbank'),
        ];
        $this->db->table('setupbank1')->insert($data);

        return redirect()->to(site_url('setupbank'))->with('Sukses', 'Data Berhasil Disimpan');
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
