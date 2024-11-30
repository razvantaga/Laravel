@extends('layouts.index')

@section('content')
@include('layouts.header')

@php
$reviews = DB::table('reviews')->get();
@endphp

<div class="mt-24">
    <div class="font-sans bg-white">
        <div class="p-4 lg:max-w-7xl max-w-4xl mx-auto">
            <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6 rounded-lg">
                <div class="lg:col-span-3 w-full lg:sticky top-0 text-center">
                    <div class="px-4 py-10 rounded-lg shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative">
                        <img src="{{ asset($project->image) }}" alt="Product" class="w-3/4 rounded object-cover mx-auto" />
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <h2 class="text-2xl font-extrabold text-gray-800">{{ $project->name }}</h2>


                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800">{{ $project->description }}</h3>

                    </div>

                    <div class="flex flex-wrap gap-4 mt-8">
                        <a href="#" type="button" class="min-w-[200px] px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white text-center text-sm font-semibold rounded">View Website</a>
                    </div>
                </div>
            </div>

            <div class="mt-16 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
                <section class="relative">
                    <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">
                        <h2 class="font-manrope font-bold text-4xl text-black text-center mb-11">Reviews</h2>
                        <div class="grid grid-cols-1 gap-8">
                            @foreach($reviews as $row)
                                @if($row->project_id == $project->id)
                                <div class="py-4 grid grid-cols-12 max-w-sm sm:max-w-full mx-auto">
                                    <div class="col-span-12 lg:col-span-10 ">
                                        <div class="sm:flex gap-6">
                                            <img src="{{ asset($row->image) }}" alt="" class="w-32 h-32 rounded-full object-cover">
                                            <div class="text">
                                                <p class="font-medium text-lg leading-8 text-gray-900">{{ $row->full_name }}</p>
                                                <p class="font-small text-sm leading-8 text-gray-400 whitespace-nowrap mb-2">{{ $row->created_at }}</p>
                                                <p class="font-normal text-base leading-7 text-gray-400 mb-4 ">{{ $row->message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>

            <div class="mt-16 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
                <div class="">

                </div>
                <div class="flex flex-col gap-5 p-10 bg-white rounded-3xl shadow-main">
                    <h3 class="text-2xl font-bold text-dark-grey-900 font-display">Submit Your Review</h3>
                    <form class="flex flex-col gap-6" action="{{ route('review') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap-12">
                            <input type="hidden" value="{{ $project->id }}" name="project_id">
                            <label class="flex flex-col gap-2 text-sm font-medium text-dark-grey-700 w-3/6" for="image">
                                Profile photo
                                <input class="p-4 border border-solid outline-none rounded-xl placeholder:text-sm placeholder:font-medium placeholder:text-dark-grey-500 border-grey-500 focus:border-grey-600" type="file" name="image" id="image">
                            </label>
                            <label class="flex flex-col gap-2 text-sm font-medium text-dark-grey-700 w-3/6" for="full-name">
                                Full Name
                                <input class="p-4 border border-solid outline-none rounded-xl placeholder:text-sm placeholder:font-medium placeholder:text-dark-grey-500 border-grey-500 focus:border-grey-600" placeholder="Your full name " type="text" name="full_name" id="full-name">
                            </label>
                            <label class="flex flex-col gap-2 text-sm font-medium text-dark-grey-700 w-3/6" for="email">
                                Your Email
                                <input class="p-4 border border-solid outline-none rounded-xl placeholder:text-sm placeholder:font-medium placeholder:text-dark-grey-500 border-grey-500 focus:border-grey-600" placeholder="Your email address " type="email" name="email" id="email">
                            </label>
                        </div>
                        <label class="flex flex-col gap-2 text-sm font-medium text-dark-grey-700" for="message">
                            Message
                            <textarea rows="5" class="p-4 border border-solid outline-none rounded-xl placeholder:text-sm placeholder:font-medium placeholder:text-dark-grey-500 border-grey-500 focus:border-grey-600" placeholder="Your message" id="message" name="message" spellcheck="false"></textarea>
                        </label>
                        <button class="flex items-center justify-center py-4 text-center text-white px-7 rounded-2xl bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-purple-blue-100 transition duration-300">Submit message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
@endsection