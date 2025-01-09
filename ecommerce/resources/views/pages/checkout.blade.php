@extends('layouts.app')
@section('content')

@php
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;
$vat = $setting->vat;
$total = Session::has('coupons') ? Session::get('coupons')['balance'] + $charge + $vat : Cart::Subtotal() + $charge + $vat;
@endphp

<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        width: 400px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>

<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_responsive.css')}}">

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="cart_container">
                    <div class="cart_title">Checkout</div>
                    <div class="row mt-5">
                        <div class="col-md-3 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Command details</span>
                            </h4>
                            <ul class="list-group mb-3">
                                @foreach($cart as $row)
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <h6 class="my-0">{{ $row->name }}</h6>
                                        <small class="text-muted">Quantity: {{ $row->qty }}</small>
                                    </div>
                                    <span class="text-muted">${{ $row->price * $row->qty }}</span>
                                </li>
                                @endforeach

                                @if(Session::has('coupons'))
                                <li class="list-group-item d-flex justify-content-between bg-light">
                                    <div class="text-success">
                                        <h6 class="my-0">Promo code</h6>
                                        <small>{{ Session::get('coupons')['name'] }}</small>
                                    </div>
                                    <span class="text-success">-${{ Session::get('coupons')['discount'] }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between bg-light">Subtotal: <span style="float: right;">${{ Session::get('coupons')['balance'] }}</span> </li>
                                @else
                                <li class="list-group-item d-flex justify-content-between bg-light">Subtotal: <span style="float: right;">${{ Cart::Subtotal() }}</span> </li>
                                @endif
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">Shipping Charge : <span style="float: right;">${{ $charge }}</span> </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">Vat: <span style="float: right;">${{ $vat }}</span> </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">TVA: <span style="float: right;">${{ Cart::tax() }} </span> </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">Order total: <span style="float: right;">${{ Cart::total() }}</span> </li>

                                @if(Session::has('coupons'))
                                <li class="list-group-item d-flex justify-content-between bg-light">Total: <span style="float: right;"><strong>${{ Session::get('coupons')['balance'] + $charge + $vat }}</strong></span> </li>
                                @else
                                <li class="list-group-item d-flex justify-content-between bg-light">Total: <span style="float: right;"><strong>${{ Cart::Subtotal() + $charge + $vat }}</strong></span> </li>
                                @endif
                            </ul>

                            @if (Session::has('coupons'))
                            @else
                            <form action="{{ route('apply.coupon') }}" method="post">
                                @csrf
                                <div class="form-group d-flex">
                                    <input type="text" name="coupon" class="form-control" required placeholder="Enter your code coupon"> <br>
                                    <button type="submit" class="btn btn-success">Apply</button>
                                </div>
                            </form>
                            @endif
                        </div>
                        <div class="col-md-9 order-md-1">
                            <h4 class="mb-3">Billing address</h4>
                            <form class="needs-validation" action="{{ route('payment') }}" id="contact_form" method="post">
                                @csrf
                                <input type="hidden" name="total" value="{{ $total }}">
                                <input type="hidden" name="shipping" value="{{ $charge }}">
                                <input type="hidden" name="vat" value="{{ $vat }}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Full name</label>
                                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter your full name" required>
                                        </div>
                                        <div class="invalid-feedback">Valid full name is required.</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="username">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input type="text" class="form-control" id="username" placeholder="Username" required="">
                                            <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter your email" required>
                                            </div>
                                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Enter your phone" required>
                                            </div>
                                            <div class="invalid-feedback"> Please enter your shipping phone. </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Enter your address" required>
                                    </div>
                                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City</label>
                                            <input type="text" class="form-control" name="city" aria-describedby="emailHelp" placeholder="Enter your city" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="zip">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <div class="d-flex flex-column">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="mr-2 mb-2" id="same-address">
                                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="mr-2 mb-2" id="save-info">
                                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                                    </div>
                                </div>

                                <hr class="mb-4">

                                <h4 class="mb-3">Payment</h4>

                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="payment" value="credit" type="radio" class="mr-2 mb-2" checked required onchange="toggleCardDetails()">
                                        <label class="custom-control-label" for="credit">Credit card</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="cash" name="payment" value="cash" type="radio" class="mr-2 mb-2" onchange="toggleCardDetails()">
                                        <label class="custom-control-label" for="cash">Cash</label>
                                    </div>
                                </div>

                                <!-- Card details section -->
                                <div id="cardDetails" class="mt-3">
                                    <div class="row">
                                        <br>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Card name</label>
                                                <input type="text" class="form-control" placeholder="Card Owner Name" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-row">
                                                <label for="card-element">Credit card</label> <br>
                                                <div id="card-element">

                                                </div>
                                                <div id="card-errors" role="alert"></div>
                                            </div>

                                            <input type="hidden" name="shipping" value="{{ $charge }}">
                                            <input type="hidden" name="vat" value="{{ $vat }}">
                                            <input type="hidden" name="total" value="{{ Cart::Subtotal() + $charge + $vat }}">
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Send the command</button>
                            </form>
                        </div>
                    </div>
                    <div class="cart_buttons">
                        <a href="{{ route('payment.step') }}" class="button cart_button_checkout">Final Step</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('frontend/js/cart_custom.js')}}"></script>
<script>
    function toggleCardDetails() {
        const paymentMethod = document.querySelector('input[name="payment"]:checked').id;

        const cardDetails = document.getElementById("cardDetails");

        if (paymentMethod === "credit") {
            cardDetails.style.display = "block";
        } else {
            cardDetails.style.display = "none";
        }
    }

    document.addEventListener("DOMContentLoaded", toggleCardDetails);
</script>

<script type="text/javascript">
    var stripe = Stripe('pk_test_51Q7E85G6ph2S2MBpLlY2PbyeJmL1EVqk7R3TRZmol92Dlxqi1AbXIPRKpBfRyo7k12iPxoYIsugECY5kuTmE3AK100CxYzMBB3');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: 'fa755a'
        }
    };

    var card = elements.create('card', {
        style: style
    });
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('contact_form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Verifică metoda de plată
        var paymentMethod = document.querySelector('input[name="payment"]:checked').value;
        if (paymentMethod === 'credit') {
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        } else {
            form.submit(); // dacă plata este "cash", trimite formularul direct
        }
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('contact_form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken'); // asigură-te că folosești 'stripeToken'
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
    }
</script>
@endsection