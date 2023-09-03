<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* Models update since 25/01/2023 */

class DataOrangTua extends Model
{
    use HasFactory;
    protected $table = 'data_orang_tua';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
