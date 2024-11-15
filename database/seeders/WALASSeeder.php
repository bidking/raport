<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WALAS;

class WALASSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [

            [
                'nig' => '1122',
                'nama_walas' => 'rudi',
                'kelas_id' => 1,
                'password' => bcrypt('1122'),
            ],
            [
                'nig' => '1133',
                'nama_walas' => 'tari',
                'kelas_id' => 2,
                'password' => bcrypt('1133'),
            ],
        ];

        foreach ($data as $walas) {
            walas::create($walas);
        }
    }
}
