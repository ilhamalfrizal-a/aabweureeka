<?php

namespace App\Controllers;

use CodeIgniter\Model;
use App\Models\ModelSetupbank;
use App\Models\ModelLunasSalesman;
use App\Models\ModelSetupsalesman;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use TCPDF;

class LunasSalesman extends ResourceController
{
    protected $objSetupbank;
    protected $objLunasSalesman;
    protected $objSetupsalesman;
    protected $db;
    
    //  INISIALISASI OBJECT DATA
   function __construct()
   {
       $this->objSetupsalesman = new ModelSetupsalesman();
       $this->objSetupbank = new ModelSetupbank();
       $this->objLunasSalesman = new ModelLunasSalesman();
       $this->db = \Config\Database::connect();
       
   }
    
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtlunassalesman'] = $this->objLunasSalesman->getAll();
        $data['dtsetupsalesman'] = $this->objSetupsalesman->findAll();
        $data['dtsetupbank'] = $this->objSetupbank->findAll();
        return view('lunassalesman/index', $data);
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
        $data['dtlunassalesman'] = $this->objLunasSalesman->getAll();
        $data['dtsetupsalesman'] = $this->objSetupsalesman->findAll();
        $data['dtsetupbank'] = $this->objSetupbank->findAll();
        return view('lunassalesman/new', $data);
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
            'id_lunashusalesman'    => $this->request->getVar('id_lunashusalesman'),
            'nota'              => $this->request->getVar('nota'),
            'id_setupsalesman'      => $this->request->getVar('id_setupsalesman'),
            'tanggal'           => $this->request->getVar('tanggal'),
            'id_setupbank'      => $this->request->getVar('id_setupbank'),
            'saldo'             => $this->request->getVar('saldo'),
            'nilai_pelunasan'   => $this->request->getVar('nilai_pelunasan'),
            'diskon'            => $this->request->getVar('diskon'),
            'pdpt'              => $this->request->getVar('pdpt'),
            
            
        ];
        $this->db->table('lunassalesman1')->insert($data);

        return redirect()->to(site_url('lunassalesman'))->with('Sukses', 'Data Berhasil Disimpan');
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
         // Cek apakah pengguna memiliki peran admin
         if (!in_groups('admin')) {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses');
        }

        // Ambil data berdasarkan ID
        $dtlunassalesman = $this->objLunasSalesman->find($id);

        // Cek jika data tidak ditemukan
        if (!$dtlunassalesman) {
            return redirect()->to(site_url('lunassalesman'))->with('error', 'Data tidak ditemukan');
        }


        // Lanjutkan jika semua pengecekan berhasil
        $data['dtlunassalesman'] = $dtlunassalesman;
        $data['dtsetupsalesman'] = $this->objSetupsalesman->findAll();
        $data['dtsetupbank'] = $this->objSetupbank->findAll();
        return view('lunassalesman/edit', $data);
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
         // Cek apakah pengguna memiliki peran admin
    if (!in_groups('admin')) {
        return redirect()->to('/')->with('error', 'Anda tidak memiliki akses');
    }

    // Cek apakah data dengan ID yang diberikan ada di database
    $existingData = $this->objLunasSalesman->find($id);
    if (!$existingData) {
        return redirect()->to(site_url('lunassalesman'))->with('error', 'Data tidak ditemukan');
    }

    // Ambil data yang diinputkan dari form
    $data = [
       'id_lunashusalesman'    => $this->request->getVar('id_lunashusalesman'),
            'nota'              => $this->request->getVar('nota'),
            'id_setupsalesman'      => $this->request->getVar('id_setupsalesman'),
            'tanggal'           => $this->request->getVar('tanggal'),
            'id_setupbank'      => $this->request->getVar('id_setupbank'),
            'saldo'             => $this->request->getVar('saldo'),
            'nilai_pelunasan'   => $this->request->getVar('nilai_pelunasan'),
            'diskon'            => $this->request->getVar('diskon'),
            'pdpt'              => $this->request->getVar('pdpt'),
    ];

    // Update data berdasarkan ID
    $this->objLunasSalesman->update($id, $data);

    return redirect()->to(site_url('lunassalesman'))->with('success', 'Data berhasil diupdate.');
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
        $this->db->table('lunassalesman1')->where(['id_lunashusalesman' => $id])->delete();
        return redirect()->to(site_url('lunassalesman'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
