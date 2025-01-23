<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGroup extends Model
{
    protected $table            = 'group1';
    protected $primaryKey       = 'id_group';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['kode_group', 'nama_group', 'id_interface'];

    public function getAll()
    {
        return $this->findAll(); // Mengambil semua data dari tabel lokasi1
    }

    public function getGroupWithInterface()
    {
        return $this->select('group1.*, interface1.rekening_biaya')
                    ->join('interface1', 'interface1.id_interface = group1.id_interface', 'left')
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
