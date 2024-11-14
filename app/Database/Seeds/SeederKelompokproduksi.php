<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederKelompokproduksi extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_kelproduksi' => '01',
                'nama_kelproduksi'    => 'EGN',
            ],
            [
                'kode_kelproduksi' => '02',
                'nama_kelproduksi'    => 'BMM',
            ],
            [
                'kode_kelproduksi' => '03',
                'nama_kelproduksi'    => 'STU',
            ],
            [
                'kode_kelproduksi' => '04',
                'nama_kelproduksi'    => 'EFN',
            ],
            [
                'kode_kelproduksi' => '05',
                'nama_kelproduksi'    => 'EBP',
            ],
        ];

        $this->db->table('kelompokproduksi1')->insertBatch($data);

    }
}
