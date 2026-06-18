<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            ['nama_kategori' => 'Elektronik', 'deskripsi' => 'Peralatan elektronik dan komputer'],
            ['nama_kategori' => 'Furniture', 'deskripsi' => 'Mebel dan peralatan kantor'],
            ['nama_kategori' => 'Stationery', 'deskripsi' => 'Alat tulis dan perlengkapan kantor'],
            ['nama_kategori' => 'Peralatan Lab', 'deskripsi' => 'Peralatan laboratorium dan praktik'],
            ['nama_kategori' => 'Buku & Media', 'deskripsi' => 'Buku, referensi, dan media pembelajaran'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
