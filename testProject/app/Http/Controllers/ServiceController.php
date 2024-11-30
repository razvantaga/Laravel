<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        $services = Service::paginate(5);
        return view('admin.crud.services', compact('categories', 'services'));
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
            'image' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:50',
            'id_category' => 'required',
            'technology' => 'required|max:50',
            'price' => 'required|max:4',
            'description' => 'required|max:255',
        ]);

        $service_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($service_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/service/';
        $last_img = $up_location . $img_name;
        $service_image->move($up_location, $img_name);

        Service::insert([
            'image' => $last_img,
            'name' => $request->name,
            'id_category' => $request->id_category,
            'technology' => $request->technology,
            'price' => $request->price,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Service created successfully!');
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
        $service = Service::find($id);
        $services = Category::paginate(5);
        return view('admin.crud.services', compact('services', 'service'));
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
            'image' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:50',
            'id_category' => 'required',
            'technology' => 'required|max:50',
            'price' => 'required|max:4',
            'description' => 'required|max:255',
        ]);

        $servcice_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($servcice_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/category/';
        $last_img = $up_location . $img_name;
        $servcice_image->move($up_location, $img_name);

        $category = Service::findOrFail($id);
        $category->update([
            'image' => $last_img,
            'name' => $request->name,
            'id_category' => $request->id_category,
            'technology' => $request->technology,
            'price' => $request->price,
            'description' => $request->description,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::find($id);
        $services->delete();
        return redirect()->route('services.list')->with('success', 'Service deleted successfully!');
    }
}
