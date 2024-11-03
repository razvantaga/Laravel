<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brand() {
        $brand = Brand::all();
        return view('admin.category.brand', compact('brand'));
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $image = $request->file('brand_logo');
        if($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '_' . $ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path . $image_full_name;
            $success  = $image->move($upload_path, $image_full_name);

            $brand->brand_logo = $image_url;
            $brand->save();

            $notification=array(
                'message'=>'Brand Added Successfully',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        } else {
            $brand->save();
            $notification=array(
                'message'=>'Its done',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit ($id) {
        $brand = DB::table('brands')->where('id', $id)->first();
        return view('admin.category.edit_brand', compact('brand'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'brand_name' => 'required|max:55|unique:brands,brand_name,' . $id,
        ]);
    
        $brand = Brand::findOrFail($id);
        $oldlogo = $request->old_logo;
    
        $brand->brand_name = $request->brand_name;
    
        $image = $request->file('brand_logo');
        if ($image) {
            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path . $image_full_name;
    
            $image->move($upload_path, $image_full_name);
    
            $brand->brand_logo = $image_url;
        }
    
        $brand->save();
    
        $notification = array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'success'
        );
    
        return Redirect()->route('brands')->with($notification);
    }
    

    public function delete (Request $request, $id) {
        $data = DB::table('brands')->where('id', $id)->first();
        $image = $data->brand_logo;
        unlink($image);
        $brand = DB::table('brands')->where('id', $id)->delete();

        $notification=array(
            'message'=>'Brand Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
