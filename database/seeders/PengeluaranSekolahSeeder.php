<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengeluaranSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengeluaran_sekolahs')->insert([
            "tanggal" => "11-10-2022 09:00",
            "unit" => "10 bangku",
            "total" => "1.000.000",
            "penanggung_jawab" => "pak nuh",
        ]);

        DB::table('pengeluaran_sekolahs')->insert([
            "tanggal" => "02-09-2022 12:12",
            "unit" => "10 kursi",
            "total" => "1.250.000",
            "penanggung_jawab" => "pak bas",
        ]);

        DB::table('pengeluaran_sekolahs')->insert([
            "tanggal" => "26-11-2022 10:10",
            "unit" => "1 mobil",
            "total" => "100.000.000",
            "penanggung_jawab" => "pak sam",
        ]);
    }
}
