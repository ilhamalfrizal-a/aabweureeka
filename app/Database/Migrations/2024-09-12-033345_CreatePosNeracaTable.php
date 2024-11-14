<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePosNeracaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_posneraca' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'nama_posneraca' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'kode_klasifikasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 6,
            ],    
            // 'klasifikasi' => [
            //     'type' => 'VARCHAR',
            //     'constraint' => 50,
            //     'null' => false,
            // ],
            'posisi_posneraca' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ],
        ]);
    
        // Menentukan primary key
        $this->forge->addKey('id_posneraca', true);
        
        // Membuat tabel
        $this->forge->createTable('pos_neraca');
    
    }

    public function down()
    {
        $this->forge->dropTable('pos_neraca');
    }
}
