<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederSetupbiaya extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_setupbiaya' => '01',
                'nama_setupbiaya'    => 'Gudang 1',
                'rekening_setupbiaya' => '3',
            ],
            [
                'kode_setupbiaya' => '02',
                'nama_setupbiaya'    => 'apaaa',
                'rekening_setupbiaya' => '5',
            ],
        ];

        $this->db->table('setupbiaya1')->insertBatch($data);
    }
}
