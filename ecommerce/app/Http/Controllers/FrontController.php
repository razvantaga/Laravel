<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Newslatter;

class FrontController extends Controller
{
    public function storeNewslatter (Request $request) {
        $validate = $request->validate([
            'email' => 'required|unique:newslatters|max:55',
        ]);

        $newslatter = new Newslatter();
        $newslatter->email = $request->email;
        $newslatter->save();

        $notification=array(
            'message'=>'Thank you for subscribing',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    
    public function orderTracking(Request $request) {
        $code = $request->code;

        $track = DB::table('orders')->where('status_code', $code)->first();

        if($track) {
            return view('pages.tracking', compact('track'));
        } else {
            $notification=array(
                'message'=>'Status code invalid',
                'alert-type'=>'error'
                );
            return Redirect()->back()->with($notification);
        }
    }
    
    public function orderStatus() {
        return view('pages.status_order');
    }

    public function viewStatus(Request $request) {
        $track = DB::table('orders')->where('status_code', $request->code)->first();
        return view('pages.status_order', compact('track'));
    }

    public function myProfile() {
        return view('pages.user.myprofile');
    }

    public function myOrders() {
        return view('pages.user.myorders');
    }

    public function about() {
        return view('pages.about');
    }
}
