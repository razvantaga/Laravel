<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category () {
        $category = Category::all();
        return view('admin.category.category', compact('category'));
    }

    public function store (Request $request) {
        $validate = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        $notification=array(
            'message'=>'Category Added Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function edit (Request $request, $id) {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit_category', compact('category'));
    }

    public function update (Request $request, $id) {
        $validate = $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $data = array();
        $data['category_name'] = $request->category_name;
        $update = DB::table('categories')->where('id', $id)->update($data);

        if($update) {
            $notification=array(
                'message'=>'Category Updated Successfully',
                'alert-type'=>'success'
                );
            return Redirect()->route('categories')->with($notification);
        } else {
            $notification=array(
                'message'=>'Nothing to update',
                'alert-type'=>'error'
                );
            return Redirect()->route('categories')->with($notification);
        }

    }

    public function delete (Request $request, $id) {
        DB::table('categories')->where('id', $id)->delete();

        $notification=array(
            'message'=>'Category Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
