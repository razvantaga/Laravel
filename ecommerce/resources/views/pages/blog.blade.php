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
                    @foreach($posts as $post)
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url({{ asset($post->post_image) }})"></div>
                            <div class="blog_text">
                                @if (Session()->get('lang') == 'hindi')
                                    {{ $post->post_title_in }}
                                @else
                                    {{ $post->post_title_en }}
                                @endif
                            </div>
                            <div class="blog_paragraph">
                                @if (Session()->get('lang') == 'hindi')
                                    {!! \Illuminate\Support\Str::limit($post->details_in, 150, '...') !!}
                                @else
                                    {!! \Illuminate\Support\Str::limit($post->details_en, 150, '...') !!}
                                @endif
                            </div>
                            <div class="blog_button"><a href="{{ url('blog/single/' . $post->id) }}">
                                @if (Session()->get('lang') == 'hindi')
                                    繼續閱讀
                                @else
                                    Continue reading
                                @endif
                            </a></div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

@endsection