<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/*
* Since Update 24/01/2023
*/
class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $fillable = [
        'thumbnail',
        'kode_jurusan',
        'nama_jurusan',
        'singkatan',
        'deskripsi',
    ];
}
