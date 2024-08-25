<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Intervention\Image\Colors\Rgb\Channels\Red;

class HomeController extends Controller
{
    public function HomeSlider() {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider () {
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request) {
        
        $slider_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($slider_image->getClientOriginalExtension());
        $img_name = $name_gen . '.'.$img_ext;
        $up_location = 'image/slider/';
        $last_img = $up_location . $img_name;
        $slider_image->move($up_location, $img_name);

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('home.slider')->with('success', 'Slider added successfully');
    }

    public function EditSlider($id) {
        $sliders = Slider::find($id);
        return view('admin.slider.edit', compact('sliders'));
    }

    public function UpdateSlider($id, Request $request) {
        $old_image = $request->old_image;
        $slider_image = $request->file('image');
    
        if ($slider_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/slider/';
            $last_img = $up_location . $img_name;
            $slider_image->move($up_location, $img_name);
    
            if (file_exists($old_image)) {
                unlink($old_image);
            }
    
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'updated_at' => now(), 
            ]);
    
        } else {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => now(),
            ]);
        }
    
        return redirect()->route('home.slider')->with('success', 'Slider updated successfully');
    }

    public function DeleteSlider($id) {
        $delete = Slider::find($id)->delete();
        return redirect()->route('home.slider')->with('success', 'Slider deleted successfully!');
    }
    
}
