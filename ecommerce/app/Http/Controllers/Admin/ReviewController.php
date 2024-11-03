<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function allReview() {
        $reviews = DB::table('reviews')
                        ->join('users', 'reviews.user_id', '=', 'users.id')
                        ->join('products', 'reviews.product_id', '=', 'products.id')
                        ->where('reviews.product_id', '!=', 'NULL')
                        ->select('reviews.*', 'users.name as user_name', 'products.product_name')
                        ->get();
        return view('admin.review.index', compact('reviews'));
    }

    public function deleteReview($id) {
        DB::table('reviews')->where('id', $id)->delete();
        $notification=array(
            'message'=>'Your Review Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function allBlogReview() {
        $reviews = DB::table('reviews')
                        ->join('users', 'reviews.user_id', '=', 'users.id')
                        ->join('posts', 'reviews.blog_id', '=', 'posts.id')
                        ->where('reviews.blog_id', '!=', 'NULL')
                        ->select('reviews.*', 'users.name as user_name', 'posts.id as id', 'posts.post_title_en as title')
                        ->get();
        return view('admin.review.blog', compact('reviews'));
    }
}
