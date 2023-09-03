<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Slider;

class WebsiteController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $web = Website::get()->first();
        return view('backend.admin.setting.index', compact('web', 'sliders'));
    }

    public function company(Request $request, $id = 1)
    {
        $validated = $request->validate([
            'company_name'  => 'required',
            'logo'          => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'address'       =>  'required'
        ]);
        if($validated){
            $logoName = time() . rand(1000, 9999) . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/frontend'), $logoName);

            $web = Website::find($id);
            $web->company_name  = $request->company_name;
            $web->logo          = $logoName;
            $web->address       = $request->address;
            $web->update();
            return redirect()->route('website.setting.index')->with('success', 'Perubahan berhasil di simpan!');
        }else{
            return error;
        }
    }

    public function update(Request $request, $id)
    {
        $web                    = Website::find($id);
        $web->email             = $request->email;
        $web->phonenumber       = $request->phonenumber;
        $web->city              = $request->city;
        $web->state             = $request->state;
        $web->zip               = $request->zip;
        $web->website           = $request->website;
        $web->facebook          = $request->facebook;
        $web->instagram         = $request->instagram;
        $web->linkedin          = $request->linkedin;
        $web->update();
        return redirect()->route('website.setting.index')->with('success', 'Perubahan berhasil di simpan!');
    }

    public function sliders(Request $request)
    {
        $validated = $request->validate([
            'image'             => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'title'             => 'required',
            'description'       =>  'required',
            'button_link'       => 'required',
            'button_text'       => 'required'
        ]);

        if($validated){
            $imgName     = time() . rand(1000, 9999) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/frontend'), $imgName);

            $slider = new Slider();
            $slider->image          = $imgName;
            $slider->title          = $request->title;
            $slider->description    = $request->description;
            $slider->button_link    = $request->button_link;
            $slider->button_text    = $request->button_text;
            $slider->save();
            return redirect()->route('website.setting.index')->with('success', 'Perubahan berhasil di simpan!');
        }else{
            return error;
        }
        
    }

    public function sliderDisable(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->is_active = 0;
        $slider->update();
        return redirect()->route('website.setting.index')->with('success', 'Perubahan berhasil di simpan!');
    }

    public function sliderDestroy(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('website.setting.index')->with('success', 'Perubahan berhasil di simpan!');
    }
}
