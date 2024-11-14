<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederPosNeraca extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_posneraca' => '100',
                'nama_posneraca'    => 'Kas',
                'posisi_posneraca'    => 'Debet',
            ],
            [
                'id_posneraca' => '101',
                'nama_posneraca'    => 'Bank',
                'posisi_posneraca'    => 'Debet',
            ],
            [
                'id_posneraca' => '102',
                'nama_posneraca'    => 'Piutang Usaha - Customer',
                'posisi_posneraca'    => 'Kredit',
            ],
            [
                'id_posneraca' => '103',
                'nama_posneraca'    => 'Piutang Usaha - Principal',
                'posisi_posneraca'    => 'Kredit',
            ],
            [
                'id_posneraca' => '104',
                'nama_posneraca'    => 'Piutang BG/CEK Mundur',
                'posisi_posneraca'    => 'Kredit',
            ],
        ];
        $this->db->table('pos_neraca')->insertBatch($data);
    }
}
