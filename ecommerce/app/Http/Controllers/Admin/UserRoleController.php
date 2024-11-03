<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function allUsers() {
        $user = DB::table('admins')->where('type', 2)->get();
        return view('admin.role.all_role', compact('user'));
    }

    public function createAdmin() {
        return view('admin.role.create_role');
    }

    public function storeAdmin(Request $request) {
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['coupon'] = $request->coupon;
        $data['product'] = $request->product;
        $data['blog'] = $request->blog;
        $data['order'] = $request->order;
        $data['other'] = $request->other;
        $data['report'] = $request->report;
        $data['role'] = $request->role;
        $data['return'] = $request->return;
        $data['contact'] = $request->contact;
        $data['comment'] = $request->comment;
        $data['setting'] = $request->setting;
        $data['stock'] = $request->stock;
        $data['type'] = 2;

        DB::table('admins')->insert($data);

        $notification=array(
            'message'=>'Admin Created Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function editAdmin($id) {
        $user = DB::table('admins')->where('id', $id)->first();
        return view('admin.role.edit_role', compact('user'));
    }

    public function updateAdmin(Request $request) {
        $id = $request->id;

        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['category'] = $request->category;
        $data['coupon'] = $request->coupon;
        $data['product'] = $request->product;
        $data['blog'] = $request->blog;
        $data['order'] = $request->order;
        $data['other'] = $request->other;
        $data['report'] = $request->report;
        $data['role'] = $request->role;
        $data['return'] = $request->return;
        $data['contact'] = $request->contact;
        $data['comment'] = $request->comment;
        $data['setting'] = $request->setting;
        $data['stock'] = $request->stock;

        DB::table('admins')->where('id', $id)->update($data);

        $notification=array(
            'message'=>'Admin Updated Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.all.user')->with($notification);
    }

    public function deleteAdmin($id) {
        DB::table('admins')->where('id', $id)->delete();
        $notification=array(
            'message'=>'Admin Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
