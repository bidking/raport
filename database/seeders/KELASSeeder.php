<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KELAS;
class KELASSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KELAS::create(['nama_kelas' => '12 RPL 1']);
        KELAS::create(['nama_kelas' => '12 RPL 2']); 
    }
}
