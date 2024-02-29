<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            // Stok untuk Barang 1 (Kipas)
            [
                'barang_id' => 1,
                'user_id' => 1, // Admin
                'stok_tanggal' => now(),
                'stok_jumlah' => 50, // Jumlah stok yang dimiliki
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Stok untuk Barang 2 (Remote)
            [
                'barang_id' => 2,
                'user_id' => 2, // Manager
                'stok_tanggal' => now(),
                'stok_jumlah' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Stok untuk Barang 3 (Popok)
            [
                'barang_id' => 3,
                'user_id' => 3, // Staff/Kasir
                'stok_tanggal' => now(),
                'stok_jumlah' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Stok untuk Barang 4 (Cologne Bayi)
            [
                'barang_id' => 4,
                'user_id' => 1, // Admin
                'stok_tanggal' => now(),
                'stok_jumlah' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 5,
                'user_id' => 2, // Manager
                'stok_tanggal' => now(),
                'stok_jumlah' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Stok untuk Barang 6 (Sabun Muka)
            [
                'barang_id' => 6,
                'user_id' => 3, // Staff/Kasir
                'stok_tanggal' => now(),
                'stok_jumlah' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Stok untuk Barang 7 (Beras)
            [
                'barang_id' => 7,
                'user_id' => 1, // Admin
                'stok_tanggal' => now(),
                'stok_jumlah' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Stok untuk Barang 8 (Minyak Goreng)
            [
                'barang_id' => 8,
                'user_id' => 2, // Manager
                'stok_tanggal' => now(),
                'stok_jumlah' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Stok untuk Barang 9 (Panci Stainless)
            [
                'barang_id' => 9,
                'user_id' => 3, // Staff/Kasir
                'stok_tanggal' => now(),
                'stok_jumlah' => 110,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Stok untuk Barang 10 (Wajan)
            [
                'barang_id' => 10,
                'user_id' => 1, // Admin
                'stok_tanggal' => now(),
                'stok_jumlah' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('t_stok')->insert($data); 
    }
}
