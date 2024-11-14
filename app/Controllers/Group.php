<?php

namespace App\Controllers;

use App\Models\ModelGroup;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Group extends ResourceController
{
    function __construct()
    {
        $this->objGroup = new ModelGroup();
        $this->db = \Config\Database::connect();
    }
    
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtgroup'] = $this->objGroup->findAll();
        return view('group/index', $data);
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
        $builder = $this->db->table('group1');
        $query = $builder->get();
        $data['dtgroup'] = $query->getResult();
        return view('group/new', $data);
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
            'id_group' => $this->request->getVar('id_group'),
            'kode_group' => $this->request->getVar('kode_group'),
            'nama_group' => $this->request->getVar('nama_group'),
            'rekening_group' => $this->request->getVar('rekening_group'),
        ];
        $this->db->table('group1')->insert($data);

        return redirect()->to(site_url('group'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('group1')->where(['id_group' => $id])->delete();
        return redirect()->to(site_url('group'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
