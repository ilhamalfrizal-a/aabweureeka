<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederSetupsalesman extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_setupsalesman' => '01',
                'nama_setupsalesman'    => 'Awan',
                'lokasi_setupsalesman' => 'Rumah',
                'tanggal_setupsalesman' => '2024-06-20',
            ],
            
        ];

        $this->db->table('setupsalesman1')->insertBatch($data);
    }
}
