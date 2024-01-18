<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class galery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id_user',
        'judul',
        'deskripsi',
        'tanggal',
        'foto',
    ];
}
