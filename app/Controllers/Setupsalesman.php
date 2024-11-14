<?php

namespace App\Controllers;

use App\Models\ModelSetupsalesman;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Setupsalesman extends ResourceController
{
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objSetupsalesman = new ModelSetupsalesman();
        $this->db = \Config\Database::connect();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtsetupsalesman'] = $this->objSetupsalesman->findAll();
        return view('setupsalesman/index', $data);
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
        return view('setupsalesman/new', $data);
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
            'id_setupsalesman' => $this->request->getVar('id_setupsalesman'),
            'kode_setupsalesman' => $this->request->getVar('kode_setupsalesman'),
            'nama_setupsalesman' => $this->request->getVar('nama_setupsalesman'),
            'lokasi_setupsalesman' => $this->request->getVar('lokasi_setupsalesman'),
            'tanggal_setupsalesman' => $this->request->getVar('tanggal_setupsalesman'),
        ];
        $this->db->table('setupsalesman1')->insert($data);

        return redirect()->to(site_url('setupsalesman'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('setupsalesman1')->where(['id_setupsalesman' => $id])->delete();
        return redirect()->to(site_url('setupsalesman'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
