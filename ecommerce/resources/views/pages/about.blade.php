@extends('layouts.app')
@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_responsive.css')}}">

<!-- About 7 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                <h2 class="mb-4 display-5 text-center">About Us</h2>
                <p class="text-secondary mb-5 text-center lead fs-4">We believe in the power of teamwork and collaboration. Our diverse experts work tirelessly to deliver innovative solutions tailored to our clients' needs.</p>
                <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row gy-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 col-lg-6">
                <img class="img-fluid rounded border border-dark" loading="lazy" src="{{asset('frontend/images/about.jpeg')}}" style="height: 450px;" alt="About Us">
            </div>
            <div class="col-12 col-lg-6 col-xxl-6">
                <div class="row justify-content-lg-end">
                    <div class="col-12 col-lg-11">
                        <div class="about-wrapper">
                            <p class="lead mb-4 mb-md-5">As a socially responsible entity, we are deeply committed to positively impacting the communities we serve and the world at large. Through various initiatives and partnerships, we actively contribute to environmental sustainability, social welfare, and educational advancement.</p>
                            <div class="row gy-4 mb-4 mb-md-5">
                                <div class="col-12 col-md-6">
                                    <div class="card border border-dark">
                                        <div class="card-body p-4">
                                            <h3 class="display-5 fw-bold text-primary text-center mb-2">370+</h3>
                                            <p class="fw-bold text-center m-0">Qualified Experts</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="card border border-dark">
                                        <div class="card-body p-4">
                                            <h3 class="display-5 fw-bold text-primary text-center mb-2">18k+</h3>
                                            <p class="fw-bold text-center m-0">Satisfied Clients</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('frontend/js/cart_custom.js')}}"></script>
@endsection