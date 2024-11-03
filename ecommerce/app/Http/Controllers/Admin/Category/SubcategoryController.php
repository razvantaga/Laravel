<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Category;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategories () {
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')->join('categories', 'subcategories.category_id', 'categories.id')
                        ->select('subcategories.*', 'categories.category_name')->get();

        return view('admin.category.subcategory', compact('category', 'subcategory'));
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:55',
            'category_id' => 'required',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'Subcategory Added Successfully',
            'alert-type' => 'success'
        );
    
        return Redirect()->back()->with($notification);
    }

    public function edit($id) {
        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        $category = DB::table('categories')->get();

        return view('admin.category.edit_subcategory', compact('subcategory', 'category'));
    }

    public function update(Request $request, $id) {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Subcategory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('sub.categories')->with($notification);
    }

    public function delete (Request $request, $id) {
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Subcategory Deleted Successfully',
            'alert-type' => 'success'
        );
    
        return Redirect()->back()->with($notification);
    }
}
