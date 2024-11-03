<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function blogCategoryList () {
        $blogCategory = DB::table('post_category')->get();
        return view('admin.blog.category.index', compact('blogCategory'));
    }

    public function storeCategory(Request $request) {
        $validate = $request->validate([
            'category_name_en' => 'required|max:255',
            'category_name_in' => 'required|max:255',
        ]);

        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_in'] = $request->category_name_in;

        DB::table('post_category')->insert($data);
        $notification=array(
            'message'=>'Blog Category Added Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('all.blog.categorylist')->with($notification);
    }

    public function editCategory($id) {
        $blogCategory = DB::table('post_category')->where('id', $id)->first();
        return view('admin.blog.category.edit', compact('blogCategory'));
    }

    public function updateCategory(Request $request, $id) {
        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_in'] = $request->category_name_in;

        DB::table('post_category')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Blog Category Added Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('all.blog.categorylist')->with($notification);
    }

    public function deleteCategory($id) {
        DB::table('post_category')->where('id', $id)->delete();
        $notification=array(
            'message'=>'Blog Category Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('all.blog.categorylist')->with($notification);
    }

    public function blogPostList() {
        $posts = DB::table('posts')
                    ->join('post_category', 'posts.category_id', 'post_category.id')
                    ->select('posts.*', 'post_category.category_name_en', 'post_category.category_name_in')->get();
        return view('admin.blog.post.index', compact('posts'));
    }

    public function createPost() {
        $blogCategory = DB::table('post_category')->get();
        return view('admin.blog.post.create', compact('blogCategory'));
    }

    public function storePost(Request $request) {
        $data = array();
        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_in'] = $request->post_title_in;
        $data['category_id'] = $request->category_id;
        $data['details_en'] = $request->details_en;
        $data['details_in'] = $request->details_in;

        $post_image = $request->file('post_image');

        if($post_image) {
            $post_image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(300,300)->save('public/media/post/' . $post_image_name);
            $data['post_image'] = 'public/media/post/' . $post_image_name;

            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'Post Added Successfully',
                'alert-type'=>'success'
                );
            return Redirect()->route('all.blog.post')->with($notification);
        } else {
            $data['post_image'] = '';
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'Post Added without image Successfully',
                'alert-type'=>'success'
                );
            return Redirect()->route('all.blog.post')->with($notification);
        }
    }

    public function editPost($id) {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('admin.blog.post.edit', compact('post'));
    }

    public function updatePost(Request $request, $id) {
        $old_image = $request->old_image;

        $data = array();
        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_in'] = $request->post_title_in;
        $data['category_id'] = $request->category_id;
        $data['details_en'] = $request->details_en;
        $data['details_in'] = $request->details_in;

        $post_image = $request->file('post_image');

        if($post_image) {
            unlink($old_image);
            $post_image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(300,300)->save('public/media/post/' . $post_image_name);
            $data['post_image'] = 'public/media/post/' . $post_image_name;

            DB::table('posts')->where('id', $id)->update($data);
            $notification=array(
                'message'=>'Post Updated Successfully',
                'alert-type'=>'success'
                );
            return Redirect()->route('all.blog.post')->with($notification);
        } else {
            $data['post_image'] = $old_image;
            DB::table('posts')->where('id', $id)->update($data);
            $notification=array(
                'message'=>'Post Updated without image Successfully',
                'alert-type'=>'success'
                );
            return Redirect()->route('all.blog.post')->with($notification);
        }
    }

    public function deletePost($id) {
        $post = DB::table('posts')->where('id', $id)->first();
        $image = $post->post_image;

        unlink($image);
        DB::table('posts')->where('id', $id)->delete();

        $notification=array(
            'message'=>'Post Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('all.blog.post')->with($notification);
    }
}
