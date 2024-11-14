<?php

namespace App\Controllers;

use App\Models\ModelPeriode;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Periode extends ResourceController
{
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objPeriode = new ModelPeriode();
        $this->db = \Config\Database::connect();
    }
    
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $builder = $this->db->table('periode1');
        $query = $builder->get();
        $data['dtperiode'] = $query->getResult();
        return view('periode/index');
    }

    public function setPeriode()
    {
        $periode_bulan = $this->request->getPost('periode_bulan');
        $periode_tahun = $this->request->getPost('periode_tahun');

        // Simpan data periode di session
        session()->set('periode_bulan', $periode_bulan);
        session()->set('periode_tahun', $periode_tahun);

        // Redirect ke halaman dashboard atau lainnya
        return redirect()->to(base_url('periode'));
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
            'id_periode' => $this->request->getVar('id_periode'),
            'periode_bulan' => $this->request->getVar('periode_bulan'),
            'periode_tahun' => $this->request->getVar('periode_tahun'),
        ];
        $this->db->table('periode1')->insert($data);

        return redirect()->to(site_url('periode'))->with('Sukses', 'Data Berhasil Disimpan');
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
