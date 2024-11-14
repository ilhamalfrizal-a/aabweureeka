<?php

namespace App\Models;

use CodeIgniter\Model;

class PosNeracaModel extends Model
{
    protected $table = 'pos_neraca'; // Nama tabel di database
    protected $primaryKey = 'kode_posneraca'; // Primary key tabel

    // Field yang boleh diisi secara massal
    protected $allowedFields = ['kode', 'nama', 'klasifikasi', 'posisi'];

    // Jika ada timestamps di tabel, aktifkan ini
    // protected $useTimestamps = true;
    
}
