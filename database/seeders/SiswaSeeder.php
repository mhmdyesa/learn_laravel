<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;


class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            "nama" => "PPLG 1",
            "slug" => "pplg-1",
        ]);
        Kelas::create([
            "nama" => "PPLG 2",
            "slug" => "pplg-2",
        ]);
        Kelas::create([
            "nama" => "PPLG 3",
            "slug" => "pplg-3",
        ]);
    }
}
