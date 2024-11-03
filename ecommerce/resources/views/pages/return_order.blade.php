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
                <div class="card mb-4">
                    <div class="card-body">
                    <table class="table table-response">
                    <thead>
                        <tr>
                            <th scope="col">Payment type</th>
                            <th scope="col">Return</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status </th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $row)
                        <tr>
                            <td scope="col">{{ $row->payment_type }}</td>
                            <td scope="col">
                                @if($row->return_order == 0)
                                <span class="badge badge-warning">No request</span>
                                @elseif($row->return_order == 1)
                                <span class="badge badge-info">Pending</span>
                                @elseif($row->return_order == 2)
                                <span class="badge badge-success">Success</span>
                                @endif
                            </td>
                            <td scope="col">${{ $row->total }}</td>
                            <td scope="col">{{ $row->date }}</td>
                            <td scope="col">
                                @if($row->status == 0)
                                <span class="badge badge-warning">Pending</span>
                                @elseif($row->status == 1)
                                <span class="badge badge-success">Payment accepted</span>
                                @elseif($row->status == 2)
                                <span class="badge badge-info">Progress</span>
                                @elseif($row->status == 3)
                                <span class="badge badge-warning">Delivered</span>
                                @else
                                <span class="badge badge-danger">Cancel</span>
                                @endif
                            </td>
                            <td scope="col">
                            @if($row->return_order == 0)
                                <a href="{{ url('request/return/'.$row->id) }}" class="btn btn-sm btn-danger" id="return">Return</a>
                                @elseif($row->return_order == 1)
                                <span class="badge badge-info">Pending</span>
                                @elseif($row->return_order == 2)
                                <span class="badge badge-success">Success</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection