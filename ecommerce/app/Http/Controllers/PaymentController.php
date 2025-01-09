<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function payment(Request $request) {
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;

        return view('pages.payment.confirm');
        
        if($request->payment == 'credit') {
            $this->stripe($request);
            return view('pages.payment.confirm', compact('data'));
        } elseif($request->payment == 'cash') {
            $this->cash($request);
            return view('pages.payment.confirm', compact('data'));
        }
    }

    public function stripe(Request $request) {
        $email = Auth::user()->email;
        $total = $request->total;

        \Stripe\Stripe::setApiKey('sk_test_51Q7E85G6ph2S2MBp4P22qAj88Y9Kao47pgxqTWi89CCIKEDZRx3X9JTGIapM1sUpD0xnadXSv3db0Okheg7pMDfA00JIIv8LtU');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total*100,
            'currency' => 'usd',
            'description' => 'e-commerce',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        $data = array();
        $data['user_id'] = Auth::id();
        $data['payment_id'] = $charge->payment_method;
        $data['paying_amount'] = $charge->amount;
        $data['blnc_transection'] = $charge->balance_transaction;
        $data['stripe_order_id'] = $charge->metadata->order_id;
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_type'] = $request->payment_type;
        $data['status_code'] = mt_rand(100000,999999);

        if(Session::has('coupons')) {
            $data['subtotal'] = Session::get('coupons')['balance'];
        } else {
            $data['subtotal'] = Cart::Subtotal();
        }
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);

        Mail::to($email)->send(new InvoiceMail($data));

        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->name;
        $shipping['ship_phone'] = $request->phone;
        $shipping['ship_email'] = $request->email;
        $shipping['ship_address'] = $request->address;
        $shipping['ship_city'] = $request->city;
        DB::table('shipping')->insert($shipping);

        $content = Cart::content();
        $datails = array();
        foreach($content as $row) {
            $datails['order_id'] = $order_id;
            $datails['product_id'] = $row->id;
            $datails['product_name'] = $row->name;
            $datails['color'] = $row->options->color;
            $datails['size'] = $row->options->size;
            $datails['quantity'] = $row->qty;
            $datails['singleprice'] = $row->price;
            $datails['totalprice'] = $row->qty*$row->price;
            DB::table('orders_details')->insert($datails);
        }

        Cart::destroy();
        if(session::has('coupons')) {
            Session::forget('coupons');
        } else {
            $notification=array(
                'message'=>'Order process successfully done',
                'alert-type'=>'success'
                );
                return Redirect()->to('/')->with($notification);
        }
    }

    public function cash(Request $request) {

        // Insert orders table
        $data = array();
        $data['user_id'] = Auth::id();
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_type'] = $request->payment_type;
        $data['status_code'] = mt_rand(100000,999999);

        if(Session::has('coupons')) {
            $data['subtotal'] = Session::get('coupons')['balance'];
        } else {
            $data['subtotal'] = Cart::Subtotal();
        }
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);
        // insert shipping table
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->name;
        $shipping['ship_phone'] = $request->phone;
        $shipping['ship_email'] = $request->email;
        $shipping['ship_address'] = $request->address;
        $shipping['ship_city'] = $request->city;
        DB::table('shipping')->insert($shipping);

        // insert order datails table
        $content = Cart::content();
        $datails = array();
        foreach($content as $row) {
            $datails['order_id'] = $order_id;
            $datails['product_id'] = $row->id;
            $datails['product_name'] = $row->name;
            $datails['color'] = $row->options->color;
            $datails['size'] = $row->options->size;
            $datails['quantity'] = $row->qty;
            $datails['singleprice'] = $row->price;
            $datails['totalprice'] = $row->qty*$row->price;
            DB::table('orders_details')->insert($datails);
        }

        Cart::destroy();
        if(session::has('coupons')) {
            Session::forget('coupons');
        } else {
            $notification=array(
                'message'=>'Order process successfully done',
                'alert-type'=>'success'
                );
                return Redirect()->to('/')->with($notification);
        }
    }

    public function paymentProcess(Request $request) {
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;

        if($request->payment == 'stripe') {
            return view('pages.payment.stripe', compact('data'));
        } elseif($request->payment == 'paypal') {

        } elseif($request->payment == 'oncash') {
            return view('pages.payment.oncash', compact('data'));
        } else {
            echo "Cash on delivery";
        }
    }

    public function stripeCharge(Request $request) {
        $email = Auth::user()->email;
        $total = $request->total;

        \Stripe\Stripe::setApiKey('sk_test_51Q7E85G6ph2S2MBp4P22qAj88Y9Kao47pgxqTWi89CCIKEDZRx3X9JTGIapM1sUpD0xnadXSv3db0Okheg7pMDfA00JIIv8LtU');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total*100,
            'currency' => 'usd',
            'description' => 'e-commerce',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        $data['user_id'] = Auth::id();
        $data['payment_id'] = $charge->payment_method;
        $data['paying_amount'] = $charge->amount;
        $data['blnc_transection'] = $charge->balance_transaction;
        $data['stripe_order_id'] = $charge->metadata->order_id;
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_type'] = $request->payment_type;
        $data['status_code'] = mt_rand(100000,999999);

        if(Session::has('coupons')) {
            $data['subtotal'] = Session::get('coupon')['balance'];
        } else {
            $data['subtotal'] = Cart::Subtotal();
        }
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);

        dd($data);
        Mail::to($email)->send(new InvoiceMail($data));

        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->ship_name;
        $shipping['ship_phone'] = $request->ship_phone;
        $shipping['ship_email'] = $request->ship_email;
        $shipping['ship_address'] = $request->ship_address;
        $shipping['ship_city'] = $request->ship_city;
        DB::table('shipping')->insert($shipping);

        $content = Cart::content();
        $datails = array();
        foreach($content as $row) {
            $datails['order_id'] = $order_id;
            $datails['product_id'] = $row->id;
            $datails['product_name'] = $row->name;
            $datails['color'] = $row->options->color;
            $datails['size'] = $row->options->size;
            $datails['quantity'] = $row->qty;
            $datails['singleprice'] = $row->price;
            $datails['totalprice'] = $row->qty*$row->price;
            DB::table('orders_details')->insert($datails);
        }

        Cart::destroy();
        if(session::has('coupons')) {
            Session::forget('coupons');
        } else {
            $notification=array(
                'message'=>'Order process successfully done',
                'alert-type'=>'success'
                );
                return Redirect()->to('/')->with($notification);
        }
    }

    public function onCashCharge(Request $request) {

        // Insert orders table
        $data = array();
        $data['user_id'] = Auth::id();
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_type'] = $request->payment_type;
        $data['status_code'] = mt_rand(100000,999999);

        if(Session::has('coupons')) {
            $data['subtotal'] = Session::get('coupon')['balance'];
        } else {
            $data['subtotal'] = Cart::Subtotal();
        }
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $date['year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);

        // insert shipping table
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->ship_name;
        $shipping['ship_phone'] = $request->ship_phone;
        $shipping['ship_email'] = $request->ship_email;
        $shipping['ship_address'] = $request->ship_address;
        $shipping['ship_city'] = $request->ship_city;
        DB::table('shipping')->insert($shipping);

        // insert order datails table
        $content = Cart::content();
        $datails = array();
        foreach($content as $row) {
            $datails['order_id'] = $order_id;
            $datails['product_id'] = $row->id;
            $datails['product_name'] = $row->name;
            $datails['color'] = $row->options->color;
            $datails['size'] = $row->options->size;
            $datails['quantity'] = $row->qty;
            $datails['singleprice'] = $row->price;
            $datails['totalprice'] = $row->qty*$row->price;
            DB::table('orders_details')->insert($datails);
        }

        Cart::destroy();
        if(session::has('coupons')) {
            Session::forget('coupons');
        } else {
            $notification=array(
                'message'=>'Order process successfully done',
                'alert-type'=>'success'
                );
                return Redirect()->to('/')->with($notification);
        }
    }

    public function successList() {
        $order = DB::table('orders')->where('user_id', Auth::id())->where('status', 3)->orderBy('id', 'DESC')->limit(5)->get();
        return view('pages.return_order', compact('order'));
    }

    public function returnRequest($id) {
        DB::table('orders')->where('id', $id)->update(['return_order' => 1]);
        $notification=array(
            'message'=>'Order request done',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
}
