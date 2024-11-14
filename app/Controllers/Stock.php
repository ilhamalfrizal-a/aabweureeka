<?php

namespace App\Controllers;

use App\Models\ModelStock;
use App\Models\ModelLokasi;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Stock extends ResourceController
{
    //  INISIALISASI OBJECT DATA
     function __construct()
     {
         $this->objStock = new ModelStock();
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
        $data['dtstock'] = $this->objStock->getAll();
        return view('stock/index', $data);
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
        // $builder = $this->db->table('stock1');
        // $query = $builder->get();
        // $data['dtstock'] = $query->getResult();
        $data['dtlokasi'] = $this->objLokasi->findAll();
        return view('stock/new', $data);
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
            'id_stock' => $this->request->getVar('id_stock'),
            'id_lokasi' => $this->request->getVar('id_lokasi'),
            'satuan_stock' => $this->request->getVar('satuan_stock'),
            'satuan' => $this->request->getVar('satuan'),
            'jml_harga' => $this->request->getVar('jml_harga'),
            'tanggal' => $this->request->getVar('tanggal'),
        ];
        $this->db->table('stock1')->insert($data);

        return redirect()->to(site_url('stock'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('stock1')->where(['id_stock' => $id])->delete();
        return redirect()->to(site_url('stock'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
