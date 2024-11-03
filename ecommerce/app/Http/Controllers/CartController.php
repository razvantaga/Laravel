<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addItem($id) {
        $product = DB::table('products')->where('id', $id)->first();

        $data = array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return response()->json(['success' => 'Successfully added on your Cart']);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return response()->json(['success' => 'Successfully added on your Cart']);
        }
    }

    public function check() {
        $content = Cart::content();
        return response()->json($content);
    }

    public function showCart() {
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
    }

    public function updateItem(Request $request) {
        $rowId = $request->productId;
        $qty = $request->qty;

        Cart::update($rowId, $qty);
        $notification=array(
            'message'=>'Product updated successfully',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function removeItem($rowId) {
        Cart::remove($rowId);
        $notification=array(
            'message'=>'Product remove from Cart',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function viewProduct($id) {
        $product = DB::table('products')
                        ->join('categories', 'products.category_id', 'categories.id')
                        ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                        ->join('brands', 'products.brand_id', 'brands.id')
                        ->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')
                        ->where('products.id', $id)->first();

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }

    public function insertCart(Request $request) {
        $id = $request->product_id;
        $product = DB::table('products')->where('id', $id)->first();
        $color = $request->color;
        $size = $request->size;
        $qty = $request->qty;

        $data = array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            DB::table('wishlists')->where('product_id', $id)->delete();
            $notification=array(
                'message'=>'Product added successfully',
                'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            DB::table('wishlists')->where('product_id', $id)->delete();
            $notification=array(
                'message'=>'Product added successfully',
                'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
        }
    }

    public function checkout() {
        if(Auth::check()) {
            $cart = Cart::content();
            return view('pages.checkout', compact('cart'));
        } else {
            $notification=array(
                'message'=>'First you need to login your account',
                'alert-type'=>'warning'
                );
                return Redirect()->route('login')->with($notification);
        }
    }

    public function wishlist() {
        $userId = Auth::id();
        $product = DB::table('wishlists')
                        ->join('products', 'wishlists.product_id', 'products.id')
                        ->select('products.*', 'wishlists.user_id')
                        ->where('wishlists.user_id', $userId)->get();
        return view('pages.wishlist', compact('product'));
    }

    public function applyCoupon(Request $request) {
        $coupon = $request->coupon;

        $check = DB::table('coupons')->where('coupons', $coupon)->first();
        if($check) {
            Session::put('coupons', [
                'name' => $check->coupons,
                'discount' => $check->discount,
                'balance' => Cart::Subtotal() - $check->discount
            ]);

            $notification=array(
                'message'=>'Successfully coupon applied',
                'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
        } else {
            $notification=array(
                'message'=>'Invalid coupon',
                'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
        }
    }

    public function removeCoupon() {
        Session::forget('coupons');
        $notification=array(
            'message'=>'Successfully coupon removed',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function paymentPage() {
        $cart = Cart::Content();
        return view('pages.payment', compact('cart'));
    }

    public function search(Request $request) {
        $item = $request->search;
        $products = DB::table('products')->where('product_name', 'LIKE', "%$item%")->paginate(20);
        return view('pages.search', compact('products'));
    }
}
