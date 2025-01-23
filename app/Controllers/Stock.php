<?php

namespace App\Controllers;

use App\Models\ModelGroup;
use App\Models\ModelStock;
use App\Models\ModelLokasi;
use App\Models\ModelKelompok;
use App\Models\ModelSetupsupplier;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Stock extends ResourceController
{
    protected $objStock, $objLokasi, $db, $objKelompok, $objGroup, $objSetupsupplier;
    //  INISIALISASI OBJECT DATA
     function __construct()
     {
         $this->objStock = new ModelStock();
         $this->objLokasi = new ModelLokasi();
         $this->objKelompok = new ModelKelompok();
         $this->objGroup = new ModelGroup();
         $this->objSetupsupplier = new ModelSetupsupplier();
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
        $data['dtstock'] = $this->objStock->getStockWithRelations();
        $data['dtlokasi'] = $this->objLokasi->findAll();
        $data['dtgroup'] = $this->db->table('group1')->get()->getResult();
        $data['dtkelompok'] = $this->db->table('kelompok1')->get()->getResult();
        $data['dtsupplier'] = $this->db->table('setupsupplier1')->get()->getResult();
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
        $data['dtstock'] = $this->objStock->getStockWithRelations();
        $data['dtgroup'] = $this->db->table('group1')->get()->getResult();
        $data['dtkelompok'] = $this->db->table('kelompok1')->get()->getResult();
        $data['dtsupplier'] = $this->db->table('setupsupplier1')->get()->getResult();
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
            'kode' => $this->request->getVar('kode'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_group' => $this->request->getVar('id_group'),
            'id_kelompok' => $this->request->getVar('id_kelompok'),
            'id_setupsupplier' => $this->request->getVar('id_setupsupplier'),
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
         // Ambil data berdasarkan ID
       $dtstock = $this->objStock->find($id);

       // Cek jika data tidak ditemukan
       if (!$dtstock) {
           return redirect()->to(site_url('kelompok'))->with('error', 'Data tidak ditemukan');
       }


       // Lanjutkan jika semua pengecekan berhasil
       $data['dtstock'] = $dtstock;
       $data['dtlokasi'] = $this->objLokasi->findAll();
       $data['dtgroup'] = $this->db->table('group1')->get()->getResult();
       $data['dtkelompok'] = $this->db->table('kelompok1')->get()->getResult();
       $data['dtsupplier'] = $this->db->table('setupsupplier1')->get()->getResult();
       return view('stock/edit', $data);
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
            'id_stock' => $this->request->getVar('id_stock'),
            'id_lokasi' => $this->request->getVar('id_lokasi'),
            'kode' => $this->request->getVar('kode'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_group' => $this->request->getVar('id_group'),
            'id_kelompok' => $this->request->getVar('id_kelompok'),
            'id_setupsupplier' => $this->request->getVar('id_setupsupplier'),
            'satuan_stock' => $this->request->getVar('satuan_stock'),
            'satuan' => $this->request->getVar('satuan'),
            'jml_harga' => $this->request->getVar('jml_harga'),
            'tanggal' => $this->request->getVar('tanggal'),
        ];
        // Update data berdasarkan ID
        $this->objStock->update($id, $data);

        return redirect()->to(site_url('stock'))->with('Sukses', 'Data Berhasil Disimpan');
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
