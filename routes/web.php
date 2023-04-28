<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ListPerpustakaanController;
use App\Http\Controllers\PengeluaranSekolahController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\BayarBulananController;
use App\Models\BayarBulanan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/dataguru', [DataGuruController::class, 'index'])->name('dataguru.index');
    Route::post('/dataguru', [DataGuruController::class, 'store'])->name('dataguru.store');
    Route::get('/dataguru/{id}', [DataGuruController::class, 'show'])->name('dataguru.show');
    Route::put('/dataguru', [DataGuruController::class, 'update'])->name('dataguru.update');
    Route::delete('/dataguru/{id}', [DataGuruController::class, 'destroy'])->name('dataguru.destroy');

    // Tampil Absen Siswa
    Route::get('/absensiswa', [AbsensiController::class, 'index'])->name('absensiswa.index');
    // Tambah Absen Siswa
    Route::post('/absensiswa', [AbsensiController::class, 'store'])->name('absensiswa.store');    
    // Ambil Data Absen Siswa
    Route::get('/absensiswa/{id}', [AbsensiController::class, 'show'])->name('absensi.show');
    // Update Absensi
    Route::put('/absensiswa', [AbsensiController::class, 'update'])->name('absensiswa.update');
    // Hapus Absensi
    Route::delete('/absensiswa/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

    // Tampil Pengeluaran Sekolah
    Route::get('/pengeluaran', [PengeluaranSekolahController::class, 'index'])->name('pengeluaran.index');
    // Tambah Pengeluaran
    Route::post('/pengeluaran', [PengeluaranSekolahController::class, 'store'])->name('pengeluaran.store');
    // Tampil Data Pengeluaran Sekolah
    Route::get('/pengeluaran/{id}', [PengeluaranSekolahController::class, 'show'])->name('pengeluaran.show');
    // Update Pengeluaran Sekolah
    Route::put('/pengeluaran', [PengeluaranSekolahController::class, 'update'])->name('pengeluaran.update');
    //Hapus Pengeluaran Sekolah
    Route::delete('/pengeluaran/{id}', [PengeluaranSekolahController::class, 'destroy'])->name('pengeluaran.destroy');

    // Tampil Pinjam Buku
    Route::get('/pinjambuku', [ListPerpustakaanController::class, 'index'])->name('pinjambuku.index');
    // Simpan Peminjam Buku
    Route::post('/pinjambuku', [ListPerpustakaanController::class, 'store'])->name('pinjambuku.store');
    // Ambil Data Perpus
    Route::get('/pinjambuku/{id}', [ListPerpustakaanController::class, 'show'])->name('pinjambuku.show');

    // Tampil Kembalikan Buku
    Route::get('/kembalikanbuku', [ListPerpustakaanController::class, 'kembaliIndex'])->name('kembaliIndex');
    // Ambil Data Perpustakaan
    Route::get('/kembalikanbuku/{id}', [ListPerpustakaanController::class, 'kembaliShow'])->name('kembaliShow');
    // Kembalikan Buku
    Route::put('/kembalikanbuku', [ListPerpustakaanController::class, 'kembaliUpdate'])->name('kembaliUpdate');

    // Tampil Bayar Bulanan
    Route::get('/bayarbulanan', [BayarBulananController::class, 'index'])->name('bulanan.index');
    // Get Data
    Route::get('/bayarbulanan/{id}', [BayarBulananController::class, 'show'])->name('bulanan.show');
    Route::get('/bulanan/get/{id}', [BayarBulananController::class, 'showValue'])->name('bulanan.showValue');
    Route::put('/bayarTagihan', [BayarBulananController::class, 'update'])->name('bulanan.update');
    Route::put('/cancelbayarbulanan', [BayarBulananController::class, 'cancel'])->name('bulanan.cancel');
});
