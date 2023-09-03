<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* Models update since 25/01/2023 */

class Berkas extends Model
{
    use HasFactory;
    protected $table = 'berkas';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
