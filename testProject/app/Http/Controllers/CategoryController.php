<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.crud.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:50',
            'technology' => 'required|max:100',
            'description' => 'required|max:255',
        ]);


        $category_image = $request->file('logo');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($category_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/category/';
        $last_img = $up_location . $img_name;
        $category_image->move($up_location, $img_name);

        Category::insert([
            'category_logo' => $last_img,
            'category_name' => $request->name,
            'category_technology' => $request->technology,
            'category_description' => $request->description,
            'created_at' => Carbon::now()
        ]);


        return redirect()->back()->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('category_id', $id)->first();
        $categories = Category::paginate(5);
        return view('admin.crud.category', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'logo' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:50',
            'technology' => 'required|max:100',
            'description' => 'required|max:255',
        ]);

        // Procesează imaginea
        $category_image = $request->file('logo');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($category_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/category/';
        $last_img = $up_location . $img_name;
        $category_image->move($up_location, $img_name);

        // Găsește și actualizează modelul
        $category = Category::findOrFail($id); // Folosește findOrFail pentru debugging mai bun
        $category->update([
            'category_logo' => $last_img,
            'category_name' => $request->name,
            'category_technology' => $request->technology,
            'category_description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Category updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('category_id', $id)->firstOrFail();
        $category->delete();
        return redirect()->route('categories.list')->with('success', 'Category deleted successfully!');
    }

    
}
