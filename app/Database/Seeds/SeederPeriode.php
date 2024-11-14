<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederPeriode extends Seeder
{
    public function run()
    {
        $data = [
            [
                'periode_bulan' => 'Juni',
                'periode_tahun'    => '2023',
            ],
            [
                'periode_bulan' => 'Juli',
                'periode_tahun'    => '2024',
            ],
        ];

        $this->db->table('periode1')->insertBatch($data);
    }
}
