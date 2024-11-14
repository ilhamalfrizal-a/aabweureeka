<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederSatuan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_satuan' => 'BL',
                'nama_satuan'    => 'BAL',
            ],
            [
                'kode_satuan' => 'BOX',
                'nama_satuan'    => 'BOX',
            ],
            [
                'kode_satuan' => 'BTL',
                'nama_satuan'    => 'BOTOL',
            ],
            [
                'kode_satuan' => 'DRUM',
                'nama_satuan'    => 'DRUM',
            ],
            [
                'kode_satuan' => 'GR',
                'nama_satuan'    => 'GRAM',
            ],
        ];

        $this->db->table('satuan1')->insertBatch($data);

    }
}
