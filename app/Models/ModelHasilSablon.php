<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHasilSablon extends Model
{
    protected $table            = 'hasilsablon1';
    protected $primaryKey       = 'id_sablon';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['nota_sablon', 'bahan_sablon', 'id_lokasi', 'id_setupsupplier', 'terpakai', 'rusak', 'nama_stock', 'id_satuan', 'qty_1', 'qty_2', 'jml_harga', 'tanggal_sablon', 'harga_satuan'];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // // Dates
    // protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';

    public function getDateById($id)
    {
        // Mengambil tanggal berdasarkan ID hasil_sablon
        $result = $this->select('date')->find($id);
        return $result ? $result['date'] : null;
    }
    
    function getAll()
{
        // Memulai builder untuk tabel 'hasilsablon1' dengan alias 'p'
        $builder = $this->db->table('hasilsablon1 p');
        
        // Memilih kolom yang diperlukan dengan alias yang sesuai
        $builder->select('
            p.*, 
            l1.nama_lokasi AS lokasi_asal, 
            sp.nama, 
            s.kode_satuan
        ');
        
        // Melakukan JOIN dengan tabel 'lokasi1' untuk mendapatkan nama lokasi asal
        $builder->join('lokasi1 l1', 'p.id_lokasi = l1.id_lokasi', 'left');
        
        // Melakukan JOIN dengan tabel 'setupsupplier1' untuk mendapatkan nama supplier
        $builder->join('setupsupplier1 sp', 'p.id_setupsupplier = sp.id_setupsupplier', 'left');
        
        // Melakukan JOIN dengan tabel 'satuan1' untuk mendapatkan kode satuan
        $builder->join('satuan1 s', 'p.id_satuan = s.id_satuan', 'left');
        
        // Eksekusi query
        $query = $builder->get();
        
        // Mengembalikan hasil query sebagai array objek
        return $query->getResult();

        return $this->findAll();
}


    function getById($id) {
        $builder = $this->db->table('bahansablon1 p');
        
        // Pilih kolom yang diperlukan, dengan join yang sesuai
        $builder->select('p.*, l1.nama_lokasi AS lokasi_asal, l2.nama_lokasi AS lokasi_tujuan, s.kode_satuan');
        $builder->join('lokasi1 l1', 'p.id_lokasi_asal = l1.id_lokasi');
        $builder->join('lokasi1 l2', 'p.id_lokasi_tujuan = l2.id_lokasi');
        $builder->join('satuan1 s', 'p.id_satuan = s.id_satuan');
        
        // Tambahkan kondisi where untuk id_bahan
        $builder->where('p.id_bahan', $id);
        
        $query = $builder->get();
        return $query->getRow(); // Mengembalikan satu baris sebagai objek
    }
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

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
