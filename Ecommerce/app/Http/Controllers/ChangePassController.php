<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function changePassword() {
        return view('admin.body.change_password');
    }

    public function updatePassword(Request $request) {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',

        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success', 'Password is change successfully');
        } else {
            return redirect()->back()->with('error', 'Current password is invalid');
        }
    }

    public function updateProfile() {
        if(Auth::user()) {
            $user = User::find(Auth::user()->id);

            if($user) {
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }

    public function updateUserProfile(Request $request) {
        $user = User::find(Auth::user()->id);
        if($user) {
            $user->name = $request->name;
            $user->email = $request->email;

            $user->save();
            return redirect()->back()->with('success', 'User profile updated successfully');
        } else {
            return redirect()->back()->with('error', 'Error to update user profile');
        }
    }
}
