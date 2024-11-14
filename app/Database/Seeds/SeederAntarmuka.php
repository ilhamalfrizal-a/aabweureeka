<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAntarmuka extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kas_interface' => '123',
                'biaya' => '111',
                'hutang' => '222',
                'hpp' => '333',
                'terima_mundur' => '444',
                'laba_ditahan' => '555',
                'hutang_lancar' => '666',
                'neraca_laba' => '777',
                'piutang_salesman' => '888',
                'rekening_biaya' => '999',
                'piutang_dagang' => '000',
                'penjualan' => '111',
                'retur_penjualan' => '222',
                'diskon_penjualan' => '333',
                'laba_bulan' => '444',
                'laba_tahun' => '555',
                'potongan_pembelian' => '666',
                'ppn_masukan' => '777',
                'ppn_keluaran' => '888',
                'potongan_penjualan' => '999',
                'potongan_penjualan' => '222',
                'bank' => '333',
            ],
            [
                'kas_interface' => '156',
                'biaya' => '000',
                'hutang' => '333',
                'hpp' => '323',
                'terima_mundur' => '4744',
                'laba_ditahan' => '55535',
                'hutang_lancar' => '66689',
                'neraca_laba' => '77709',
                'piutang_salesman' => '867588',
                'rekening_biaya' => '99119',
                'piutang_dagang' => '002340',
                'penjualan' => '114351',
                'retur_penjualan' => '253222',
                'diskon_penjualan' => '33533',
                'laba_bulan' => '445564',
                'laba_tahun' => '55755',
                'potongan_pembelian' => '623466',
                'ppn_masukan' => '772357',
                'ppn_keluaran' => '882358',
                'potongan_penjualan' => '992359',
                'potongan_penjualan' => '222352',
                'bank' => '346533',
            ],
           
        ];

        $this->db->table('interface1')->insertBatch($data);
    }
}
