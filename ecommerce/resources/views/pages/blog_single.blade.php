@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_single_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_single_responsive.css')}}">

@foreach($posts as $post)
<div class="single_post">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 pr-5">
                <div class="blog_image" style="background-image:url({{ asset($post->post_image) }})"></div>
            </div>

            <div class="col-lg-8 pl-5">
                <div class="single_post_title">
                    @if (Session()->get('lang') == 'hindi')
                    {{ $post->post_title_in }}
                    @else
                    {{ $post->post_title_en }}
                    @endif
                </div>
                <div class="single_post_text">
                    <p>
                        @if (Session()->get('lang') == 'hindi')
                        {!! $post->details_in !!}
                        @else
                        {!! $post->details_en !!}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row d-flex justify-content-center " style="background-color: #f0f2f5;">
    <div class="col-md-8 col-lg-6">
        <div class="" style="background-color: #f0f2f5;">
            <div class="card-body p-4">
                @if(Auth::check())
                <section>
                    <div class="container my-3">
                        <div class="row d-flex">
                            <div class="col-md-10 col-lg-8 col-xl-8">
                                <div class="">
                                    <div class="card-body p-4">
                                        <form action="{{ route('add.blog.review') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="blog_id" value="{{ $post->id }}">
                                            <div class="d-flex flex-start w-100">
                                                <img src="{{ asset('frontend/images/user.png') }}" alt="avatar"
                                                    class="rounded-circle shadow-1-strong me-3" width="65" height="65">
                                                <div class="w-100 ml-3">
                                                    <h5>{{ Auth::user()->name }}</h5>
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

                @php
                $reviews = DB::table('reviews')
                ->join('users', 'reviews.user_id', '=', 'users.id')
                ->where('reviews.blog_id', $post->id)->where('reviews.blog_id', '!=', 'NULL')
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

                        <p>{{$review->review}}</p>
                        <small class="text-muted">Posted on: {{ $review->created_at }}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection