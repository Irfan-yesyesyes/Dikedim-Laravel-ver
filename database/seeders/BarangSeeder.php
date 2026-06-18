<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Supplier;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user (or create one if needed)
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ]);
        }

        $barangs = [
            [
                'user_id' => $user->id,
                'kode' => 'BR001',
                'nama' => 'Laptop HP Pavilion',
                'kategori' => 'Elektronik',
                'kategori_id' => 1,
                'stok' => 15,
                'harga' => 7500000.00,
                'tanggal' => now()->subMonths(3),
                'tanggal_masuk' => now()->subMonths(3),
                'supplier' => 'PT Teknologi Sejahtera',
                'supplier_id' => 1,
                'keterangan' => 'Laptop untuk kebutuhan kampus',
                'lokasi' => 'Rak A1',
                'kondisi' => 'Baik'
            ],
            [
                'user_id' => $user->id,
                'kode' => 'BR002',
                'nama' => 'Monitor LED 24 inch',
                'kategori' => 'Elektronik',
                'kategori_id' => 1,
                'stok' => 8,
                'harga' => 1800000.00,
                'tanggal' => now()->subMonths(2),
                'tanggal_masuk' => now()->subMonths(2),
                'supplier' => 'PT Teknologi Sejahtera',
                'supplier_id' => 1,
                'keterangan' => 'Monitor untuk laboratorium komputer',
                'lokasi' => 'Rak B2',
                'kondisi' => 'Baik'
            ],
            [
                'user_id' => $user->id,
                'kode' => 'BR003',
                'nama' => 'Printer HP LaserJet',
                'kategori' => 'Elektronik',
                'kategori_id' => 1,
                'stok' => 3,
                'harga' => 3200000.00,
                'tanggal' => now()->subMonths(4),
                'tanggal_masuk' => now()->subMonths(4),
                'supplier' => 'PT Teknologi Sejahtera',
                'supplier_id' => 1,
                'keterangan' => 'Printer multi-fungsi untuk kantor',
                'lokasi' => 'Rak A3',
                'kondisi' => 'Rusak'
            ],
            // Furniture
            [
                'user_id' => $user->id,
                'kode' => 'BR004',
                'nama' => 'Meja Kerja Standar',
                'kategori' => 'Furniture',
                'kategori_id' => 2,
                'stok' => 25,
                'harga' => 450000.00,
                'tanggal' => now()->subMonths(6),
                'tanggal_masuk' => now()->subMonths(6),
                'supplier' => 'CV Elektronik Pusat',
                'supplier_id' => 2,
                'keterangan' => 'Meja kerja untuk ruang kelas',
                'lokasi' => 'Ruang Penyimpanan A',
                'kondisi' => 'Baik'
            ],
            [
                'user_id' => $user->id,
                'kode' => 'BR005',
                'nama' => 'Kursi Kantor Ergonomis',
                'kategori' => 'Furniture',
                'kategori_id' => 2,
                'stok' => 4,
                'harga' => 650000.00,
                'tanggal' => now()->subMonths(5),
                'tanggal_masuk' => now()->subMonths(5),
                'supplier' => 'CV Elektronik Pusat',
                'supplier_id' => 2,
                'keterangan' => 'Kursi dengan penyangga punggung',
                'lokasi' => 'Ruang Penyimpanan B',
                'kondisi' => 'Baik'
            ],
            // Stationery
            [
                'user_id' => $user->id,
                'kode' => 'BR006',
                'nama' => 'Kertas A4 (1 rim)',
                'kategori' => 'Stationery',
                'kategori_id' => 3,
                'stok' => 50,
                'harga' => 45000.00,
                'tanggal' => now()->subWeeks(2),
                'tanggal_masuk' => now()->subWeeks(2),
                'supplier' => 'Toko Barang Umum',
                'supplier_id' => 3,
                'keterangan' => 'Kertas putih standar',
                'lokasi' => 'Rak C1',
                'kondisi' => 'Baik'
            ],
            [
                'user_id' => $user->id,
                'kode' => 'BR007',
                'nama' => 'Pulpen Ballpoint',
                'kategori' => 'Stationery',
                'kategori_id' => 3,
                'stok' => 2,
                'harga' => 8000.00,
                'tanggal' => now()->subWeeks(1),
                'tanggal_masuk' => now()->subWeeks(1),
                'supplier' => 'Toko Barang Umum',
                'supplier_id' => 3,
                'keterangan' => 'Pulpen biru/hitam',
                'lokasi' => 'Rak C2',
                'kondisi' => 'Baik'
            ],
            // Peralatan Lab
            [
                'user_id' => $user->id,
                'kode' => 'BR008',
                'nama' => 'Mikroskop Binokuler',
                'kategori' => 'Peralatan Lab',
                'kategori_id' => 4,
                'stok' => 6,
                'harga' => 5000000.00,
                'tanggal' => now()->subMonths(8),
                'tanggal_masuk' => now()->subMonths(8),
                'supplier' => 'Distributor Kantor Sentral',
                'supplier_id' => 4,
                'keterangan' => 'Untuk praktik biologi',
                'lokasi' => 'Gudang Lab',
                'kondisi' => 'Baik'
            ],
            [
                'user_id' => $user->id,
                'kode' => 'BR009',
                'nama' => 'Beaker Glass 1L',
                'kategori' => 'Peralatan Lab',
                'kategori_id' => 4,
                'stok' => 12,
                'harga' => 150000.00,
                'tanggal' => now()->subMonths(3),
                'tanggal_masuk' => now()->subMonths(3),
                'supplier' => 'Distributor Kantor Sentral',
                'supplier_id' => 4,
                'keterangan' => 'Gelas ukur untuk kimia',
                'lokasi' => 'Gudang Lab',
                'kondisi' => 'Baik'
            ],
            // Buku & Media
            [
                'user_id' => $user->id,
                'kode' => 'BR010',
                'nama' => 'Buku Pemrograman PHP',
                'kategori' => 'Buku & Media',
                'kategori_id' => 5,
                'stok' => 18,
                'harga' => 125000.00,
                'tanggal' => now()->subMonths(2),
                'tanggal_masuk' => now()->subMonths(2),
                'supplier' => 'Supplier Mandiri Surabaya',
                'supplier_id' => 5,
                'keterangan' => 'Referensi pembelajaran PHP',
                'lokasi' => 'Rak D1',
                'kondisi' => 'Baik'
            ],
            [
                'user_id' => $user->id,
                'kode' => 'BR011',
                'nama' => 'Flashdisk 64GB',
                'kategori' => 'Elektronik',
                'kategori_id' => 1,
                'stok' => 22,
                'harga' => 85000.00,
                'tanggal' => now()->subMonths(1),
                'tanggal_masuk' => now()->subMonths(1),
                'supplier' => 'PT Teknologi Sejahtera',
                'supplier_id' => 1,
                'keterangan' => 'Penyimpanan data portable',
                'lokasi' => 'Rak B1',
                'kondisi' => 'Baik'
            ],
            [
                'user_id' => $user->id,
                'kode' => 'BR012',
                'nama' => 'Proyektor LED 3000 Lumens',
                'kategori' => 'Elektronik',
                'kategori_id' => 1,
                'stok' => 2,
                'harga' => 2500000.00,
                'tanggal' => now()->subMonths(7),
                'tanggal_masuk' => now()->subMonths(7),
                'supplier' => 'PT Teknologi Sejahtera',
                'supplier_id' => 1,
                'keterangan' => 'Untuk presentasi ruang besar',
                'lokasi' => 'Gudang Elektronik',
                'kondisi' => 'Hilang'
            ],
        ];

        foreach ($barangs as $barang) {
            // Check if already exists
            if (!Barang::where('kode', $barang['kode'])->exists()) {
                Barang::create($barang);
            }
        }
    }
}
