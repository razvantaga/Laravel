<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Carbon;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::paginate(5);
        return view('admin.crud.members', compact('members'));
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
            'name' => 'required|string|max:30',
            'email' => 'required|string|max:50',
            'phone' => 'required|string|max:15',
            'technology' => 'required|max:100',
            'profession' => 'required|max:40',
            'salary' => 'required|max:5',
        ]);


        $member_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($member_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/members/';
        $last_img = $up_location . $img_name;
        $member_image->move($up_location, $img_name);

        Member::insert([
            'image' => $last_img,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'technology' => $request->technology,
            'profession' => $request->profession,
            'salary' => $request->salary,
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
        $member = Member::find($id);
        $members = Member::paginate(5);
        return view('admin.crud.members', compact('member', 'members'));
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
            'name' => 'required|string|max:30',
            'email' => 'required|string|max:50',
            'phone' => 'required|string|max:15',
            'technology' => 'required|max:100',
            'profession' => 'required|max:40',
            'salary' => 'required|max:5',
        ]);

        // Procesează imaginea
        $member_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($member_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/members/';
        $last_img = $up_location . $img_name;
        $member_image->move($up_location, $img_name);

        // Găsește și actualizează modelul
        $member = Member::findOrFail($id); // Folosește findOrFail pentru debugging mai bun
        $member->update([
            'image' => $last_img,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'technology' => $request->technology,
            'profession' => $request->profession,
            'salary' => $request->salary,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.list')->with('success', 'Member deleted successfully!');
    }
}
