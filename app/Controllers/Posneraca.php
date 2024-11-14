<?php

namespace App\Controllers;
use App\Models\PosNeracaModel;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
// use App\Models\PosNeracaModel;

class Posneraca extends ResourceController
{
    protected $objPosneraca;
    //Inisialisasi object data
    function __construct()
    {
        $this->objPosneraca = new PosNeracaModel();
        $this->db = \Config\Database::connect();
    }
    
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $model = new PosNeracaModel();
        $data['dtposneraca'] = $this->objPosneraca->findAll();
        return view('posneraca/index', $data);
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
         
        $builder = $this->db->table('pos_neraca');
        $query = $builder->get();
        $data['dtposneraca'] = $query->getResult();

        return view('posneraca/new', $data);
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
            'id_posneraca' => $this->request->getVar('id_posneraca'),
            'nama_posneraca' => $this->request->getVar('nama_posneraca'),
            'posisi_posneraca' => $this->request->getVar('posisi_posneraca'),
        ];
        $this->db->table('pos_neraca')->insert($data);

        return redirect()->to(site_url('posneraca'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $builder = $this->db->table('pos_neraca');
        $query = $builder->get();
        $posneraca = $this->objPosneraca->find($id);
        if(is_object($posneraca)){
            $data['dtposneraca'] = $posneraca;
            return view('posneraca/edit', $data);
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
        $this->db->table('pos_neraca')->where(['id_posneraca' => $id])->delete();
        return redirect()->to(site_url('posneraca'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
