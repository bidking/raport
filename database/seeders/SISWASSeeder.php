<?php

namespace Database\Seeders;

use App\Models\SISWAS;
use App\Models\kelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class SISWASSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'nis' => '1224001',
                'nama_siswa' => 'Arya',
                'kelas_id' => 1,  // Ganti dengan ID kelas yang sesuai
                'password' => bcrypt('1224001'),
            ],
            [
                'nis' => '1224002',
                'nama_siswa' => 'Amelia',
                'kelas_id' => 2,  // Ganti dengan ID kelas yang sesuai
                'password' => bcrypt('1224002'),
            ],
            [
                'nis' => '1224003',
                'nama_siswa' => 'Budi',
                'kelas_id' => 1,  // Ganti dengan ID kelas yang sesuai
                'password' => bcrypt('1224003'),
            ],
            [
                'nis' => '1224004',
                'nama_siswa' => 'Citra',
                'kelas_id' => 2,  // Ganti dengan ID kelas yang sesuai
                'password' => bcrypt('1224004'),
            ],
            [
                'nis' => '1224005',
                'nama_siswa' => 'Dani',
                'kelas_id' => 1,  // Ganti dengan ID kelas yang sesuai
                'password' => bcrypt('1224005'),
            ],
        ];

        // Melakukan iterasi untuk memasukkan data siswa ke database
        foreach ($data as $siswa) {
            SISWAS::create($siswa);
        }
    }
}
