<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(5);
        return view('admin.crud.projects', compact('projects'));
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
            'technology' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required|max:5',
        ]);

        $project_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($project_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/projects/';
        $last_img = $up_location . $img_name;
        $project_image->move($up_location, $img_name);

        Project::insert([
            'image' => $last_img,
            'name' => $request->name,
            'technology' => $request->technology,
            'description' => $request->description,
            'price' => $request->price,
            'created_at' => Carbon::now()
        ]);


        return redirect()->back()->with('success', 'Project created successfully!');
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
        $project = Project::find($id);
        $projects = Project::paginate(5);
        return view('admin.crud.projects', compact('project', 'projects'));
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
            'technology' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required|max:5',
        ]);

        // Procesează imaginea
        $project_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($project_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/projects/';
        $last_img = $up_location . $img_name;
        $project_image->move($up_location, $img_name);

        // Găsește și actualizează modelul
        $project = Project::findOrFail($id); // Folosește findOrFail pentru debugging mai bun
        $project->update([
            'image' => $last_img,
            'name' => $request->name,
            'technology' => $request->technology,
            'description' => $request->description,
            'price' => $request->price,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects.list')->with('success', 'Project deleted successfully!');
    }
}
