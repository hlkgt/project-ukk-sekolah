<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BayarBulanan;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "Andika Firmansyah",
            "email" => "andika@gmail.com",
            "password" => bcrypt('andika123'),
            "jenis_kelamin" => "Laki-Laki",
            "kelas" => "XII SIJA 1",
            "no_absen" => "18"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Juli",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Agustus",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "September",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Oktober",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "November",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Desember",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);

        $user = User::create([
            "name" => "Irvan Maulana",
            "email" => "irvan@gmail.com",
            "password" => bcrypt('irvan123'),
            "jenis_kelamin" => "Laki-Laki",
            "kelas" => "XII SIJA 1",
            "no_absen" => "18"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Juli",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Agustus",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "September",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Oktober",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "November",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Desember",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);


        $user = User::create([
            "name" => "Leo Marselio",
            "email" => "leo@gmail.com",
            "password" => bcrypt('leo123'),
            "jenis_kelamin" => "Laki-Laki",
            "kelas" => "XII SIJA 1",
            "no_absen" => "18"
        ]);

        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Juli",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Agustus",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "September",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Oktober",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "November",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Desember",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);

        $user = User::create([
            "name" => "Ayupri Anggita",
            "email" => "ayupri@gmail.com",
            "password" => bcrypt('anggi123'),
            "jenis_kelamin" => "Laki-Laki",
            "kelas" => "XII SIJA 1",
            "no_absen" => "18"
        ]);

        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Juli",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Agustus",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "September",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Oktober",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "November",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Desember",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);

        $user = User::create([
            "name" => "Novarita Afrela",
            "email" => "nova@gmail.com",
            "password" => bcrypt('nova123'),
            "jenis_kelamin" => "Laki-Laki",
            "kelas" => "XII SIJA 1",
            "no_absen" => "18"
        ]);

        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Juli",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Agustus",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "September",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Oktober",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "November",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Desember",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);

        $user = User::create([
            "name" => "Printa Imelda",
            "email" => "printa@gmail.com",
            "password" => bcrypt('printa123'),
            "jenis_kelamin" => "Laki-Laki",
            "kelas" => "XII SIJA 1",
            "no_absen" => "18"
        ]);

        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Juli",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Agustus",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "September",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Oktober",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "November",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Desember",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);

        $user = User::create([
            "name" => "Riska Agustina",
            "email" => "riska@gmail.com",
            "password" => bcrypt('riska123'),
            "jenis_kelamin" => "Laki-Laki",
            "kelas" => "XII SIJA 1",
            "no_absen" => "18"
        ]);

        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Juli",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Agustus",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "September",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Oktober",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "November",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
        $tagihan = BayarBulanan::create([
            "user_id" => $user->id,
            "bulan" => "Desember",
            "tahun" => "2022",
            "status_pembayaran" => "Belum Bayar",
            "total_tagihan" => "125.000"
        ]);
    }
}
