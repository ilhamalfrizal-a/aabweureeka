<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederSetupbuku extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_setupbuku' => '01',
                'nama_setupbuku'    => 'Gudang 1',
                'pos_neraca' => '3',
                'saldo_setupbuku' => '300000',
            ],
            [
                'kode_setupbuku' => '02',
                'nama_setupbuku'    => 'apaaa',
                'pos_neraca' => '5',
                'saldo_setupbuku' => '350000',
            ],
        ];

        $this->db->table('setupbuku1')->insertBatch($data);
    }
}
