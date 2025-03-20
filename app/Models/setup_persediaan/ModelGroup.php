<?php

namespace App\Models\setup_persediaan;

use CodeIgniter\Model;

class ModelGroup extends Model
{
    protected $table            = 'group1';
    protected $primaryKey       = 'id_group';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['kode_group', 'nama_group', 'id_setupbuku'];

    public function getGroupWithSetupBuku()
    {
        return $this->select('group1.*, setupbuku1.nama_setupbuku')
            ->join('setupbuku1', 'setupbuku1.id_setupbuku = group1.id_setupbuku', 'left')
            ->findAll();
    }

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // // Dates
    // protected $useTimestamps = false;
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
