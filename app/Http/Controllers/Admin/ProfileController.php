<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website;
class ProfileController extends Controller
{
    public function index()
    {
        $web        = Website::get()->first();
        return view('backend.admin.profile.index', compact('web'));
    }

    
}
