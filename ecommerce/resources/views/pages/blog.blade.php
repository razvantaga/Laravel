@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_responsive.css')}}">

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                    <!-- Blog post -->
                    <h2>Our blog's</h2>
                    <p class="mb-5 text-secondary lead fs-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis iure quo excepturi autem, consectetur, corporis recusandae adipisci ipsa explicabo velit repellat dolor repudiandae aut placeat ipsum doloremque hic eligendi? Nam omnis aut deleniti dolores rem voluptates reprehenderit officia? Nesciunt soluta maiores provident quia tenetur?
                    </p>
                    @foreach($posts as $post)
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url({{ asset($post->post_image) }})"></div>
                            <div class="blog_text"> {{ $post->post_title_en }} </div>
                            <div class="blog_paragraph"> {!! \Illuminate\Support\Str::limit($post->details_en, 150, '...') !!} </div>
                            <div class="blog_button"><a href="{{ url('blog/single/' . $post->id) }}"> Continue reading </a></div>
                        </div>
                    @endforeach
                    <div class="w-100 d-flex justify-content-center mt-5">
                        <button class="btn btn-info btn-lg rounded-pill px-4 py-2">View more</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection