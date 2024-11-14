<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederStock extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_lokasi' => '02',
                'satuan_stock'    => '20 BL',
                'jml_harga' => '10000',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_lokasi' => '03',
                'satuan_stock'    => '10 BL',
                'jml_harga' => '20000',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_lokasi' => '01',
                'satuan_stock'    => '5 BL',
                'jml_harga' => '30000',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_lokasi' => '02',
                'satuan_stock'    => '10 BL',
                'jml_harga' => '40000',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_lokasi' => '03',
                'satuan_stock'    => '20 BL',
                'jml_harga' => '50000',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('stock1')->insertBatch($data);
    }
}
