<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederSetupbank extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_setupbank' => '01',
                'nama_setupbank'    => 'Gudang 1',
                'rekening_setupbank' => '3',
            ],
            [
                'kode_setupbank' => '02',
                'nama_setupbank'    => 'apaaa',
                'rekening_setupbank' => '5',
            ],
        ];

        $this->db->table('setupbank1')->insertBatch($data);
    }
}
