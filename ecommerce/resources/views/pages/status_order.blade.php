@extends('layouts.app')
@section('content')

@php
$order = DB::table('orders')->where('user_id', Auth::id())->orderBy('id', 'DESC')->limit(10)->get();
@endphp

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{asset('../frontend/images/user.png')}}" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ Auth::user()->name }}</h5>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <a href="{{ route('my.profile') }}">My profile</a> </li>
                            <li class="list-group-item"> <a href="{{ route('my.orders') }}">My orders</a> </li>
                            <li class="list-group-item"> <a href="{{ route('status.tracking') }}">My order tracking</a> </li>
                            <li class="list-group-item"> <a href="{{ route('success.orderlist') }}">Return order</a> </li>
                            <li class="list-group-item"> <a href="{{ route('password.change') }}">Change Password</a> </li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <h3 style="margin-left:20px;">My order status</h3>
                <form action="{{ route('view.status') }}" method="post">
                    @csrf
                    <div class="form-group d-flex col-lg-6 mt-3">
                        <input type="text" name="code" class="form-control" required placeholder="Enter your order status code"> <br>
                        <button type="submit" class="btn btn-danger ml-2">View</button>
                    </div>
                </form>

                @if(isset($track) && $track)
                <div class="mt-5">
                    <div class="contact_form_title">
                        <h4>Your order status</h4>
                    </div>
                    <div class="progress">
                        @if($track->status == 0)
                        <div class="progress-bar bg-danger" role="progressbar" style="width:15%" aria-valuenow="15" aria-voluemin="0" aria-voluemax="100"></div>
                        @elseif($track->status == 1)
                        <div class="progress-bar bg-danger" role="progressbar" style="width:15%" aria-valuenow="15" aria-voluemin="0" aria-voluemax="100"></div>
                        <div class="progress-bar bg-primary" role="progressbar" style="width:30%" aria-valuenow="30" aria-voluemin="0" aria-voluemax="100"></div>
                        @elseif($track->status == 2)
                        <div class="progress-bar bg-danger" role="progressbar" style="width:15%" aria-valuenow="15" aria-voluemin="0" aria-voluemax="100"></div>
                        <div class="progress-bar bg-primary" role="progressbar" style="width:30%" aria-valuenow="30" aria-voluemin="0" aria-voluemax="100"></div>
                        <div class="progress-bar bg-info" role="progressbar" style="width:20%" aria-valuenow="20" aria-voluemin="0" aria-voluemax="100"></div>
                        @elseif($track->status == 3)
                        <div class="progress-bar bg-danger" role="progressbar" style="width:15%" aria-valuenow="15" aria-voluemin="0" aria-voluemax="100"></div>
                        <div class="progress-bar bg-primary" role="progressbar" style="width:30%" aria-valuenow="30" aria-voluemin="0" aria-voluemax="100"></div>
                        <div class="progress-bar bg-info" role="progressbar" style="width:20%" aria-valuenow="20" aria-voluemin="0" aria-voluemax="100"></div>
                        <div class="progress-bar bg-success" role="progressbar" style="width:35%" aria-valuenow="35" aria-voluemin="0" aria-voluemax="100"></div>
                        @else
                        <div class="progress-bar bg-danger" role="progressbar" style="width:100%" aria-valuenow="100" aria-voluemin="0" aria-voluemax="100"></div>
                        @endif
                    </div> <br>
                    @if($track->status == 0)
                    <h4>Note: Your order are under review</h4>
                    @elseif($track->status == 1)
                    <h4>Note: Payment accept under process</h4>
                    @elseif($track->status == 2)
                    <h4>Note: Packing done handover process</h4>
                    @elseif($track->status == 3)
                    <h4>Note: Order complete</h4>
                    @else
                    <h4>Note: Order cacel</h4>
                    @endif
                </div>

                <div class="mt-5">
                    <div class="contact_form_title">
                        <h4>Your order details</h4>
                    </div>

                    <ul class="list-group col-lg-12">
                        <li class="list-group-item"><b>Payment type:</b> {{ $track->payment_type }} </li>
                        <li class="list-group-item"><b>Transaction ID:</b> {{ $track->payment_id }} </li>
                        <li class="list-group-item"><b>Balance ID:</b> {{ $track->blnc_transection }} </li>
                        <li class="list-group-item"><b>Subtotal:</b> ${{ $track->subtotal }} </li>
                        <li class="list-group-item"><b>Shipping:</b> ${{ $track->shipping }} </li>
                        <li class="list-group-item"><b>Vat:</b> ${{ $track->vat }} </li>
                        <li class="list-group-item"><b>Total:</b> ${{ $track->total }} </li>
                        <li class="list-group-item"><b>Month:</b> {{ $track->month }} </li>
                        <li class="list-group-item"><b>Date:</b> {{ $track->date }} </li>
                        <li class="list-group-item"><b>Year:</b> {{ $track->year }} </li>
                    </ul>
                </div>
                @else
                @endif
            </div>
        </div>
    </div>
</section>



@endsection