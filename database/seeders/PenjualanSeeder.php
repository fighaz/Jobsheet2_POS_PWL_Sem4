<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'user_id' => 1, // Admin
                'pembeli' => 'Customer A',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Manager
                'pembeli' => 'Customer B',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Staff/Kasir
                'pembeli' => 'Customer C',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Penjualan 4
            [
                'user_id' => 1, // Admin
                'pembeli' => 'Customer D',
                'penjualan_kode' => 'PJ004',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Penjualan 5
            [
                'user_id' => 2, // Manager
                'pembeli' => 'Customer E',
                'penjualan_kode' => 'PJ005',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Penjualan 6
            [
                'user_id' => 3, // Staff/Kasir
                'pembeli' => 'Customer F',
                'penjualan_kode' => 'PJ006',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Penjualan 7
            [
                'user_id' => 1, // Admin
                'pembeli' => 'Customer G',
                'penjualan_kode' => 'PJ007',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Penjualan 8
            [
                'user_id' => 2, // Manager
                'pembeli' => 'Customer H',
                'penjualan_kode' => 'PJ008',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Penjualan 9
            [
                'user_id' => 3, // Staff/Kasir
                'pembeli' => 'Customer I',
                'penjualan_kode' => 'PJ009',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Penjualan 10
            [
                'user_id' => 1, // Admin
                'pembeli' => 'Customer J',
                'penjualan_kode' => 'PJ010',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
