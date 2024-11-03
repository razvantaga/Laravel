@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/product_responsive.css')}}">

<!-- Single Product -->
<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="{{asset($product->image_one)}}"><img src="{{asset($product->image_one)}}" alt=""></li>
                    <li data-image="{{asset($product->image_two)}}"><img src="{{asset($product->image_two)}}" alt=""></li>
                    <li data-image="{{asset($product->image_three)}}"><img src="{{asset($product->image_three)}}" alt=""></li>
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="{{asset($product->image_one)}}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">{{ $product->category_name }} > {{ $product->subcategory_name }} </div>
                    <div class="product_name">{{ $product->product_name }}</div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="product_text">
                        <p> {!! Str::limit($product->product_details, 300) !!} </p>
                    </div>
                    <div class="order_info d-flex flex-row">
                        <form action="{{ url('/cart/product/add/' . $product->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="">Color</label>
                                        <select name="color" id="exampleFormControlSelect1" class="form-control input-lg">
                                            @foreach ($product_color as $color)
                                            <option value="{{ $color }}"> {{ $color }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if($product->product_size == NULL)
                                @else
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="">Size</label>
                                        <select name="size" id="exampleFormControlSelect1" class="form-control input-lg">
                                            @foreach ($product_size as $size)
                                            <option value="{{ $size }}"> {{ $size }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="">Quantity</label>
                                        <input class="form-control" type="number" value="1" pattern="[0-9]" name="qty">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product_price discount" style="margin-top: 10px;">
                                        @if($product->discount_price == NULL)
                                        ${{ $product->selling_price }}
                                        @else
                                        <span>${{ $product->selling_price }}</span> ${{ $product->discount_price }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="button cart_button">Add to Cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Recently Viewed -->
<div class="viewed mt-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Product Details</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" href="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" type="profile" role="tab" aria-controls="profile" aria-selected="false">Specification</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Review</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> <br> {!! $product->product_details !!}</div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> <br> Content for Specification</div>

                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> <br>

                        @if(Auth::check())
                        <section>
                            <div class="container my-3">
                                <div class="row d-flex">
                                    <div class="col-md-10 col-lg-8 col-xl-8">
                                        <div class="">
                                            <div class="card-body p-4">
                                                <form action="{{ route('add.review') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <div class="d-flex flex-start w-100">
                                                        <img src="{{ asset('frontend/images/user.png') }}" alt="avatar"
                                                            class="rounded-circle shadow-1-strong me-3" width="65" height="65">
                                                        <div class="w-100 ml-3">
                                                            <h5>{{ Auth::user()->name }}</h5>

                                                            <!-- Star Rating -->
                                                            <ul id="star-rating" class="rating mb-3" style="list-style-type: none; padding: 0;">
                                                                <li style="display: inline;">
                                                                    <i class="far fa-star fa-sm text-danger star" data-value="1" title="Bad"></i>
                                                                </li>
                                                                <li style="display: inline;">
                                                                    <i class="far fa-star fa-sm text-danger star" data-value="2" title="Poor"></i>
                                                                </li>
                                                                <li style="display: inline;">
                                                                    <i class="far fa-star fa-sm text-danger star" data-value="3" title="OK"></i>
                                                                </li>
                                                                <li style="display: inline;">
                                                                    <i class="far fa-star fa-sm text-danger star" data-value="4" title="Good"></i>
                                                                </li>
                                                                <li style="display: inline;">
                                                                    <i class="far fa-star fa-sm text-danger star" data-value="5" title="Excellent"></i>
                                                                </li>
                                                            </ul>
                                                            <!-- Review Text Area -->
                                                            <div class="form-outline">
                                                                <textarea class="form-control" name="review" id="textAreaExample" rows="4" required></textarea>
                                                                <label class="form-label" for="textAreaExample">What is your view?</label>
                                                            </div>

                                                            <!-- Buttons -->
                                                            <div class="d-flex justify-content-between mt-3">
                                                                <button type="reset" class="btn btn-success">Clear</button>
                                                                <button type="submit" class="btn btn-danger">
                                                                    Send <i class="fas fa-long-arrow-alt-right ms-1"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif

                        <br>
                        <h3 class="mb-4">All Reviews</h3>

                        @php
                        $reviews = DB::table('reviews')
                                ->join('users', 'reviews.user_id', '=', 'users.id')
                                ->where('reviews.product_id', $product->id)->where('reviews.product_id', '!=', 'NULL')
                                ->select('reviews.*', 'users.name as user_name')
                                ->get();
                        @endphp

                        @foreach($reviews as $review)
                        <div class="media mb-4 p-4 border rounded shadow-sm bg-white review-container">
                            <img src="{{ asset('frontend/images/user.png') }}"
                                class="mr-4 rounded-circle border border-secondary" alt=""
                                width="64"
                                height="64">
                            <div class="media-body">
                                <h5 class="mt-0 font-weight-bold">{{ $review->user_name }}</h5>

                                <div class="rating mb-2">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                </div>
                                <p>{{$review->review}}</p>
                                <small class="text-muted">Posted on: {{ $review->created_at }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection