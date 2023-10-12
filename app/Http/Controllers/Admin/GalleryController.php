<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'image_path' => 'required|image|mimes:png,jpg|max:1024',
        ]);

        if($validated->fails()){
            return redirect()->back()->with('error', 'Upss! Gagal menambah data.');
        }

        //Move uploaded image
        $imgName     = time() . rand(1000, 9999) . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('uploads/frontend'), $imgName);

        $gallery = new Gallery();
        $gallery->image_path = $imgName;
        $gallery->save();

        return redirect()->back()->with('success', 'Berhasil menambah data!');
    }
}
