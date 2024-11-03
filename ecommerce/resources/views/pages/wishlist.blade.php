@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_responsive.css')}}">

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="cart_container">
                    <div class="cart_title">Wishlist</div>
                    @foreach($product as $row)
                        <div class="container mt-3" style="background-color: #eee;padding: 2em; border-radius:30px;">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img class="ml-5 mt-3" src="{{asset($row->image_one)}}" alt="" style="height:150px;">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <p style="font-size: 1.5rem;">{{ $row->product_name }}</p>
                                    <div class="rating ">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="far fa-star text-warning"></i>

                                        <span class="ml-2" style="font-size: 1rem;">4.2 <small>(125 voturi)</small></span>
                                    </div>
                                    <div class="d-flex flex-column mt-3">
                                        <div class="d-flex">
                                            @php
                                                $colors = is_string($row->product_color) ? explode(',', $row->product_color) : $row->product_color;
                                            @endphp

                                            @if (!empty($colors) && is_array($colors))
                                                @foreach ($colors as $color)
                                                    <p class="wishlist_product_color mr-2">{{ $color }}</p>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="d-flex">
                                            @php
                                                $sizes = is_string($row->product_size) ? explode(',', $row->product_size) : $row->product_size;
                                            @endphp

                                            @if (!empty($sizes) && is_array($sizes))
                                                @foreach ($sizes as $size)
                                                    <p class="wishlist_product_size mr-2">{{ $size }}</p>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="d-flex mt-5">
                                        @if ($row->discount_price == NULL)
                                        <div class="deals_item_price ml-auto mr-5">${{ $row->selling_price }}</div>
                                        @else

                                        @endif

                                        @if ($row->discount_price != NULL)
                                        <div class="deals_item_price ml-auto mr-5">${{ $row->discount_price }}</div>
                                        @else

                                        @endif

                                        @if($row->product_quantity > 0)
                                        <form action="{{ route('insert.into.cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" class="form-control" name="qty" value="1">
                                            <input type="hidden" name="product_id" value="{{ $row->id }}" id="product_id">
                                            <button type="submit" class="btn btn-sm btn-info mr-3" style="font-size: 1.5rem;"><i class="bi bi-cart"></i></button>
                                        </form>
                                        @endif
                                    </div>

                                    @if($row->product_quantity < 0)
                                    <p class="stoc_epuizat mt-3">Stoc epuizat</p>
                                    @endif

                                    <div class="text-right mr-3 mt-5">
                                        <form action="{{ url('wishlist/delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $row->id }}" id="product_id">
                                            <button type="submit" class="btn btn-link btn-sm btn-danger border-0"><i class="fas fa-trash mr-2"></i>Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('frontend/js/cart_custom.js')}}"></script>
@endsection