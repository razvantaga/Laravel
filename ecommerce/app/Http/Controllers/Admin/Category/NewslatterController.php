<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewslatterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newslatter() {
        $newslatter = DB::table('newslatters')->get();
        return view('admin.newslatters.newslatters', compact('newslatter'));
    }

    public function delete ($id) {
        DB::table('newslatters')->where('id', $id)->delete();
        $notification=array(
            'message'=>'Newslatter Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function deleteAll(Request $request) {
        $ids = $request->get('ids');
        $dbs = DB::delete('delete from newslatters where id in (' . implode(",", $ids) . ')');
        $notification=array(
            'message'=>'All Newslatters Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

}
