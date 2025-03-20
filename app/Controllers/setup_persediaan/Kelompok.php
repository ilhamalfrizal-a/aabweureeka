<?php

namespace App\Controllers\setup_persediaan;

use App\Models\setup_persediaan\ModelKelompok;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Kelompok extends ResourceController
{
    protected $objKelompok, $db;
    // INISIALISASI OBJECT DATA
    function __construct()
    {
        $this->objKelompok = new ModelKelompok();
        $this->db = \Config\Database::connect();
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtkelompok'] = $this->objKelompok->findAll();
        return view('setup_persediaan/kelompok/index', $data);
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
        $builder = $this->db->table('kelompok1');
        $query = $builder->get();
        $data['dtkelompok'] = $query->getResult();
        return view('setup_persediaan/kelompok/new', $data);
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
            'id_kelompok' => $this->request->getVar('id_kelompok'),
            'kode_kelompok' => $this->request->getVar('kode_kelompok'),
            'nama_kelompok' => $this->request->getVar('nama_kelompok'),
        ];
        $this->db->table('kelompok1')->insert($data);

        return redirect()->to(site_url('setup_persediaan/kelompok'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $dtkelompok = $this->objKelompok->find($id);

        // Cek jika data tidak ditemukan
        if (!$dtkelompok) {
            return redirect()->to(site_url('setup_persediaan/kelompok'))->with('error', 'Data tidak ditemukan');
        }


        // Lanjutkan jika semua pengecekan berhasil
        $data['dtkelompok'] = $dtkelompok;

        return view('kelompok/edit', $data);
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
            'id_kelompok' => $this->request->getVar('id_kelompok'),
            'kode_kelompok' => $this->request->getVar('kode_kelompok'),
            'nama_kelompok' => $this->request->getVar('nama_kelompok'),
        ];
        // Update data berdasarkan ID
        $this->objKelompok->update($id, $data);

        return redirect()->to(site_url('setup_persediaan/kelompok'))->with('Sukses', 'Data Berhasil Disimpan');
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
        $this->db->table('kelompok1')->where(['id_kelompok' => $id])->delete();
        return redirect()->to(site_url('setup_persediaan/kelompok'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
