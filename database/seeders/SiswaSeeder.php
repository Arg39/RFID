<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create(['nis' => '2025001', 'nama' => 'Budi Santoso']);
        Siswa::create(['nis' => '2025002', 'nama' => 'Citra Lestari']);
        Siswa::create(['nis' => '2025003', 'nama' => 'Dedi Wijaya']);

    }
}
