<?php

namespace App\Controllers;

use App\Models\ModelKelompokproduksi;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Kelompokproduksi extends ResourceController
{
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objKelompokproduksi = new ModelKelompokproduksi();
        $this->db = \Config\Database::connect();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtkelompokproduksi'] = $this->objKelompokproduksi->findAll();
        return view('kelompokproduksi/index', $data);
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
        $builder = $this->db->table('kelompokproduksi1');
        $query = $builder->get();
        $data['dtkelompokproduksi'] = $query->getResult();
        return view('kelompokproduksi/new', $data);
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
            'id_kelproduksi' => $this->request->getVar('id_kelproduksi'),
            'kode_kelproduksi' => $this->request->getVar('kode_kelproduksi'),
            'nama_kelproduksi' => $this->request->getVar('nama_kelproduksi'),
        ];
        $this->db->table('kelompokproduksi1')->insert($data);

        return redirect()->to(site_url('kelompokproduksi'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('kelompokproduksi1')->where(['id_kelproduksi' => $id])->delete();
        return redirect()->to(site_url('kelompokproduksi'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
