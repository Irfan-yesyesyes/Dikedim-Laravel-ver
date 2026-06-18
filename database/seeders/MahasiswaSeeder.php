<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswas = [
            [
                'nim' => '2021001',
                'nama' => 'Ahmad Pratama',
                'email' => 'ahmad.pratama@student.com',
                'jurusan' => 'SI',
            ],
            [
                'nim' => '2021002',
                'nama' => 'Budi Santoso',
                'email' => 'budi.santoso@student.com',
                'jurusan' => 'TI',
            ],
            [
                'nim' => '2021003',
                'nama' => 'Citra Dewi',
                'email' => 'citra.dewi@student.com',
                'jurusan' => 'MI',
            ],
            [
                'nim' => '2021004',
                'nama' => 'Diana Kusuma',
                'email' => 'diana.kusuma@student.com',
                'jurusan' => 'SI',
            ],
            [
                'nim' => '2021005',
                'nama' => 'Eka Putra',
                'email' => 'eka.putra@student.com',
                'jurusan' => 'TI',
            ],
            [
                'nim' => '2021006',
                'nama' => 'Farhan Rizki',
                'email' => 'farhan.rizki@student.com',
                'jurusan' => 'MI',
            ],
            [
                'nim' => '2021007',
                'nama' => 'Gita Maharani',
                'email' => 'gita.maharani@student.com',
                'jurusan' => 'SI',
            ],
            [
                'nim' => '2021008',
                'nama' => 'Hendra Wijaya',
                'email' => 'hendra.wijaya@student.com',
                'jurusan' => 'TI',
            ],
            [
                'nim' => '2021009',
                'nama' => 'Indra Gunawan',
                'email' => 'indra.gunawan@student.com',
                'jurusan' => 'MI',
            ],
            [
                'nim' => '2021010',
                'nama' => 'Jasmine Putri',
                'email' => 'jasmine.putri@student.com',
                'jurusan' => 'SI',
            ],
            [
                'nim' => '2021011',
                'nama' => 'Kamal Hidayat',
                'email' => 'kamal.hidayat@student.com',
                'jurusan' => 'TI',
            ],
            [
                'nim' => '2021012',
                'nama' => 'Lina Sari',
                'email' => 'lina.sari@student.com',
                'jurusan' => 'MI',
            ],
        ];

        foreach ($mahasiswas as $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }
    }
}

