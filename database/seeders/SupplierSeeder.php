<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'nama' => 'PT Teknologi Sejahtera',
                'kontak' => '0812-3456-7890',
                'alamat' => 'Jl. Merdeka No. 123',
                'kota' => 'Jakarta',
                'email' => 'info@teknologi-sejahtera.com'
            ],
            [
                'nama' => 'CV Elektronik Pusat',
                'kontak' => '0898-7654-3210',
                'alamat' => 'Jl. Sudirman No. 456',
                'kota' => 'Bandung',
                'email' => 'cs@elektronik-pusat.id'
            ],
            [
                'nama' => 'Toko Barang Umum',
                'kontak' => '021-5555-6666',
                'alamat' => 'Jl. Gatot Subroto No. 789',
                'kota' => 'Jakarta',
                'email' => 'support@barang-umum.com'
            ],
            [
                'nama' => 'Distributor Kantor Sentral',
                'kontak' => '0274-1111-2222',
                'alamat' => 'Jl. Malioboro No. 100',
                'kota' => 'Yogyakarta',
                'email' => 'kantor@distributor-sentral.co.id'
            ],
            [
                'nama' => 'Supplier Mandiri Surabaya',
                'kontak' => '0315-9999-8888',
                'alamat' => 'Jl. Tunjungan No. 321',
                'kota' => 'Surabaya',
                'email' => 'sales@mandiri-surabaya.com'
            ]
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}

