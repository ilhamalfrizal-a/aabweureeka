<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederHarga extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_harga' => '001',
                'nama_barang'    => 'Label Sticker',
                'harga_jualexc' => '1000',
                'harga_jualinc' => '1000',
                'harga_beli' => '500',
            ],
            [
                'kode_harga' => '002',
                'nama_barang'    => 'Label Sticker',
                'harga_jualexc' => '1000',
                'harga_jualinc' => '1000',
                'harga_beli' => '500',
            ],
        ];

        $this->db->table('harga1')->insertBatch($data);
    }
}
