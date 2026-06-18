<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);

        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Jalankan seeder kategori terlebih dahulu
        $this->call(KategoriSeeder::class);

        // Jalankan seeder supplier
        $this->call(SupplierSeeder::class);

        // Kemudian jalankan seeder barang
        $this->call(BarangSeeder::class);

        // Jalankan seeder petugas gudang
        $this->call(PetugasSeeder::class);
    }
}
