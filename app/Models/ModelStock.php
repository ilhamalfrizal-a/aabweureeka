<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStock extends Model
{
    protected $table            = 'stock1';
    protected $primaryKey       = 'id_stock';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_lokasi', 'kode_lokasi', 'nama_lokasi', 'satuan_stock', 'jml_harga'];
    protected $useTimestamps = true;

    function getAll() {
        $builder = $this->db->table('stock1');
        $builder->join('lokasi1', 'lokasi1.id_lokasi = stock1.id_lokasi');
        $query   = $builder->get();
        return $query->getResult();
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
    protected $createdField  = 'created_at';
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
