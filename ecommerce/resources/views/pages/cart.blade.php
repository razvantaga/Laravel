@extends('layouts.app')

@section('content')

@php
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;
$vat = $setting->vat;
@endphp

<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_responsive.css')}}">

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart</div>

                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-lg-3 mt-3" style="background-color: #eee; padding: 2em; border-radius:30px;">
                                <div class="order_total_content" style="padding: 15px;">
                                    @if (Session::has('coupons'))
                                    @else
                                    <h5 style="font-size: 1rem">Apply coupon</h5>
                                    <form action="{{ route('apply.coupon') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="coupon" class="form-control" required placeholder="Enter your coupon"> <br>
                                            <button type="submit" class="btn btn-danger ">Submit</button>
                                        </div>
                                    </form>
                                    @endif
                                </div>

                                <ul class="list-group ">
                                    @if(Session::has('coupons'))
                                    <li class="list-group-item">Subtotal: <span style="float: right;">${{ Session::get('coupons')['balance'] }}</span> </li>
                                    <li class="list-group-item">Coupon : ({{ Session::get('coupons')['name'] }})
                                        <a href="{{ route('remove.coupon') }}" class="btn btn-danger btn-sm">X</a>
                                        <span style="float: right;">${{ Session::get('coupons')['discount'] }}</span>
                                    </li>
                                    @else
                                    <li class="list-group-item">Subtotal: <span style="float: right;">${{ Cart::Subtotal() }}</span> </li>
                                    @endif

                                    <li class="list-group-item">Shipping Charge : <span style="float: right;">${{ $charge }}</span> </li>
                                    <li class="list-group-item">Vat: <span style="float: right;">${{ $vat }}</span> </li>
                                    <li class="list-group-item">TVA: <span style="float: right;">${{ Cart::tax() }} </span> </li>
                                    <li class="list-group-item">Order total: <span style="float: right;">${{ Cart::total() }}</span> </li>

                                    @if(Session::has('coupons'))
                                    <li class="list-group-item">Total: <span style="float: right;">${{ Session::get('coupons')['balance'] + $charge + $vat }}</span> </li>
                                    @else
                                    <li class="list-group-item">Total: <span style="float: right;">${{ Cart::Subtotal() + $charge + $vat }}</span> </li>
                                    @endif
                                </ul>
                                <div class="mt-5 text-center">
                                    <a href="{{ route('user.checkout') }}" class="button cart_button_checkout"><i class="fas fa-angle-double-right custom-icon"></i>Check out</a>
                                </div>
                            </div>

                            <div class="col-lg-8 ml-3">
                                <div class="row">
                                    @foreach($cart as $row)
                                    <div class="col-lg-12 d-flex justify-content-between mt-3" style="background-color: #eee;padding: 2em; border-radius:30px; max-height: 200px;">
                                        <img class="" src="{{ asset($row->options->image) }}" alt="" style="height:150px;">
                                        <div class="d-flex flex-column">
                                            <p class="mt-3" style="font-size: 20px; margin-right:12rem;">{{ $row->name }}</p>
                                            <p class="cart_product_color">Negru</p>
                                            <p class="cart_product_size">xl</p>
                                        </div>
                                        <div class="d-flex flex-column justify-content-between">
                                            <div class="deals_item_price text-right d-flex flex-column">${{ $row->price * $row->qty }}
                                                <form action="{{ route('update.cartitem') }}" method="post" class="d-flex float-right ">
                                                    @csrf
                                                    <input type="hidden" name="productId" value="{{ $row->rowId }}">
                                                    <input type="number" name="qty" value="{{ $row->qty }}" class="form-control" style="width:60px;">
                                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check-square"></i> </button>
                                                </form>
                                            </div>
                                            <div class="text-right">
                                                <form action="{{ url('remove/cart/' . $row->rowId) }}" method="get">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $row->rowId }}" id="product_id">
                                                    <button type="submit" class="btn btn-link btn-sm btn-danger border-0"><i class="fas fa-trash mr-2"></i>Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('frontend/js/cart_custom.js')}}"></script>
@endsection