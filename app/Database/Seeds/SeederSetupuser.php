<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederSetupuser extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_setupuser' => '01',
                'nama_setupuser'    => 'Gudang 1',
                'check_setupuser' => 'Aktif',
            ],
            [
                'kode_setupuser' => '02',
                'nama_setupuser'    => 'Gudang 2',
                'check_setupuser' => 'Aktif',
            ],
            
        ];

        $this->db->table('setupuser1')->insertBatch($data);
    }
}
