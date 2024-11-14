<?php

namespace App\Controllers;

use App\Models\ModelSetupbuku;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Setupbuku extends ResourceController
{
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objSetupbuku = new ModelSetupbuku();
        $this->db = \Config\Database::connect();
    }
    
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $builder = $this->db->table('setupbuku1');
        $query = $builder->get();
        $data['dtsetupbuku'] = $query->getResult();
        return view('setupbuku/index');
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
            'id_setupbuku' => $this->request->getVar('id_setupbuku'),
            'kode_setupbuku' => $this->request->getVar('kode_setupbuku'),
            'nama_setupbuku' => $this->request->getVar('nama_setupbuku'),
            'pos_neraca' => $this->request->getVar('pos_neraca'),
            'saldo_setupbuku' => $this->request->getVar('saldo_setupbuku'),
        ];
        $this->db->table('setupbuku1')->insert($data);

        return redirect()->to(site_url('setupbuku'))->with('Sukses', 'Data Berhasil Disimpan');
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
