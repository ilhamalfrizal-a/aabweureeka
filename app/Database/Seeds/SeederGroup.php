<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederGroup extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_group' => '001',
                'nama_group'    => 'Persediaan Bahan EGN',
                'rekening_group' => 'BRI',
            ],
            [
                'kode_group' => '002',
                'nama_group'    => 'Persediaan Bahan BMM',
                'rekening_group' => 'BRI',
            ],
            [
                'kode_group' => '003',
                'nama_group'    => 'Persediaan Bahan STU',
                'rekening_group' => 'BRI',
            ],
            [
                'kode_group' => '004',
                'nama_group'    => 'Persediaan Bahan EFN',
                'rekening_group' => 'BRI',
            ],
            [
                'kode_group' => '005',
                'nama_group'    => 'Persediaan Bahan EBP',
                'rekening_group' => 'BRI',
            ],
        ];

        $this->db->table('group1')->insertBatch($data);
    }
}
