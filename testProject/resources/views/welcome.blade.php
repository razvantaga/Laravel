@extends('layouts.index')

@section('content')

@php
    $categories = DB::table('category')->get();
    $reviews = DB::table('reviews')->get();
@endphp

@include('layouts.header')

<section class="mt-16 bg-white dark:bg-gray-900 p-20">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Payments tool for software companies</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">From checkout to global sales tax compliance, companies around the world use Flowbite to simplify their payment stack.</p>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Get started
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Speak to Sales
            </a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
        </div>
    </div>
</section>

<section class="mt-24">
    <div class="mx-auto text-center md:max-w-xl lg:max-w-3xl">
        <h2 class="block w-full bg-gradient-to-b from-white to-gray-900 bg-clip-text font-bold text-3xl sm:text-4xl"> OUR SERVICES </h2>
        <p class="mt-3 pb-2 text-neutral-600  md:mb-12 md:pb-0">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error
            amet numquam iure provident voluptate esse quasi, veritatis totam
            voluptas nostrum quisquam eum porro a pariatur veniam.
        </p>
    </div>

    <div class="max-w-screen-xl grid grid-cols-1 md:grid-cols-2 gap-12 mx-auto">
        @foreach($categories as $row)
        <div class="bg-slate-100 rounded-lg p-16">
            <div class="flex justify-center pb-8">
                <img src="{{ asset($row->category_logo) }}" alt="" class="w-16 rounded-full shadow-lg dark:shadow-black/30 ">
            </div>
            <h6 class="mb-4 font-semibold text-primary dark:text-primary-400 text-center text-3xl text-sky-500">{{ $row->category_name }}</h6>
            <p class="text-neutral-600 font-medium">{{ $row->category_description }}</p>
        </div>
        @endforeach
    </div>
</section>

<div class="bg-white dark:bg-gray-900 mt-24">
    <section id="features"
        class="relative block px-6 py-10 md:py-20 md:px-10  border-t border-b border-neutral-900 bg-neutral-900/30">
        <div class="relative mx-auto max-w-5xl text-center">
            <span class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
                Why choose us
            </span>
            <h2
                class="block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-3xl sm:text-4xl">
                Build a Website That Your Customers Love
            </h2>
            <p
                class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
                Our templates allow for maximum customization. No technical skills required – our intuitive design tools
                let
                you get the job done easily.
            </p>
        </div>
        <div class="relative mx-auto max-w-7xl z-10 grid grid-cols-1 gap-10 pt-14 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border "
                    style="background-image: linear-gradient(rgb(80, 70, 229) 0%, rgb(43, 49, 203) 100%); border-color: rgb(93, 79, 240);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-color-swatch" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M19 3h-4a2 2 0 0 0 -2 2v12a4 4 0 0 0 8 0v-12a2 2 0 0 0 -2 -2"></path>
                        <path d="M13 7.35l-2 -2a2 2 0 0 0 -2.828 0l-2.828 2.828a2 2 0 0 0 0 2.828l9 9"></path>
                        <path d="M7.3 13h-2.3a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h12"></path>
                        <line x1="17" y1="17" x2="17" y2="17.01"></line>
                    </svg>
                </div>
                <h3 class="mt-6 text-gray-400">Customizable</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">Tailor your landing page's
                    look
                    and feel, from the color scheme to the font size, to the design of the page.
                </p>
            </div>
            <div class="rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border "
                    style="background-image: linear-gradient(rgb(80, 70, 229) 0%, rgb(43, 49, 203) 100%); border-color: rgb(93, 79, 240);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bolt" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="13 3 13 10 19 10 11 21 11 14 5 14 13 3"></polyline>
                    </svg>
                </div>
                <h3 class="mt-6 text-gray-400">Fast Performance</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">We build our templates for
                    speed in mind, for super-fast load times so your customers never waver.
                </p>
            </div>
            <div class="rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border "
                    style="background-image: linear-gradient(rgb(80, 70, 229) 0%, rgb(43, 49, 203) 100%); border-color: rgb(93, 79, 240);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4"></path>
                        <line x1="14.5" y1="5.5" x2="18.5" y2="9.5"></line>
                        <polyline points="12 8 7 3 3 7 8 12"></polyline>
                        <line x1="7" y1="8" x2="5.5" y2="9.5"></line>
                        <polyline points="16 12 21 17 17 21 12 16"></polyline>
                        <line x1="16" y1="17" x2="14.5" y2="18.5"></line>
                    </svg>
                </div>
                <h3 class="mt-6 text-gray-400">Fully Featured</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
                    Everything you need to
                    succeed
                    and launch your landing page, right out of the box. No need to install anything else.
                </p>
            </div>
        </div>
    </section>
</div>

