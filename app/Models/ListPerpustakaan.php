<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPerpustakaan extends Model
{
    use HasFactory;

    protected $table = 'list_perpustakaans';

    protected $guarded = [];
}
