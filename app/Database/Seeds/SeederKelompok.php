<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederKelompok extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_kelompok' => '001',
                'nama_kelompok'    => 'Bahan Aktif',
            ],
            [
                'kode_kelompok' => '002',
                'nama_kelompok'    => 'Bahan Baku',
            ],
            [
                'kode_kelompok' => '003',
                'nama_kelompok'    => 'Outer Pack',
            ],
            [
                'kode_kelompok' => '004',
                'nama_kelompok'    => 'Inner Box',
            ],
            [
                'kode_kelompok' => '005',
                'nama_kelompok'    => 'Outer Box',
            ],
        ];

        $this->db->table('kelompok1')->insertBatch($data);
    }
}
