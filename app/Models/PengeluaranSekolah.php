<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranSekolah extends Model
{
    use HasFactory;

    protected $table = "pengeluaran_sekolahs";

    protected $fillable = ['tanggal', 'unit', 'total', 'penanggung_jawab'];
}
