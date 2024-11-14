<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederPelanggan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_pelanggan' => '01',
                'nama_pelanggan'    => 'Awan',
                'alamat_pelanggan' => 'Rumah',
                'kota_pelanggan' => 'Jakarta',
                'telp_pelanggan' => '08123456789',
                'plafond' => '1000000',
                'npwp' => '1234567890',
                'class_pelanggan' => '1',
                'tipe' => 'Exclude',
                'tanggal' => '2024-06-20',
                'saldo' => 'Saldo 1',
                
            ],
        ];

        $this->db->table('setuppelanggan1')->insertBatch($data);
    }
}
