<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function newOrder() {
        $order = DB::table('orders')->where('status', 0)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function viewOrder($id) {
        $order = DB::table('orders')
                    ->join('users', 'orders.user_id', 'users.id')
                    ->select('orders.*', 'users.name', 'users.phone')
                    ->where('orders.id', $id)->first();
        $shipping = DB::table('shipping')->where('order_id', $id)->first();
        $details = DB::table('orders_details')
                    ->join('products', 'orders_details.product_id', 'products.id')
                    ->select('orders_details.*', 'products.product_code', 'products.image_one')
                    ->where('orders_details.order_id', $id)->get();
        return view('admin.order.view_order', compact('order', 'shipping', 'details'));
    }

    public function PaymentAccept ($id) {
        DB::table('orders')->where('id', $id)->update(['status' => 1]);
        $notification=array(
            'message'=>'Payment Accepted',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.neworder')->with($notification);
    }

    public function deliveryProcess($id) {
        DB::table('orders')->where('id', $id)->update(['status' => 2]);
        $notification=array(
            'message'=>'Sent to delivery',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.accept.payment')->with($notification);
    }

    public function deliveryDone($id) {

        $product = DB::table('orders_details')->where('order_id', $id)->get();
        foreach($product as $row) {
            DB::table('products')->where('id', $row->product_id)->update(['product_quantity' => DB::raw('product_quantity - ' . $row->quantity)]);
        }

        DB::table('orders')->where('id', $id)->update(['status' => 3]);
        $notification=array(
            'message'=>'Product delivered successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.success.payment')->with($notification);
    }

    public function PaymentCancel ($id) {
        DB::table('orders')->where('id', $id)->update(['status' => 4]);
        $notification=array(
            'message'=>'Payment Canceled',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.neworder')->with($notification);
    }

    public function acceptPayment() {
        $order = DB::table('orders')->where('status', 1)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function processPayment () {
        $order = DB::table('orders')->where('status', 2)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function successPayment () {
        $order = DB::table('orders')->where('status', 3)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function cancelPayment() {
        $order = DB::table('orders')->where('status', 4)->get();
        return view('admin.order.pending', compact('order'));
    }
}
