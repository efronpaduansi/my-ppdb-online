<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* Models update since 25/01/2023 */
use App\Models\User;
use App\Models\StatusPendaftaran;
class DataDiri extends Model
{
    use HasFactory;
    protected $table = 'data_diri';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status_pendaftaran()
    {
        return $this->belongsTo(StatusPendaftaran::class, 'status_id', 'id');
    }
}
