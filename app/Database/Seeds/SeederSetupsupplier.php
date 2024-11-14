<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederSetupsupplier extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode' => '01',
                'nama'    => 'Awan',
                'alamat' => 'Rumah',
                'telepon' => '08123456789',
                'contact_person' => 'Awan',
                'npwp' => '1234567890',
                'tanggal' => '2024-06-20',
                'saldo' => 'Saldo 1',
                'tipe' => 'Exclude',
            ],
            
        ];

        $this->db->table('setupsupplier1')->insertBatch($data);
    }
}
