<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederKlasifikasi extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_klasifikasi' => '1',
                'nama_klasifikasi'    => 'Aktiva',
            ],
            [
                'kode_klasifikasi' => '2',
                'nama_klasifikasi'    => 'Kewajiban',
            ],
            [
                'kode_klasifikasi' => '3',
                'nama_klasifikasi'    => 'Modal',
            ],
            [
                'kode_klasifikasi' => '4',
                'nama_klasifikasi'    => 'Pendapatan',
            ],
            [
                'kode_klasifikasi' => '5',
                'nama_klasifikasi'    => 'Beban',
            ],
        ];

        // Simple Queries
    // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        // $this->db->table('klasifikasi1')->insert($data);
        $this->db->table('klasifikasi1')->insertBatch($data);
    }
}
