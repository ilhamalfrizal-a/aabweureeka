<?php

namespace App\Controllers;

use App\Models\ModelSatuan;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Satuan extends ResourceController
{
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
        return view('satuan/index', $data);
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
        return view('satuan/new', $data);
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

        return redirect()->to(site_url('satuan'))->with('Sukses', 'Data Berhasil Disimpan');
        
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
        $builder = $this->db->table('satuan1');
        $query = $builder->get();
        $satuan = $this->objSatuan->find($id);
        if(is_object($satuan)){
            $data['dtsatuan'] = $satuan;
            $data['dtsatuan'] = $query->getResult();
            return view('satuan/edit', $data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
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
        $this->db->table('satuan1')->where(['id_satuan' => $id])->delete();
        return redirect()->to(site_url('satuan'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
