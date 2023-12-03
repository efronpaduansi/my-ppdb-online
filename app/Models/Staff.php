<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roles;
class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';
    protected $fillable = [
        'role_id',
        'nama',
        'email',
        'password',
    ];

}
