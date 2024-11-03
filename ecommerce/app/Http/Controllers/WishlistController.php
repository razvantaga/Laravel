<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addItem($id) {
        $user_id = Auth::id();
        $check = DB::table('wishlists')->where('user_id', $user_id)->where('product_id', $id)->first();

        $data = array(
            'user_id' => $user_id,
            'product_id' => $id,
        );

        if (Auth::check()) {
            if ($check) {
                return response()->json(['error' => 'Product already on your wishlist']);
            } else {
                DB::table('wishlists')->insert($data);
                return response()->json(['success' => 'Product added to wishlist']);
            }
        } else {
            return response()->json(['error' => 'Please log in to your account first']);
        }
    }

    public function deleteItem(Request $request) {
        $user_id = Auth::id();
        $product_id = $request->input('product_id');
    
        $check = DB::table('wishlists')
            ->where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->delete();
    
        $notification = array(
            'message' => 'Your Product Delete Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    }
    
}

