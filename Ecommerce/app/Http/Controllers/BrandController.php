<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    public function AllBrand() {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request) {
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|min:5',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'brand_name.required' => 'Please input brand name',
            'brand_name.min' => 'Brand name longer then 5 characters',
        ]);

        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location . $img_name;
        $brand_image->move($up_location, $img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' =>'Brand added successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Edit($id) {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function Update(Request $request, $id) {
        $validateData = $request->validate([
            'brand_name' => 'required|min:5',
        ],
        [
            'brand_name.required' => 'Please input brand name',
            'brand_name.min' => 'Brand name longer then 5 characters',
        ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.'.$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location . $img_name;
            $brand_image->move($up_location, $img_name);

            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' =>'Brand update successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' =>'Brand updated successfully',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function Delete($id) {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();

        $notification = array(
            'message' =>'Brand deleted successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function Multpic() {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }

    public function StoreImg(Request $request) {
        $image = $request->file('image');

        foreach ($image as $multi_img) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($multi_img->getClientOriginalExtension());
            $img_name = $name_gen . '.'.$img_ext;
            $up_location = 'image/multi/';
            $last_img = $up_location . $img_name;
            $multi_img->move($up_location, $img_name);

            Multipic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }

        return redirect()->back()->with('success', 'Images added successfully');
    }

    public function Logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'User logout');
    }
}
