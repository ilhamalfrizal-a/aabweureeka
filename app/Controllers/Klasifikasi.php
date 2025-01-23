<?php

namespace App\Controllers;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Database\Query;
use App\Models\ModelKlasifikasi;

class Klasifikasi extends BaseController
{
    protected $objKlasifikasi;  
    protected $db;
    function __construct()
    {
        $this->objKlasifikasi = new ModelKlasifikasi();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
              
        $data ['dtklasifikasi'] = $this->objKlasifikasi->findAll();
        return view('klasifikasi/index', $data);

    }
    
    public function new()
    {
        $data ['dtklasifikasi'] = $this->objKlasifikasi->findAll();
        return view('klasifikasi/new', $data);
    }
    public function store()
    {
        $data = $this->request->getPost();
        $data = [
            'kode_klasifikasi' => $this->request->getVar('kode_klasifikasi'),
            'nama_klasifikasi' => $this->request->getVar('nama_klasifikasi'),
        ];

        $this->db->table('klasifikasi1')->insert($data);

        return redirect()->to(site_url('klasifikasi'))->with('Sukses', 'Data Berhasil Disimpan');
    }
    public function edit($id = null)
    {
        if($id != null){
            $query = $this->db->table('klasifikasi1')->getWhere(['id_klasifikasi' => $id]);
           
            if ($query->resultID->num_rows > 0){
                $data['dtklasifikasi'] = $query->getRow();
                return view('klasifikasi/edit', $data);
            }else{
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

    }

    public function update($id)
    {
        $data = [
            'kode_klasifikasi' => $this->request->getVar('kode_klasifikasi'),
            'nama_klasifikasi' => $this->request->getVar('nama_klasifikasi'),
        ];
        $this->db->table('klasifikasi1')->where(['id_klasifikasi' => $id])->update($data);
        return redirect()->to(site_url('klasifikasi'))->with('Sukses', 'Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $this->db->table('klasifikasi1')->where(['id_klasifikasi' => $id])->delete();
        return redirect()->to(site_url('klasifikasi'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
   


