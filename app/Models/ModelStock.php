<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStock extends Model
{
    protected $table            = 'stock1';
    protected $primaryKey       = 'id_stock';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_lokasi','id_group','id_kelompok','id_setupsupplier', 'kode_lokasi', 'nama_lokasi','kode', 'nama_barang', 'satuan_stock', 'jml_harga'];
    // protected $useTimestamps = true;

    function getAll() {
        $builder = $this->db->table('stock1');
        $builder->join('lokasi1', 'lokasi1.id_lokasi = stock1.id_lokasi');
        $query   = $builder->get();
        return $query->getResult();
    }

    public function getStockWithRelations()
{
    return $this->select('stock1.*, 
                          lokasi1.nama_lokasi, 
                          group1.nama_group, 
                          kelompok1.nama_kelompok, 
                          setupsupplier1.nama as nama_setupsupplier')
        ->join('lokasi1', 'lokasi1.id_lokasi = stock1.id_lokasi', 'left')
        ->join('group1', 'group1.id_group = stock1.id_group', 'left')
        ->join('kelompok1', 'kelompok1.id_kelompok = stock1.id_kelompok', 'left')
        ->join('setupsupplier1', 'setupsupplier1.id_setupsupplier = stock1.id_setupsupplier', 'left')
        ->findAll();
}


    // protected $useAutoIncrement = true;
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // // Dates
    // protected $dateFormat    = 'datetime';
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
