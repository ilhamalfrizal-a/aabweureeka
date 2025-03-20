<?php

namespace App\Controllers\setup;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Database\Query;
use App\Models\setup\ModelKlasifikasi;
use App\Controllers\BaseController;

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

        $data['dtklasifikasi'] = $this->objKlasifikasi->findAll();
        return view('setup/klasifikasi/index', $data);
    }

    public function new()
    {
        return view('setup/klasifikasi/new');
    }
    public function create()
    {
        $data = $this->request->getPost();
        $data = [
            'kode_klasifikasi' => $this->request->getVar('kode_klasifikasi'),
            'nama_klasifikasi' => strtoupper($this->request->getVar('nama_klasifikasi')),
        ];
        $this->objKlasifikasi->insert($data);

        return redirect()->to(site_url('setup/klasifikasi'))->with('Sukses', 'Data Berhasil Disimpan');
    }
    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('klasifikasi1')->getWhere(['id_klasifikasi' => $id]);

            if ($query->resultID->num_rows > 0) {
                $data['dtklasifikasi'] = $query->getRow();
                return view('setup/klasifikasi/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        $data = [
            'kode_klasifikasi' => $this->request->getVar('kode_klasifikasi'),
            'nama_klasifikasi' => strtoupper($this->request->getVar('nama_klasifikasi')),
        ];
        $this->objKlasifikasi->update($id, $data);
        return redirect()->to(site_url('setup/klasifikasi'))->with('Sukses', 'Data Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $this->objKlasifikasi->delete($id);
        return redirect()->to(site_url('setup/klasifikasi'))->with('Sukses', 'Data Berhasil Dihapus');
    }
}
