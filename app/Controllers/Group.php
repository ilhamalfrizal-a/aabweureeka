<?php

namespace App\Controllers;

use App\Models\ModelGroup;
use App\Models\ModelAntarmuka;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Group extends ResourceController
{
    protected $objGroup;
    protected $objAntarmuka;
    protected $db;
    function __construct()
    {
        $this->objGroup = new ModelGroup();
        $this->objAntarmuka = new ModelAntarmuka();
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
        $data['dtgroup'] = $this->objGroup->getGroupWithInterface();
        $data['dtinterface'] = $this->db->table('interface1')->get()->getResult();
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
        $data['dtgroup'] = $this->objGroup->getGroupWithInterface();
        $data['dtinterface'] = $this->db->table('interface1')->get()->getResult();
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
            'id_interface' => $this->request->getVar('id_interface'),
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
        // Ambil data group berdasarkan ID
    $dtgroup = $this->objGroup->find($id);

    // Cek jika data tidak ditemukan
    if (!$dtgroup) {
        return redirect()->to(site_url('group'))->with('error', 'Data tidak ditemukan');
    }

    // Ambil data rekening dari tabel interface1
    $ModelAntarmuka = new ModelAntarmuka();
    $dtinterface = $ModelAntarmuka->findAll(); // Mengambil semua data rekening

    // Kirim data ke view
    $data['dtgroup'] = $dtgroup;
    $data['dtinterface'] = $dtinterface; // Kirimkan data rekening ke view

    return view('group/edit', $data);
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
            'id_group' => $this->request->getVar('id_group'),
            'kode_group' => $this->request->getVar('kode_group'),
            'nama_group' => $this->request->getVar('nama_group'),
            'id_interface' => $this->request->getVar('id_interface'),
        ];
        // Update data berdasarkan ID
        $this->objGroup->update($id, $data);

        return redirect()->to(site_url('group'))->with('Sukses', 'Data Berhasil Disimpan');
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
