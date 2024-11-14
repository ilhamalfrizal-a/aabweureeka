<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederPiutang extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_piutang' => '01',
                'nama_piutang'    => 'Awan',
                'lokasi_piutang' => 'Rumah',
                'tanggal_piutang' => '2024-06-20',
                'saldo_piutang' => '1000000',
            ],
            
        ];

        $this->db->table('setuppiutang1')->insertBatch($data);
    }
}
