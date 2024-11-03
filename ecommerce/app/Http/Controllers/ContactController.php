<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
    
    public function contactPage() {
        return view('pages.contact');
    }

    public function contactForm(Request $request) {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['message'] = $request->message;
        DB::table('contact')->insert($data);
        $notification=array(
            'message'=>'Your Message Inserted Successfully',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function allMessages() {
        $messages = DB::table('contact')->get();
        return view('admin.contact.all_messages', compact('messages'));
    }
}
