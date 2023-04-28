<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_gurus')->insert([
            "nip" => "001234",
            "nama" => "Evi Indah",
            "alamat" => "Ds Gondang",
            "mapel" => "IaaS",
            "kode_guru" => "10"
        ]);
        DB::table('data_gurus')->insert([
            "nip" => "002345",
            "nama" => "Samsul Hadi",
            "alamat" => "Ds Kebonagung",
            "mapel" => "Matematika",
            "kode_guru" => "11"
        ]);
        DB::table('data_gurus')->insert([
            "nip" => "003456",
            "nama" => "Nimas Setya Yaniar",
            "alamat" => "Ds Bangsal",
            "mapel" => "IoT",
            "kode_guru" => "12"
        ]);
        DB::table('data_gurus')->insert([
            "nip" => "004567",
            "nama" => "Dwi Ema",
            "alamat" => "Ds Mojoanyar",
            "mapel" => "Bhs.Indonesia",
            "kode_guru" => "13"
        ]);
        DB::table('data_gurus')->insert([
            "nip" => "005678",
            "nama" => " Bu Erna",
            "alamat" => "Ds Kutorejo",
            "mapel" => "PKN",
            "kode_guru" => "14"
        ]);
    }
}
