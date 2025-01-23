<?php

use Config\Database;

if (!function_exists('checkClosePeriod')) {
    /**
     * Mengecek apakah periode tertentu sudah tutup buku
     *
     * @param int $month Bulan (1-12)
     * @param int $year Tahun
     * @return bool TRUE jika tutup buku, FALSE jika tidak
     */
    function checkClosePeriod($month, $year)
    {
        echo "Helper berhasil dipanggil!"; // Debug
        // Konversi bulan dan tahun menjadi string jika perlu
        $month = $month ?? date('m');
        $year = $year ?? date('Y');

        // Query ke tabel closed_periods
        $db = Database::connect();
        $cek = $db->table('closed_periods')
            ->where('month', $month)
            ->where('year', $year)
            ->where('is_closed', 1)
            ->get();

        // Cek apakah ada hasil
        return $cek->getNumRows() > 0;
    }
}
