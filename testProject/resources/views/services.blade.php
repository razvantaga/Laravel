@extends('layouts.index')

@php
$services = DB::table('services')->get();
@endphp

@section('content')
@include('layouts.header')
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
<script src="https://cdn.tailwindcss.com"></script>

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

<div class="relative isolate px-6 pt-14 lg:px-8">
    <section class="pt-20 lg:pt-[120px] pb-12 lg:pb-[90px]">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="text-center mx-auto mb-12 lg:mb-20 max-w-[910px]">
                        <h2 class=" font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4 ">
                            What We Do
                        </h2>
                        <p class="text-lg text-center text-grey-700">Unlock the full potential of your workflow with Loopple. Our platform is designed to streamline your operations and boost productivity. Experience the difference as we help you save time and work more efficiently.</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-4">
                @foreach($services as $row)
                <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                    <div class=" p-10 md:px-7 xl:px-10 rounded-[20px] bg-white shadow-md hover:shadow-lg mb-8 ">
                        <div class=" w-[70px] h-[70px] flex items-center justify-center bg-primary rounded-2xl mb-8">
                            <img alt="" src="{{ asset($row->image) }}" class="w-32 rounded-full shadow-lg dark:shadow-black/30" />
                        </div>
                        <h4 class="font-semibold text-xl text-dark mb-3">{{ $row->name }}</h4>
                        <p class="text-body-color">{{ $row->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="relative isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-4xl text-center">
            <p class="mt-2 text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-6xl">Choose the right plan for you</p>
        </div>
        <p class="mx-auto mt-6 max-w-2xl text-pretty text-center text-lg font-medium text-gray-600 sm:text-xl/8">Choose an affordable plan that’s packed with the best features for engaging your audience, creating customer loyalty, and driving sales.</p>
        <div class="mx-auto mt-16 grid max-w-lg grid-cols-1 items-center gap-y-6 sm:mt-20 sm:gap-y-0 lg:max-w-6xl lg:grid-cols-3">
            <div class="rounded-3xl rounded-t-3xl bg-white/60 p-8 ring-1 ring-gray-900/10 sm:mx-8 sm:rounded-b-none sm:p-10 lg:mx-0 lg:rounded-bl-3xl lg:rounded-tr-none">
                <h3 id="tier-hobby" class="text-base/7 font-semibold text-indigo-600">Hobby</h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-semibold tracking-tight text-gray-900">$29</span>
                    <span class="text-base text-gray-500">/month</span>
                </p>
                <p class="mt-6 text-base/7 text-gray-600">The perfect plan if you&#039;re just getting started with our product.</p>
                <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 sm:mt-10">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        25 products
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Up to 10,000 subscribers
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Advanced analytics
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        24-hour support response time
                    </li>
                </ul>
                <a href="#" aria-describedby="tier-hobby" class="mt-8 block rounded-md px-3.5 py-2.5 text-center text-sm font-semibold text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-10">Get started today</a>
            </div>
            <div class="relative rounded-3xl bg-gray-900 p-8 shadow-2xl ring-1 ring-gray-900/10 sm:p-10">
                <h3 id="tier-enterprise" class="text-base/7 font-semibold text-indigo-400">Enterprise</h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-semibold tracking-tight text-white">$99</span>
                    <span class="text-base text-gray-400">/month</span>
                </p>
                <p class="mt-6 text-base/7 text-gray-300">Dedicated support and infrastructure for your company.</p>
                <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-300 sm:mt-10">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Unlimited products
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Unlimited subscribers
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Advanced analytics
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Dedicated support representative
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Marketing automations
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Custom integrations
                    </li>
                </ul>
                <a href="#" aria-describedby="tier-enterprise" class="mt-8 block rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 sm:mt-10">Get started today</a>
            </div>
            <div class="rounded-3xl rounded-t-3xl bg-white/60 p-8 ring-1 ring-gray-900/10 sm:mx-8 sm:rounded-b-none sm:p-10 lg:mx-0 lg:rounded-br-3xl lg:rounded-tl-none">
                <h3 id="tier-hobby" class="text-base/7 font-semibold text-indigo-600">Hobby</h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-semibold tracking-tight text-gray-900">$29</span>
                    <span class="text-base text-gray-500">/month</span>
                </p>
                <p class="mt-6 text-base/7 text-gray-600">The perfect plan if you&#039;re just getting started with our product.</p>
                <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 sm:mt-10">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        25 products
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Up to 10,000 subscribers
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        Advanced analytics
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                        </svg>
                        24-hour support response time
                    </li>
                </ul>
                <a href="#" aria-describedby="tier-hobby" class="mt-8 block rounded-md px-3.5 py-2.5 text-center text-sm font-semibold text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-10">Get started today</a>
            </div>
        </div>
    </div>
</div>

<section class="py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div
            class="flex flex-col justify-center items-center gap-x-16 gap-y-5 xl:gap-28 lg:flex-row lg:justify-between max-lg:max-w-2xl mx-auto max-w-full">
            <div class="w-full lg:w-1/2">
                <img
                    src="https://pagedone.io/asset/uploads/1696230182.png"
                    alt="FAQ tailwind section"
                    class="w-full rounded-xl object-cover" />
            </div>
            <div class="w-full lg:w-1/2">
                <div class="lg:max-w-xl">
                    <div class="mb-6 lg:mb-16">

                        <h2
                            class="text-4xl text-center font-bold text-gray-900 leading-[3.25rem] mb-5 lg:text-left">
                            Frequently asked questions
                        </h2>
                    </div>
                    <div class="accordion-group" data-accordion="default-accordion">
                        <div
                            class="accordion pb-8 border-b border-solid border-gray-200 active"
                            id="basic-heading-one-with-arrow-always-open">
                            <button
                                class="accordion-toggle group inline-flex items-center justify-between text-xl font-normal leading-8 text-gray-600 w-full transition duration-500 hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:font-medium always-open"
                                aria-controls="basic-collapse-one-with-arrow-always-open">
                                <h5>How to create an account?</h5>
                                <svg
                                    class="text-gray-900 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 22 22"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                            <div
                                id="basic-collapse-one-with-arrow-always-open"
                                class="accordion-content w-full px-0 overflow-hidden pr-4 active"
                                style="max-height: 100px;"
                                aria-labelledby="basic-heading-one-with-arrow-always-open">
                                <p class="text-base font-normal text-gray-600 ">
                                    To create an account, find the 'Sign up' or 'Create
                                    account' button, fill out the registration form with your
                                    personal information, and click 'Create account' or 'Sign
                                    up.' Verify your email address if needed, and then log in
                                    to start using the platform.
                                </p>
                            </div>
                        </div>
                        <div
                            class="accordion py-8 border-b border-solid border-gray-200 "
                            id="basic-heading-two-with-arrow-always-open">
                            <button
                                class="accordion-toggle group inline-flex items-center justify-between font-normal text-xl leading-8 text-gray-600 w-full transition duration-500 hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:font-medium"
                                aria-controls="basic-collapse-two-with-arrow-always-open">
                                <h5>Have any trust issue?</h5>
                                <svg
                                    class="text-gray-900 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 22 22"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                            <div
                                id="basic-collapse-two-with-arrow-always-open"
                                class="accordion-content w-full px-0 overflow-hidden pr-4"
                                aria-labelledby="basic-heading-two-with-arrow-always-open"
                                style="">
                                <p class="text-base text-gray-500 font-normal">
                                    Our focus on providing robust and user-friendly content
                                    management capabilities ensures that you can manage your
                                    content with confidence, and achieve your content
                                    marketing goals with ease.
                                </p>
                            </div>
                        </div>
                        <div
                            class="accordion py-8 border-b border-solid border-gray-200"
                            id="basic-heading-three-with-arrow-always-open">
                            <button
                                class="accordion-toggle group inline-flex items-center justify-between text-xl font-normal leading-8 text-gray-600 w-full transition duration-500 hover:text-indigo-600 accordion-active:font-medium accordion-active:text-indigo-600"
                                aria-controls="basic-collapse-three-with-arrow-always-open">
                                <h5>How can I reset my password?</h5>
                                <svg
                                    class="text-gray-900 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 22 22"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                            <div
                                id="basic-collapse-three-with-arrow-always-open"
                                class="accordion-content w-full px-0 overflow-hidden pr-4"
                                aria-labelledby="basic-heading-three-with-arrow-always-open">
                                <p class="text-base text-gray-500 font-normal">
                                    Our focus on providing robust and user-friendly content
                                    management capabilities ensures that you can manage your
                                    content with confidence, and achieve your content
                                    marketing goals with ease.
                                </p>
                            </div>
                        </div>
                        <div
                            class="accordion py-8 "
                            id="basic-heading-four-with-arrow-always-open">
                            <button
                                class="accordion-toggle group inline-flex items-center justify-between text-xl font-normal leading-8 text-gray-600 w-full transition duration-500 hover:text-indigo-600 accordion-active:font-medium accordion-active:text-indigo-600"
                                aria-controls="basic-collapse-four-with-arrow-always-open">
                                <h5>What is the payment process?</h5>
                                <svg
                                    class="text-gray-900 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 22 22"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                            <div
                                id="basic-collapse-four-with-arrow-always-open"
                                class="accordion-content w-full px-0 overflow-hidden pr-4"
                                aria-labelledby="basic-heading-four-with-arrow-always-open">
                                <p class="text-base text-gray-500 font-normal">
                                    Our focus on providing robust and user-friendly content
                                    management capabilities ensures that you can manage your
                                    content with confidence, and achieve your content
                                    marketing goals with ease.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@include('layouts.footer')
@endsection