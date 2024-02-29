<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori_id' => 1,
                'barang_kode' => 'B001',
                'barang_nama' => 'Kipas',
                'harga_beli' => 80000,
                'harga_jual' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'B002',
                'barang_nama' => 'Remote',
                'harga_beli' => 40000,
                'harga_jual' => 60000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'B003',
                'barang_nama' => 'Popok',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'B004',
                'barang_nama' => 'Cologne Bayi',
                'harga_beli' => 15000,
                'harga_jual' => 17000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'B005',
                'barang_nama' => 'Serum',
                'harga_beli' => 20000,
                'harga_jual' => 23500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'B006',
                'barang_nama' => 'Sabun Muka',
                'harga_beli' => 31500,
                'harga_jual' => 35000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'B007',
                'barang_nama' => 'Beras',
                'harga_beli' => 15000,
                'harga_jual' => 18000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'B008',
                'barang_nama' => 'Minyak Goreng',
                'harga_beli' => 20000,
                'harga_jual' => 23500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Panci Stainless',
                'harga_beli' => 42500,
                'harga_jual' => 44000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'B010',
                'barang_nama' => 'Wajan',
                'harga_beli' => 16000,
                'harga_jual' => 19000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}

