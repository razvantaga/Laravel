<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Review;
use App\Models\Message;
use Illuminate\Support\Carbon;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    public function show_project($id) {
        $project = Project::find($id);
        return view('project', compact('project'));
    }

    public function add_review(Request $request) {
        $validated = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
            'full_name' => 'required|string|max:50',
            'email' => 'required|max:100',
            'message' => 'required|string|max:255',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/review/';
        $last_img = $up_location . $img_name;
        $image->move($up_location, $img_name);

        Review::insert([
            'image' => $last_img,
            'project_id' => $request->project_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }

    public function delete_review($id) {
        $project = Review::find($id);
        $project->delete();
        return redirect()->back()->with('success', 'Review deleted successfully!');
    }

    public function contact_us(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|max:100',
            'phone' => 'required|max:30',
            'subject' => 'required|in:General Inquiry,Technical Support,Website Feedback',
            'message' => 'required|max:255',
            
        ]);

        Message::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        $data = $request->only(['first_name', 'last_name', 'email', 'phone', 'subject', 'message']);
        Mail::to('razvantest@mail.com')->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Message sended successfully!');
    }
}
