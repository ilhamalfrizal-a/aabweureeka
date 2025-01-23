<?php

namespace App\Controllers;

use CodeIgniter\Model;
use App\Models\ModelPosneraca;

use App\Models\PosNeracaModel;
use App\Models\ModelKlasifikasi;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
// use App\Models\PosNeracaModel;

class Posneraca extends ResourceController
{
    protected $objPosneraca;
    protected $objKlasifikasi;
    protected $db;
    //Inisialisasi object data
    function __construct()
    {
        $this->objPosneraca = new ModelPosneraca();
        $this->objKlasifikasi = new ModelKlasifikasi();
        $this->db = \Config\Database::connect();
    }
    
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtposneraca'] = $this->objPosneraca->getAll();
        $data['dtklasifikasi'] = $this->objKlasifikasi->getAll();
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
         
        $data['dtposneraca'] = $this->objPosneraca->getAll();
        $data['dtklasifikasi'] = $this->objKlasifikasi->getAll();
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
            'nama_posneraca' => $this->request->getVar('nama_posneraca'),
            'kode_posneraca' => $this->request->getVar('kode_posneraca'),
            'id_klasifikasi' => $this->request->getVar('id_klasifikasi'),
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
       // Ambil data berdasarkan ID
       $dtposneraca = $this->objPosneraca->find($id);

       // Cek jika data tidak ditemukan
       if (!$dtposneraca) {
           return redirect()->to(site_url('posneraca'))->with('error', 'Data tidak ditemukan');
       }


       // Lanjutkan jika semua pengecekan berhasil
       $data['dtposneraca'] = $dtposneraca;
       $data['dtklasifikasi'] = $this->objKlasifikasi->findAll();
       return view('posneraca/edit', $data);
        
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
        $data = $this->request->getPost();
        $data = [
            'nama_posneraca' => $this->request->getVar('nama_posneraca'),
            'kode_posneraca' => $this->request->getVar('kode_posneraca'),
            'id_klasifikasi' => $this->request->getVar('id_klasifikasi'),
            'posisi_posneraca' => $this->request->getVar('posisi_posneraca'),
        ];
        // Update data berdasarkan ID
        $this->objPosneraca->update($id, $data);

        return redirect()->to(site_url('posneraca'))->with('Sukses', 'Data Berhasil Disimpan');
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
