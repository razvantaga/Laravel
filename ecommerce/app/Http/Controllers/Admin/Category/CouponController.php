<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function coupon () {
        $coupon = DB::table('coupons')->get();
        return view('admin.coupon.coupon', compact('coupon'));
    }

    public function store (Request $request) {
        $data = array();
        $data['coupons'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->insert($data);
        $notification=array(
            'message'=>'Coupon Added Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function update (Request $request, $id) {
        $data = array();
        $data['coupons'] = $request->coupons;
        $data['discount'] = $request->discount;
        $update = DB::table('coupons')->where('id', $id)->update($data);

        if($update) {
            $notification=array(
                'message'=>'Coupon Updated Successfully',
                'alert-type'=>'success'
                );
            return Redirect()->route('admin.coupon')->with($notification);
        } else {
            $notification=array(
                'message'=>'Nothing to update',
                'alert-type'=>'error'
                );
            return Redirect()->route('admin.coupon')->with($notification);
        }
    }

    public function edit($id) {
        $coupon = DB::table('coupons')->where('id', $id)->first();
        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    public function delete (Request $request, $id) {
        DB::table('coupons')->where('id', $id)->delete();
        $notification=array(
            'message'=>'Coupon Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
