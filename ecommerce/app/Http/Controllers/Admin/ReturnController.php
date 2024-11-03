<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function returnRequest() {
        $order = DB::table('orders')->where('return_order', 1)->get();
        return view('admin.return.request', compact('order'));
    }

    public function approveRequest($id) {
        DB::table('orders')->where('id', $id)->update(['return_order' => 2]);
        $notification=array(
            'message'=>'Return Request Approved Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function allReturnRequest() {
        $order = DB::table('orders')->where('return_order', 2)->get();
        return view('admin.return.all_return', compact('order'));
    }
}
