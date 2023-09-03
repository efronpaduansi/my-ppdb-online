<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataDiri;
class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['added_from', 'nama_lengkap', 'nisn', 'tempat_lahir', 'tanggal_lahir'
        , 'jenis_kelamin', 'agama', 'no_hp', 'email'];

    public function siswa()
    {
        return $this->belongsTo(DataDiri::class, 'added_from', 'id');
    }
}
