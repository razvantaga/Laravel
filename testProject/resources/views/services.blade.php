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

<div class="w-full draggable" draggable="true">
    <div class="container flex flex-col items-center gap-16 mx-auto my-32">
        <div class="grid items-center grid-cols-1 gap-16 lg:grid-cols-2">
            <div class="flex flex-col gap-16">
                <div class="flex flex-col w-10/12 gap-2 text-center mx-auto md:text-start md:ml-0">
                    <h3 class="text-4xl font-extrabold text-dark-grey-900 font-display">Contact Us Today</h3>
                    <p class="text-base font-medium leading-7 text-dark-grey-600">Don't hesitate to reach out if you have any questions or need assistance. We're here to help with all your needs.</p>
                </div>
                <div class="grid w-full grid-cols-2 gap-x-5 gap-y-16">
                    <div class="flex flex-col items-center gap-3 text-center md:text-start md:items-start">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M20.21 9.17135L14 3.13135C13.474 2.6312 12.7759 2.3523 12.05 2.3523C11.3241 2.3523 10.626 2.6312 10.1 3.13135L3.89 9.13135C3.61408 9.37221 3.39216 9.66866 3.23879 10.0013C3.08541 10.3339 3.00404 10.6951 3 11.0613V19.6413C3.01054 20.369 3.30904 21.0627 3.83012 21.5707C4.35119 22.0786 5.05235 22.3594 5.78 22.3513H18.22C18.9476 22.3594 19.6488 22.0786 20.1699 21.5707C20.691 21.0627 20.9895 20.369 21 19.6413V11.0613C20.9992 10.7098 20.929 10.3619 20.7935 10.0376C20.6579 9.71324 20.4596 9.41887 20.21 9.17135ZM11.44 4.57135C11.593 4.43151 11.7927 4.35397 12 4.35397C12.2073 4.35397 12.407 4.43151 12.56 4.57135L18 9.85135L12.53 15.1313C12.377 15.2712 12.1773 15.3487 11.97 15.3487C11.7627 15.3487 11.563 15.2712 11.41 15.1313L6 9.85135L11.44 4.57135ZM19 19.6413C18.9871 19.8376 18.8987 20.0213 18.7532 20.1537C18.6078 20.2861 18.4166 20.3569 18.22 20.3513H5.78C5.58338 20.3569 5.39225 20.2861 5.24678 20.1537C5.10132 20.0213 5.01286 19.8376 5 19.6413V11.7014L9.05 15.6013L7.39 17.2014C7.20375 17.3887 7.09921 17.6422 7.09921 17.9064C7.09921 18.1705 7.20375 18.424 7.39 18.6113C7.48295 18.7089 7.59463 18.7866 7.71836 18.8398C7.84208 18.8931 7.9753 18.9208 8.11 18.9213C8.36747 18.9203 8.61462 18.82 8.8 18.6413L10.57 16.9413C11.0096 17.21 11.5148 17.3521 12.03 17.3521C12.5452 17.3521 13.0504 17.21 13.49 16.9413L15.26 18.6413C15.4454 18.82 15.6925 18.9203 15.95 18.9213C16.0847 18.9208 16.2179 18.8931 16.3416 18.8398C16.4654 18.7866 16.5771 18.7089 16.67 18.6113C16.8563 18.424 16.9608 18.1705 16.9608 17.9064C16.9608 17.6422 16.8563 17.3887 16.67 17.2014L15 15.6013L19 11.7014V19.6413Z" fill="#1B2559"></path>
                            </svg>
                        </span>
                        <h3 class="text-2xl font-extrabold text-dark-grey-900 font-display">Email</h3>
                        <a class="text-lg font-bold text-blue-500" href="mailto: hello@loopple.com">hello@loopple.com</a>
                    </div>
                    <div class="flex flex-col items-center gap-3 text-center md:text-start md:items-start">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M19.41 13.7027C19.1901 13.7027 18.96 13.6308 18.74 13.5795C18.2949 13.4772 17.8572 13.3434 17.43 13.1789C16.9661 13.0056 16.4562 13.0146 15.9984 13.2042C15.5405 13.3938 15.1671 13.7506 14.95 14.2059L14.73 14.6784C13.7589 14.1127 12.8617 13.4225 12.0601 12.6243C11.2829 11.801 10.6108 10.8796 10.0601 9.88216L10.5201 9.66648C10.9634 9.44353 11.3108 9.06006 11.4954 8.58984C11.6801 8.11963 11.6888 7.59591 11.5201 7.11946C11.3612 6.67684 11.231 6.22397 11.13 5.76378C11.08 5.53784 11.04 5.30162 11.01 5.07567C10.8886 4.35226 10.5197 3.69714 9.96967 3.2283C9.41967 2.75946 8.72475 2.5077 8.01005 2.51838H5.00005C4.5773 2.51781 4.1592 2.60901 3.77317 2.786C3.38714 2.963 3.04189 3.22178 2.76005 3.5454C2.47237 3.8778 2.25817 4.27023 2.13215 4.69571C2.00614 5.12119 1.97131 5.56965 2.03005 6.01027C2.57364 10.2849 4.47526 14.2559 7.44005 17.3076C10.4114 20.3525 14.2779 22.3055 18.4401 22.8638C18.5699 22.874 18.7002 22.874 18.83 22.8638C19.5675 22.8649 20.2794 22.587 20.83 22.0832C21.1452 21.7938 21.3971 21.4392 21.5695 21.0427C21.7418 20.6463 21.8306 20.2169 21.83 19.7827V16.7016C21.8247 15.992 21.5809 15.306 21.14 14.7596C20.6991 14.2132 20.088 13.8399 19.41 13.7027ZM19.9 19.8649C19.8997 20.0082 19.8702 20.1498 19.8134 20.2807C19.7565 20.4116 19.6736 20.5288 19.57 20.6249C19.4604 20.7274 19.33 20.8037 19.1882 20.8481C19.0464 20.8925 18.8967 20.9039 18.75 20.8816C15.0183 20.3811 11.5503 18.6345 8.88005 15.9108C6.20752 13.166 4.49208 9.59189 4.00005 5.74324C3.97833 5.59261 3.98949 5.43891 4.03272 5.29325C4.07596 5.1476 4.1502 5.01364 4.25005 4.90108C4.34467 4.7934 4.46043 4.70752 4.5897 4.6491C4.71897 4.59069 4.85882 4.56106 5.00005 4.56216H8.00005C8.23121 4.55636 8.45719 4.63301 8.63951 4.77907C8.82184 4.92513 8.94925 5.13156 9.00005 5.36324C9.00005 5.64054 9.09005 5.92811 9.15005 6.2054C9.26563 6.74342 9.41937 7.27204 9.61005 7.78702L8.21005 8.46486C7.96941 8.57831 7.78241 8.78514 7.69005 9.04C7.59003 9.29004 7.59003 9.5705 7.69005 9.82054C9.12925 12.9866 11.6073 15.5316 14.69 17.0097C14.9335 17.1124 15.2066 17.1124 15.45 17.0097C15.6982 16.9149 15.8996 16.7228 16.01 16.4757L16.64 15.0378C17.156 15.231 17.6838 15.3889 18.22 15.5103C18.48 15.5719 18.76 15.6232 19.0301 15.6643C19.2556 15.7165 19.4566 15.8473 19.5989 16.0346C19.7411 16.2219 19.8157 16.4539 19.81 16.6913L19.9 19.8649ZM14 2.4054C13.7701 2.4054 13.53 2.4054 13.3 2.4054C13.0348 2.42856 12.7894 2.55896 12.6178 2.76794C12.4462 2.97692 12.3625 3.24734 12.385 3.51973C12.4076 3.79211 12.5346 4.04414 12.738 4.22038C12.9415 4.39661 13.2048 4.48261 13.47 4.45946H14C15.5913 4.45946 17.1175 5.10868 18.2427 6.26431C19.3679 7.41994 20 8.98731 20 10.6216C20 10.8065 20 10.9811 20 11.1659C19.9779 11.4369 20.0612 11.7058 20.2318 11.9137C20.4024 12.1216 20.6463 12.2516 20.91 12.2751H20.99C21.2404 12.2762 21.482 12.1807 21.6671 12.0077C21.8523 11.8347 21.9675 11.5966 21.99 11.3405C21.99 11.1043 21.99 10.8578 21.99 10.6216C21.9901 8.44432 21.1486 6.35605 19.6504 4.81551C18.1523 3.27496 16.12 2.40812 14 2.4054ZM16 10.6216C16 10.894 16.1054 11.1552 16.2929 11.3478C16.4805 11.5404 16.7348 11.6486 17 11.6486C17.2653 11.6486 17.5196 11.5404 17.7072 11.3478C17.8947 11.1552 18 10.894 18 10.6216C18 9.53208 17.5786 8.48717 16.8285 7.71675C16.0783 6.94633 15.0609 6.51351 14 6.51351C13.7348 6.51351 13.4805 6.62172 13.2929 6.81432C13.1054 7.00693 13 7.26815 13 7.54054C13 7.81292 13.1054 8.07415 13.2929 8.26676C13.4805 8.45936 13.7348 8.56756 14 8.56756C14.5305 8.56756 15.0392 8.78397 15.4143 9.16918C15.7893 9.55439 16 10.0769 16 10.6216Z" fill="#1B2559"></path>
                            </svg>
                        </span>
                        <h3 class="text-2xl font-extrabold text-dark-grey-900 font-display">Phone</h3>
                        <a class="text-lg font-bold text-blue-500" href="tel:+516-486-5135">+516-486-5135</a>
                    </div>
                    <div class="flex flex-col items-center gap-3 text-center md:text-start md:items-start">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M20.46 9.89026C20.3196 8.38969 19.8032 6.95202 18.9612 5.71727C18.1191 4.48251 16.9801 3.49274 15.655 2.84434C14.3299 2.19594 12.8639 1.911 11.3997 2.01728C9.93555 2.12356 8.52314 2.61743 7.3 3.45081C6.2492 4.17244 5.36706 5.12414 4.71695 6.23753C4.06684 7.35092 3.6649 8.59837 3.54 9.89026C3.41749 11.1737 3.57468 12.469 4.00017 13.6823C4.42567 14.8956 5.1088 15.9964 6 16.9049L11.3 22.3584C11.393 22.4546 11.5036 22.531 11.6254 22.5832C11.7473 22.6353 11.878 22.6622 12.01 22.6622C12.142 22.6622 12.2727 22.6353 12.3946 22.5832C12.5164 22.531 12.627 22.4546 12.72 22.3584L18 16.9049C18.8912 15.9964 19.5743 14.8956 19.9998 13.6823C20.4253 12.469 20.5825 11.1737 20.46 9.89026ZM16.6 15.4568L12 20.1811L7.4 15.4568C6.72209 14.7605 6.20281 13.9186 5.87947 12.9916C5.55614 12.0647 5.43679 11.0757 5.53 10.0957C5.62382 9.10059 5.93177 8.13935 6.43157 7.28145C6.93138 6.42356 7.61056 5.69045 8.42 5.13513C9.48095 4.41132 10.7263 4.02522 12 4.02522C13.2737 4.02522 14.5191 4.41132 15.58 5.13513C16.387 5.6883 17.0647 6.41817 17.5644 7.27231C18.064 8.12644 18.3733 9.08364 18.47 10.0751C18.5663 11.0584 18.4484 12.0514 18.125 12.9822C17.8016 13.9129 17.2807 14.7582 16.6 15.4568ZM12 6.16216C11.11 6.16216 10.24 6.43321 9.49994 6.94104C8.75992 7.44887 8.18314 8.17067 7.84255 9.01516C7.50195 9.85965 7.41284 10.7889 7.58647 11.6854C7.7601 12.5819 8.18869 13.4054 8.81802 14.0518C9.44736 14.6981 10.2492 15.1383 11.1221 15.3166C11.995 15.4949 12.8998 15.4034 13.7221 15.0536C14.5443 14.7038 15.2471 14.1114 15.7416 13.3514C16.2361 12.5914 16.5 11.6978 16.5 10.7838C16.4974 9.55888 16.0224 8.38493 15.1791 7.51879C14.3357 6.65266 13.1927 6.16487 12 6.16216ZM12 13.3513C11.5055 13.3513 11.0222 13.2008 10.6111 12.9186C10.2 12.6365 9.87952 12.2355 9.6903 11.7663C9.50109 11.2972 9.45158 10.7809 9.54804 10.2829C9.6445 9.78481 9.88261 9.32731 10.2322 8.96823C10.5819 8.60915 11.0273 8.36462 11.5123 8.26555C11.9972 8.16648 12.4999 8.21732 12.9567 8.41165C13.4135 8.60599 13.804 8.93508 14.0787 9.35731C14.3534 9.77955 14.5 10.276 14.5 10.7838C14.5 11.4647 14.2366 12.1178 13.7678 12.5993C13.2989 13.0808 12.663 13.3513 12 13.3513Z" fill="#1B2559"></path>
                            </svg>
                        </span>
                        <h3 class="text-2xl font-extrabold text-dark-grey-900 font-display">Location</h3>
                        <a class="text-lg font-bold text-blue-500" target="_blank" href="https://goo.gl/maps/QcWzYETAh4FS3KTD7">San Francisco, CA 10924</a>
                    </div>
                    <div class="flex flex-col items-center gap-3 text-center md:text-start md:items-start">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M11 2.05405C9.02219 2.05405 7.08879 2.65639 5.4443 3.7849C3.79981 4.91341 2.51809 6.51741 1.76121 8.39405C1.00433 10.2707 0.806299 12.3357 1.19215 14.3279C1.578 16.3202 2.53041 18.1502 3.92894 19.5865C5.32746 21.0228 7.10929 22.001 9.0491 22.3972C10.9889 22.7935 12.9996 22.5901 14.8268 21.8128C16.6541 21.0355 18.2159 19.7191 19.3147 18.0302C20.4135 16.3412 21 14.3556 21 12.3243C21 10.9756 20.7413 9.6401 20.2388 8.39405C19.7363 7.14801 18.9997 6.01582 18.0711 5.06214C17.1425 4.10846 16.0401 3.35195 14.8268 2.83582C13.6136 2.3197 12.3132 2.05405 11 2.05405ZM11 20.5405C9.41775 20.5405 7.87104 20.0587 6.55544 19.1558C5.23985 18.253 4.21447 16.9698 3.60897 15.4685C3.00347 13.9672 2.84504 12.3152 3.15372 10.7214C3.4624 9.12762 4.22433 7.66363 5.34315 6.51457C6.46197 5.36552 7.88743 4.583 9.43928 4.26597C10.9911 3.94895 12.5997 4.11166 14.0615 4.73352C15.5233 5.35539 16.7727 6.40848 17.6518 7.75963C18.5308 9.11078 19 10.6993 19 12.3243C19 14.5034 18.1572 16.5932 16.6569 18.1341C15.1566 19.6749 13.1217 20.5405 11 20.5405ZM14.1 12.9713L12 11.7286V7.18918C12 6.9168 11.8946 6.65557 11.7071 6.46296C11.5196 6.27036 11.2652 6.16215 11 6.16215C10.7348 6.16215 10.4804 6.27036 10.2929 6.46296C10.1054 6.65557 10 6.9168 10 7.18918V12.3243C10 12.3243 10 12.4065 10 12.4476C10.0059 12.5183 10.0228 12.5877 10.05 12.653C10.0706 12.7139 10.0974 12.7724 10.13 12.8276C10.1574 12.8859 10.1909 12.941 10.23 12.9919L10.39 13.1254L10.48 13.2178L13.08 14.7584C13.2324 14.8471 13.4048 14.8931 13.58 14.8919C13.8014 14.8935 14.0171 14.8195 14.1932 14.6817C14.3693 14.5438 14.4959 14.3499 14.5531 14.1302C14.6103 13.9105 14.5948 13.6775 14.5092 13.4678C14.4236 13.2581 14.2726 13.0835 14.08 12.9713H14.1Z" fill="#1B2559"></path>
                            </svg>
                        </span>
                        <h3 class="text-2xl font-extrabold text-dark-grey-900 font-display">Working Hours</h3>
                        <a class="text-lg font-bold text-blue-500" target="_blank">08:00 AM-10:00 PM</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-5 p-10 bg-white rounded-3xl shadow-main">
                <h3 class="text-2xl font-bold text-dark-grey-900 font-display">Send a message</h3>
                <form class="flex flex-col gap-6">
                    <label class="flex flex-col gap-2 text-sm font-medium text-dark-grey-700" for="full-name">
                        Full Name
                        <input class="p-4 border border-solid outline-none rounded-xl placeholder:text-sm placeholder:font-medium placeholder:text-dark-grey-500 border-grey-500 focus:border-grey-600" placeholder="Your full name " type="text" id="full-name">
                    </label>
                    <label class="flex flex-col gap-2 text-sm font-medium text-dark-grey-700" for="email">
                        Your Email
                        <input class="p-4 border border-solid outline-none rounded-xl placeholder:text-sm placeholder:font-medium placeholder:text-dark-grey-500 border-grey-500 focus:border-grey-600" placeholder="Your email address " type="email" id="email">
                    </label>
                    <label class="flex flex-col gap-2 text-sm font-medium text-dark-grey-700" for="message">
                        Message
                        <textarea rows="5" class="p-4 border border-solid outline-none rounded-xl placeholder:text-sm placeholder:font-medium placeholder:text-dark-grey-500 border-grey-500 focus:border-grey-600" placeholder="Your message" id="message" spellcheck="false"></textarea>
                    </label>
                    <button class="flex items-center justify-center py-4 text-center text-white px-7 rounded-2xl bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-purple-blue-100 transition duration-300">Submit message</button>
                </form>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')
@endsection