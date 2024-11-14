<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederPindahlokasi extends Seeder
{
    public function run()
    {
        $data = [
            [
                'lokasi_asal' => '1',
                'lokasi_tujuan' => '2',
                'nota_pindah' => '0001',
                'id_stock' => '1',
                'nama_stock' => 'Kursi',
                'id_satuan' => '1',
                'qty_1' => '10',
                'qty_2' => '20',
                'tanggal' => '2024-06-20',

            ],
        ];

        $this->db->table('pindahlokasi1')->insertBatch($data);
    }
}
