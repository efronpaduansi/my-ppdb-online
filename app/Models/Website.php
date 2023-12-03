<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $table = 'website';

    protected $fillable = [
        'company_name', 'logo', 'address', 'email', 'phonenumber', 'city', 'state', 'zip', 'website', 'facebook', 'instagram', 'linkedin'
    ];
}
