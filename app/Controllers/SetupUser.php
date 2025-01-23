<?php

namespace App\Controllers;

use App\Models\ModelSetupuser;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class SetupUser extends ResourceController
{
    protected $objSetupuser;
    protected $db;
    function __construct()
    {
        $this->objSetupuser = new ModelSetupuser();
        $this->db = \Config\Database::connect();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtsetupuser'] = $this->objSetupuser->findAll();
        return view('setupuser/index', $data);
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
        $builder = $this->db->table('setupuser1');
        $query = $builder->get();
        $data['dtsetupuser'] = $query->getResult();
        return view('setupuser/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $password = $this->request->getVar('password');
        $kode_aktivasi = $this->request->getVar('kode_aktivasi');
    
        // Validasi password dan kode aktivasi
        if ($password !== 'aabweureeka' || $kode_aktivasi !== 'eureeka123') {
            return redirect()->back()->with('error', 'Password atau kode aktivasi salah.');
        }
        
        $data = $this->request->getPost();
        $data = [
            'id_setupuser' => $this->request->getVar('id_setupuser'),
            'kode_setupuser' => $this->request->getVar('kode_setupuser'),
            'nama_setupuser' => $this->request->getVar('nama_setupuser'),
            'check_setupuser' => $this->request->getVar('check_setupuser'),
        ];
        $this->db->table('setupuser1')->insert($data);

        return redirect()->to(site_url('setupuser'))->with('Sukses', 'Data Berhasil Disimpan');
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
       $dtsetupuser = $this->objSetupuser->find($id);

       // Cek jika data tidak ditemukan
       if (!$dtsetupuser) {
           return redirect()->to(site_url('setupuser'))->with('error', 'Data tidak ditemukan');
       }


       // Lanjutkan jika semua pengecekan berhasil
       $data['dtsetupuser'] = $dtsetupuser;
       
       return view('setupuser/edit', $data);
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
        $password = $this->request->getVar('password');
        $kode_aktivasi = $this->request->getVar('kode_aktivasi');
    
        // Validasi password dan kode aktivasi
        if ($password !== 'aabweureeka' || $kode_aktivasi !== 'eureeka123') {
            return redirect()->back()->with('error', 'Password atau kode aktivasi salah.');
        }

        $data = $this->request->getPost();
        $data = [
           'id_setupuser' => $this->request->getVar('id_setupuser'),
            'kode_setupuser' => $this->request->getVar('kode_setupuser'),
            'nama_setupuser' => $this->request->getVar('nama_setupuser'),
            'check_setupuser' => $this->request->getVar('check_setupuser'),
        ];
        // Update data berdasarkan ID
        $this->objSetupuser->update($id, $data);

        return redirect()->to(site_url('setupuser'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('setupuser1')->where(['id_setupuser' => $id])->delete();
        return redirect()->to(site_url('setupuser'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
