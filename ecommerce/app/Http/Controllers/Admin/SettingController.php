<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function siteSetting() {
        $setting = DB::table('sitesetting')->first();
        return view('admin.setting.site_setting', compact('setting'));
    }

    public function updateSiteSetting(Request $request) {
        $id = $request->id;

        $data = array();
        $data['phone_one'] = $request->phone_one;
        $data['phone_tow'] = $request->phone_tow;
        $data['email'] = $request->email;
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['facebook'] = $request->facebook;
        $data['youtube'] = $request->youtube;
        $data['instagram'] = $request->instagram;
        $data['twitter'] = $request->twitter;

        DB::table('sitesetting')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Site Setting Updated Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

}
