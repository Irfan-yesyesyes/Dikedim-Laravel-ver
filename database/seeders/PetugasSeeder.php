<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petugases = [
            [
                'nip' => '2020001',
                'nama' => 'Budi Sutrisno',
                'email' => 'budi.sutrisno@dikedim.com',
                'jabatan' => 'Kepala Gudang',
                'no_telepon' => '081234567890',
            ],
            [
                'nip' => '2020002',
                'nama' => 'Siti Rohayah',
                'email' => 'siti.rohayah@dikedim.com',
                'jabatan' => 'Supervisor',
                'no_telepon' => '081234567891',
            ],
            [
                'nip' => '2020003',
                'nama' => 'Ahmad Wijaya',
                'email' => 'ahmad.wijaya@dikedim.com',
                'jabatan' => 'Petugas Gudang',
                'no_telepon' => '081234567892',
            ],
            [
                'nip' => '2020004',
                'nama' => 'Hendra Kusuma',
                'email' => 'hendra.kusuma@dikedim.com',
                'jabatan' => 'Petugas Gudang',
                'no_telepon' => '081234567893',
            ],
            [
                'nip' => '2020005',
                'nama' => 'Dina Marlina',
                'email' => 'dina.marlina@dikedim.com',
                'jabatan' => 'Admin',
                'no_telepon' => '081234567894',
            ],
            [
                'nip' => '2020006',
                'nama' => 'Rinto Harahap',
                'email' => 'rinto.harahap@dikedim.com',
                'jabatan' => 'Petugas Gudang',
                'no_telepon' => '081234567895',
            ],
            [
                'nip' => '2020007',
                'nama' => 'Lina Sartika',
                'email' => 'lina.sartika@dikedim.com',
                'jabatan' => 'Petugas Gudang',
                'no_telepon' => '081234567896',
            ],
            [
                'nip' => '2020008',
                'nama' => 'Yanto Hermawan',
                'email' => 'yanto.hermawan@dikedim.com',
                'jabatan' => 'Supervisor',
                'no_telepon' => '081234567897',
            ],
        ];

        foreach ($petugases as $petugas) {
            Petugas::create($petugas);
        }
    }
}