<section class="grid gap-12 md:grid-cols-3 md:gap-16 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto my-32 py-16">
    <!-- Block #1 -->
    <article>
        <div class="w-14 h-14 rounded shadow-md bg-white flex justify-center items-center rotate-3 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="20">
                <defs>
                    <linearGradient id="icon1-a" x1="50%" x2="50%" y1="0%" y2="100%">
                        <stop offset="0%" stop-color="#A5B4FC" />
                        <stop offset="100%" stop-color="#4F46E5" />
                    </linearGradient>
                    <linearGradient id="icon1-b" x1="50%" x2="50%" y1="0%" y2="100%">
                        <stop offset="0%" stop-color="#EEF2FF" />
                        <stop offset="100%" stop-color="#C7D2FE" />
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="nonzero">
                    <path fill="url(#icon1-a)" d="M20.625 0H9.375a9.375 9.375 0 0 0 0 18.75h11.25a9.375 9.375 0 0 0 0-18.75Z" transform="translate(.885 .885)" />
                    <path fill="url(#icon1-b)" d="M9.375 17.5A8.125 8.125 0 0 1 1.25 9.375 8.125 8.125 0 0 1 9.375 1.25 8.125 8.125 0 0 1 17.5 9.375 8.125 8.125 0 0 1 9.375 17.5Z" transform="translate(.885 .885)" />
                </g>
            </svg>
        </div>
        <h2>
            <span class="flex tabular-nums text-slate-900 text-5xl font-extrabold mb-2 transition-[_--num] duration-[3s] ease-out [counter-set:_num_var(--num)] supports-[counter-set]:before:content-[counter(num)]" x-data="{ shown: false }" x-intersect="shown = true" :class="shown && '[--num:40]'">
                <span class="supports-[counter-set]:sr-only">40</span>K+
            </span>
            <span class="inline-flex font-semibold bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-indigo-300 mb-2">Clients</span>
        </h2>
        <p class="text-sm text-slate-500">Many desktop publishing packages and web page editors now use Pinky as their default model text.</p>
    </article>
    <!-- Block #2 -->
    <article>
        <div class="w-14 h-14 rounded shadow-md bg-white flex justify-center items-center -rotate-3 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19">
                <defs>
                    <linearGradient id="icon2-a" x1="50%" x2="50%" y1="0%" y2="100%">
                        <stop offset="0%" stop-color="#A5B4FC" />
                        <stop offset="100%" stop-color="#4F46E5" />
                    </linearGradient>
                    <linearGradient id="icon2-b" x1="50%" x2="50%" y1="0%" y2="100%">
                        <stop offset="0%" stop-color="#E0E7FF" />
                        <stop offset="100%" stop-color="#A5B4FC" />
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="nonzero">
                    <path fill="url(#icon2-a)" d="M5.5 0a5.5 5.5 0 0 0 0 11c.159 0 .314-.01.469-.024a15.896 15.896 0 0 1-2.393 6.759A.5.5 0 0 0 4 18.5h1a.5.5 0 0 0 .362-.155C7.934 15.64 11 11.215 11 5.5A5.506 5.506 0 0 0 5.5 0Z" />
                    <path fill="url(#icon2-b)" d="M18.5 0a5.5 5.5 0 0 0 0 11c.159 0 .314-.01.469-.024a15.896 15.896 0 0 1-2.393 6.759.5.5 0 0 0 .424.765h1a.5.5 0 0 0 .363-.155C20.934 15.64 24 11.215 24 5.5A5.506 5.506 0 0 0 18.5 0Z" />
                </g>
            </svg>
        </div>
        <h2>
            <span class="flex tabular-nums text-slate-900 text-5xl font-extrabold mb-2 transition-[_--num] duration-[3s] ease-out [counter-set:_num_var(--num)] supports-[counter-set]:before:content-[counter(num)]" x-data="{ shown: false }" x-intersect="shown = true" :class="shown && '[--num:30]'">
                <span class="supports-[counter-set]:sr-only">30</span>K+
            </span>
            <span class="inline-flex font-semibold bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-indigo-300 mb-2">Projects</span>
        </h2>
        <p class="text-sm text-slate-500">Many desktop publishing packages and web page editors now use Pinky as their default model text.</p>
    </article>
    <!-- Block #3 -->
    <article>
        <div class="w-14 h-14 rounded shadow-md bg-white flex justify-center items-center rotate-3 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26">
                <defs>
                    <radialGradient id="icon3-a" cx="68.15%" cy="27.232%" r="67.641%" fx="68.15%" fy="27.232%">
                        <stop offset="0%" stop-color="#E0E7FF" />
                        <stop offset="100%" stop-color="#A5B4FC" />
                    </radialGradient>
                </defs>
                <g fill="none" fill-rule="nonzero">
                    <circle cx="13" cy="13" r="13" fill="url(#icon3-a)" />
                    <path fill="#4F46E5" fill-opacity=".56" d="M0 13a12.966 12.966 0 0 0 4.39 9.737l1.15-1.722s.82-.237.997-.555c.554-.997-.43-2.733-.43-2.733a5.637 5.637 0 0 0-.198-1.23c-.148-.369-1.182-.874-1.182-.874S3.73 13.998 3.73 13a1.487 1.487 0 0 1 1.404-1.55 2.424 2.424 0 0 0 1.588-1.146s1.256-.332 1.551-.847c.295-.515-.332-2.36-.332-2.36a3.086 3.086 0 0 0-.012-1.481 2.8 2.8 0 0 0-.93-1.12 6.143 6.143 0 0 0-1.447-2.148A12.981 12.981 0 0 0 0 13ZM13 0c-.35 0-.696.018-1.04.045-.112.35-.695 1.248-.548 1.653.147.406 1.353.783 1.353.783s-.32 1.25.235 1.692c.554.443 1.44-.148 1.773-.037.331.111.258 2.29.258 2.29s1.07 1.181 2.124 1.33c1.053.147 2.656-1.64 2.656-1.64a21.131 21.131 0 0 0 3.448-1.102A12.974 12.974 0 0 0 13 0Z" />
                    <path fill="#6366F1" fill-opacity=".4" d="M21.398 13.848c.296.702-.555 2.494-1.256 2.843a4.76 4.76 0 0 0-1.82 1.452c-.259.406-.598 2.082-1.447 2.415-.85.332-2.863 2.228-3.934 1.932-1.071-.296-1.071-2.842-.333-3.988.441-.683-.074-2.179-.113-2.695-.039-.517-1.586-1.478-1.586-1.994 0-.813 1.772-2.955 1.772-2.955s1.453-.48 1.896-.37c.448.164.877.374 1.28.628.782.058 1.552.22 2.29.48l.848.775s2.107.777 2.403 1.477Z" />
                </g>
            </svg>

        </div>
        <h2>
            <span class="flex tabular-nums text-slate-900 text-5xl font-extrabold mb-2 transition-[_--num] duration-[3s] ease-out [counter-set:_num_var(--num)] supports-[counter-set]:before:content-[counter(num)]" x-data="{ shown: false }" x-intersect="shown = true" :class="shown && '[--num:149]'">
                <span class="supports-[counter-set]:sr-only">149</span>+
            </span>
            <span class="inline-flex font-semibold bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-indigo-300 mb-2">Workshops</span>
        </h2>
        <p class="text-sm text-slate-500">Many desktop publishing packages and web page editors now use Pinky as their default model text.</p>
    </article>
