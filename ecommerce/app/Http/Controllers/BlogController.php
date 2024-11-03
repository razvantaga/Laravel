<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function blog() {
        $posts = DB::table('posts')
                    ->join('post_category', 'posts.category_id', 'post_category.id')
                    ->select('posts.*', 'post_category.category_name_en', 'post_category.category_name_in')->get();
        return view('pages.blog', compact('posts'));
    }

    public function blogSingle($id) {
        $posts = DB::table('posts')->where('id', $id)->get();
        return view('pages.blog_single', compact('posts'));
    }

    public function english() {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang', 'english');
        return redirect()->back();
    }

    public function hindi() {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang', 'hindi');
        return redirect()->back();
    }

    public function addReview(Request $request) {
        $data = array();
        $data['user_id'] = Auth::id();
        $data['blog_id'] = $request->blog_id;
        $data['review'] = $request->review;
        $data['created_at'] = Carbon::now();

        DB::table('reviews')->insert($data);
        $notification=array(
            'message'=>'Your Review Added Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
