<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederLokasi extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_lokasi' => '01',
                'nama_lokasi'    => 'Gudang 1',
            ],
            [
                'kode_lokasi' => '02',
                'nama_lokasi'    => 'Gudang 2',
            ],
            [
                'kode_lokasi' => '03',
                'nama_lokasi'    => 'Gudang 3',
            ],
            [
                'kode_lokasi' => '04',
                'nama_lokasi'    => 'Gudang 4',
            ],
            [
                'kode_lokasi' => '05',
                'nama_lokasi'    => 'Gudang 5',
            ],
        ];

        $this->db->table('lokasi1')->insertBatch($data);
    }
}
