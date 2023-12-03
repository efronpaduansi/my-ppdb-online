<?php

namespace App\Models;

use App\Models\User;
use App\Models\BankSoal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JawabanSoal extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jawaban_soal';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['soal_id', 'user_id', 'answer', 'status'];

    
    public function soal()
    {
        return $this->belongsTo(BankSoal::class, 'soal_id', 'id');
    }

    /**
     * Get the user that owns the JawabanSoal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}