<?php

namespace App\Models\setup;

use CodeIgniter\Model;

class ModelPosneraca extends Model
{
    protected $table            = 'pos_neraca';
    protected $primaryKey       = 'id_posneraca';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_posneraca', 'kode_posneraca', 'id_klasifikasi', 'posisi_posneraca'];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];
    // Fungsi untuk mendapatkan semua data
    function getAll()
    {
        // Memulai builder untuk tabel 'pos_neraca' dengan alias 'p'
        $builder = $this->db->table('pos_neraca p');

        // Memilih kolom yang diperlukan dengan alias yang sesuai
        $builder->select('
        p.*,  
        sp.nama_klasifikasi
    ');

        // Melakukan JOIN dengan tabel 'klasifikasi1' untuk mendapatkan nama klasifikasi
        $builder->join('klasifikasi1 sp', 'p.id_klasifikasi = sp.id_klasifikasi', 'left');

        // Eksekusi query
        $query = $builder->get();

        // Mengembalikan hasil query sebagai array objek
        return $query->getResult();
    }

    // Fungsi untuk mendapatkan data berdasarkan id
    function getById($id)
    {
        $builder = $this->db->table('pos_neraca p');
        // Memilih kolom yang diperlukan dengan alias yang sesuai
        $builder->select('
         p.*,  
         sp.nama_klasifikasi
     ');

        // Melakukan JOIN dengan tabel 'setupsupplier1' untuk mendapatkan nama supplier
        $builder->join('klasifikasi1 sp', 'p.id_klasifikasi = sp.id_klasifikasi', 'left');

        // Tambahkan kondisi where untuk id_posneraca
        $builder->where('p.id_posneraca', $id);

        // Eksekusi query
        $query = $builder->get();

        // Kembalikan hasil query berupa satu baris data
        return $query->getRow();
    }
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
