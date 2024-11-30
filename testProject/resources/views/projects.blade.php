@extends('layouts.index')

@section('content')
@include('layouts.header')

@php
    $projects = DB::table('projects')->get();
@endphp

<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
<script src="https://cdn.tailwindcss.com"></script>

<div class="relative isolate px-6 pt-14 lg:px-8">
    <div class="bg-white mt-4">
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="mx-auto max-w-2xl py-16">
                <div class="text-center">
                    <h1 class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Innovation and performance in every project</h1>
                    <p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat.</p>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-white dark:bg-white-900 antialiased">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-white-900 sm:text-4xl dark:text-gray">
                    Our work
                </h2>
                <p class="mt-4 text-base font-normal text-gray-500 sm:text-xl dark:text-gray-400">
                    Crafted with skill and care to help our clients grow their business!
                </p>
            </div>

            <div class="grid grid-cols-1 mt-12 text-center sm:mt-16 gap-x-20 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                <div class="space-y-4">
                    <span
                        class="bg-gray-100 text-gray-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                        Alphabet Inc.
                    </span>
                    <h3 class="text-2xl font-bold leading-tight text-gray-900 dark:text-gray">
                        Official website
                    </h3>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400">
                        Flowbite helps you connect with friends, family and communities of people who share your interests.
                    </p>
                    <a href="#" title=""
                        class="text-white bg-primary-700 justify-center hover:bg-primary-800 inline-flex items-center  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        role="button">
                        View case study
                        <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <div class="space-y-4">
                    <span
                        class="bg-gray-100 text-gray-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                        Microsoft Corp.
                    </span>
                    <h3 class="text-2xl font-bold leading-tight text-gray-900 dark:text-gray">
                        Management system
                    </h3>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400">
                        Flowbite helps you connect with friends, family and communities of people who share your interests.
                    </p>
                    <a href="#" title=""
                        class="text-white bg-primary-700 justify-center hover:bg-primary-800 inline-flex items-center  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        role="button">
                        View case study
                        <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <div class="space-y-4">
                    <span
                        class="bg-gray-100 text-gray-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                        Adobe Inc.
                    </span>
                    <h3 class="text-2xl font-bold leading-tight text-gray-900 dark:text-gray">
                        Logo design
                    </h3>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400">
                        Flowbite helps you connect with friends, family and communities of people who share your interests.
                    </p>
                    <a href="#" title=""
                        class="text-white bg-primary-700 justify-center hover:bg-primary-800 inline-flex items-center  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        role="button">
                        View case study
                        <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-white-900 antialiase">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-white-900 sm:text-4xl dark:text-gray">
                    Our projects
                </h2>
                <p class="mt-4 text-base font-normal text-gray-500 sm:text-xl dark:text-gray-400">
                    Crafted with skill and care to help our clients grow their business!
                </p>
            </div>

            <div class="flex flex-wrap -mx-4 py-16">
                @foreach($projects as $row)
                <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                    <div class="py-8 md:px-7 xl:px-10 rounded-[20px] bg-white shadow-md hover:shadow-lg mb-8 flex flex-col items-center">
                        <div class="">
                            <img class="mb-8 rounded-lg" src="{{ asset($row->image) }}" alt="">
                        </div>
                        <h4 class="font-semibold text-xl text-dark mb-3">{{ $row->name }}</h4>
                        <p class="text-body-color mb-8 text-center">{{ $row->description }}</p>
                        <div class="flex justify-center">
                            <form action="{{ url('single-project/' . $row->id) }}" method="get">
                                @csrf
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<section class="mb-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl py-10 px-10 xl:py-16 xl:px-20 bg-slate-100  flex items-center justify-between flex-col gap-16 lg:flex-row">
            <div class="w-full lg:w-60">
                <h2
                    class="font-manrope text-4xl font-bold text-gray-900 mb-4 text-center lg:text-left">
                    Our Stats
                </h2>
                <p class="text-sm text-gray-500 leading-6 text-center lg:text-left">
                    We help you to unleash the power within your business
                </p>
            </div>
            <div class="w-full lg:w-4/5">
                <div
                    class="flex flex-col flex-1 gap-10 lg:gap-0 lg:flex-row lg:justify-between">
                    <div class="block">
                        <div
                            class="font-manrope font-bold text-4xl text-indigo-600 mb-3 text-center lg:text-left">
                            260+
                        </div>
                        <span class="text-gray-900 text-center block lg:text-left">Expert Consultants
                        </span>
                    </div>
                    <div class="block">
                        <div
                            class="font-manrope font-bold text-4xl text-indigo-600 mb-3 text-center lg:text-left">
                            975+
                        </div>
                        <span class="text-gray-900 text-center block lg:text-left">Active Clients
                        </span>
                    </div>
                    <div class="block">
                        <div
                            class="font-manrope font-bold text-4xl text-indigo-600 mb-3 text-center lg:text-left">
                            724+
                        </div>
                        <span class="text-gray-900 text-center block lg:text-left">Projects Delivered</span>
                    </div>
                    <div class="block">
                        <div
                            class="font-manrope font-bold text-4xl text-indigo-600 mb-3 text-center lg:text-left">
                            89+
                        </div>
                        <span class="text-gray-900 text-center block lg:text-left">Orders in Queue</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
@endsection