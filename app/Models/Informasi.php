<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Informasi extends Model
{
    use HasFactory;
    protected $table = 'informasi';
    protected $fillable = [
        'penulis',
        'judul',
        'slug',
        'isi',
        'gambar',
        'kategori',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'penulis', 'id');
    }
}