</section>

<div class="bg-white dark:bg-gray-900 mt-24">
    <section id="features" class="relative block px-6 py-10 md:py-20 md:px-10  border-t border-b border-gray-900 bg-gray-900/30">
        <div class="relative mx-auto max-w-5xl text-center">
            <h2 class="block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-3xl sm:text-4xl">
                TESTIMONIALS
            </h2>
            <p class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur veniam.
            </p>
        </div>
        <div class="relative mx-auto max-w-7xl z-10 grid grid-cols-1 gap-10 pt-14 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($reviews as $row)
            <div class="rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow">
                <div class="mb-6 flex justify-center">
                    <img alt="" src="{{ asset($row->image) }}" class="w-32 rounded-full shadow-lg dark:shadow-black/30" />
                </div>
                <h3 class="mt-6 text-gray-400">{{ $row->full_name }}</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
                    <span class="inline-block pe-2 [&>svg]:w-5"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 448 512">
                            <path
                                d="M0 216C0 149.7 53.7 96 120 96h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V320 288 216zm256 0c0-66.3 53.7-120 120-120h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H320c-35.3 0-64-28.7-64-64V320 288 216z" />
                        </svg>
                    </span>
                    {{ $row->message }}
                </p>
            </div>
            @endforeach
        </div>
    </section>
</div>

<section class="bg-white dark:bg-white-900 py-16">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-md sm:text-center">
            <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl dark:text-gray-900">Sign up for our newsletter</h2>
            <p class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-900">Stay up to date with the roadmap progress, announcements and exclusive discounts feel free to sign up with your email.</p>
            <form action="#">
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                    <div class="relative w-full">
                        <label for="email" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-white-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter your email" type="email" id="email" required="">
                    </div>
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-sky-600 dark:bg-sky-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Subscribe</button>
                    </div>
                </div>
                <div class="mx-auto max-w-screen-sm text-sm text-left text-gray-500 newsletter-form-footer dark:text-gray-600">We care about the protection of your data. <a href="#" class="font-medium text-sky-900 dark:text-sky-600 hover:underline">Read our Privacy Policy</a>.</div>
            </form>
        </div>
    </div>
</section>

@include('layouts.footer')
@endsection