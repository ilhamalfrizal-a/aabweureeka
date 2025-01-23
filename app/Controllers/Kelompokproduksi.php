<?php

namespace App\Controllers;

use App\Models\ModelAntarmuka;
use App\Models\ModelKelompokproduksi;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Kelompokproduksi extends ResourceController
{
    protected $db;
    protected $objKelompokproduksi;
    protected $objAntarmuka;
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objKelompokproduksi = new ModelKelompokproduksi();
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
        $data['dtkelompokproduksi'] = $this->objKelompokproduksi->findAll();
        $data['dtkelompokproduksi'] = $this->objKelompokproduksi->getGroupWithInterface();
        $data['dtinterface'] = $this->db->table('interface1')->get()->getResult();
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
        $data['dtkelompokproduksi'] = $this->objKelompokproduksi->findAll();
        $data['dtkelompokproduksi'] = $this->objKelompokproduksi->getGroupWithInterface();
        $data['dtinterface'] = $this->db->table('interface1')->get()->getResult();
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
            'id_interface' => $this->request->getVar('id_interface'),
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
         // Ambil data berdasarkan ID
       $dtkelompokproduksi = $this->objKelompokproduksi->find($id);

       // Cek jika data tidak ditemukan
       if (!$dtkelompokproduksi) {
           return redirect()->to(site_url('kelompokproduksi'))->with('error', 'Data tidak ditemukan');
       }

       // Ambil data rekening dari tabel interface1
        $ModelAntarmuka = new ModelAntarmuka();
        $dtinterface = $ModelAntarmuka->findAll(); // Mengambil semua data rekening

        // Kirim data ke view
        $data['dtkelompokproduksi'] = $dtkelompokproduksi;
        $data['dtinterface'] = $dtinterface; // Kirimkan data rekening ke view
       
       return view('kelompokproduksi/edit', $data);
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
            'id_kelproduksi' => $this->request->getVar('id_kelproduksi'),
            'kode_kelproduksi' => $this->request->getVar('kode_kelproduksi'),
            'nama_kelproduksi' => $this->request->getVar('nama_kelproduksi'),
            'id_interface' => $this->request->getVar('id_interface'),
        ];
        // Update data berdasarkan ID
        $this->objKelompokproduksi->update($id, $data);

        return redirect()->to(site_url('kelompokproduksi'))->with('Sukses', 'Data Berhasil Disimpan');
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
