<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembelian extends Model
{
    protected $table            = 'pembelian1';
    protected $primaryKey       = 'id_pembelian';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['tanggal', 'nota', 'supplier','TOP','tgl_jatuhtempo','tgl_invoice,','no_invoice','lokasi','nama_stock','satuan','qty_1','qty_2','harga_satuan','jml_harga','disc_1','disc_2','total','rekening','tipe','sub_total','disc_cash','ppn','grand_total','npwp','terbilang'];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getDateById($id)
    {
        // Mengambil tanggal berdasarkan ID hasil_sablon
        $result = $this->select('date')->find($id);
        return $result ? $result['date'] : null;
    }
    
    function getAll()
{
        $builder = $this->db->table('pembelian1 p');
            
        // Pilih kolom dari tabel utama dan tabel terkait
        $builder->select('
            p.*, 
            l1.nama_lokasi AS lokasi_asal, 
            sp.nama AS nama_supplier, 
            s.kode_satuan AS kode_satuan,
            b.nama_setupbank AS nama_setupbank
        ');
        
        // Join dengan tabel 'lokasi1' untuk mendapatkan nama lokasi asal
        $builder->join('lokasi1 l1', 'p.id_lokasi = l1.id_lokasi', 'left');
        
        // Join dengan tabel 'setupsupplier1' untuk mendapatkan nama supplier
        $builder->join('setupsupplier1 sp', 'p.id_setupsupplier = sp.id_setupsupplier', 'left');
        
        // Join dengan tabel 'satuan1' untuk mendapatkan kode satuan
        $builder->join('satuan1 s', 'p.id_satuan = s.id_satuan', 'left');

        // Join dengan tabel 'setupbank1' untuk mendapatkan nama bank
        $builder->join('setupbank1 b', 'p.id_setupbank = b.id_setupbank', 'left');
        
        return $builder->get()->getResult();

        return $this->findAll();
}


    function getById($id) {
        
        $builder = $this->db->table('pembelian1 p');
    
        // Pilih kolom dari tabel utama dan tabel terkait
        $builder->select('
            p.*, 
            l1.nama_lokasi AS lokasi_asal, 
            sp.nama AS nama_supplier, 
            s.kode_satuan AS kode_satuan,
            b.nama_setupbank AS nama_setupbank
        ');
        
        // Join dengan tabel 'lokasi1' untuk lokasi asal
        $builder->join('lokasi1 l1', 'p.id_lokasi = l1.id_lokasi', 'left');
        
        // Join dengan tabel 'setupsupplier1' untuk nama supplier
        $builder->join('setupsupplier1 sp', 'p.id_setupsupplier = sp.id_setupsupplier', 'left');
        
        // Join dengan tabel 'satuan1' untuk kode satuan
        $builder->join('satuan1 s', 'p.id_satuan = s.id_satuan', 'left');

        // Join dengan tabel 'setupbank1' untuk nama bank
        $builder->join('setupbank1 b', 'p.id_setupbank = b.id_setupbank', 'left');
        
        // Tambahkan kondisi where untuk id
        $builder->where('p.id_pembelian', $id);
        
        return $builder->get()->getRow();
    }

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
