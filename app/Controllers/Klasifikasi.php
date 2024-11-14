<?php

namespace App\Controllers;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Database\Query;

class Klasifikasi extends BaseController
{
    public function index()
    {
              
        $builder = $this->db->table('klasifikasi1');
        $query = $builder->get();
        
        $query = $this->db->query("SELECT * FROM klasifikasi1");
        $data['dtklasifikasi'] = $query->getResult();
        return view('klasifikasi/index', $data);

        // dd($query->getResult());

        // dd($query);
        return view('klasifikasi/index');
    }
    
    public function new()
    {
        return view('klasifikasi/new');
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
   


