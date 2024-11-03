@php
$setting = DB::table('sitesetting')->first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
	<title>OneTech</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/bootstrap4/bootstrap.min.css')}}">
	<link href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/slick-1.8.0/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/main_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	<link rel="stylesheet" href="sweetalert2.min.css">
	<script src="https://js.stripe.com/v3/"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

	<div class="super_container">

		<!-- Header -->
		<header class="header" style="background-color: #eff6fa;">
			<!-- Header Main -->
			<div class="header_main">
				<div class="container">
					<div class="row">

						<!-- Logo -->
						<div class="col-lg-2 col-sm-3 col-3 order-1">
							<div class="logo_container">
								<div class="logo"><a href="{{url('/')}}"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a></div>
							</div>
						</div>

						<!-- Search -->
						<div class="col-lg-5 col-12 order-lg-2 order-3 text-lg-left text-right">
							<div class="header_search">
								<div class="header_search_content">
									<div class="header_search_form_container">
										<form method="post" action="{{ route('product.search') }}" class="header_search_form clearfix">
											@csrf
											<input type="search" required="required" class="header_search_input" placeholder="Search for products..." name="search">
											<div class="">
												<div class="custom_dropdown_list">
													<span class="custom_dropdown_placeholder clc"></span>


													@php
													$category = DB::table('categories')->get();
													@endphp
													<ul class="custom_list clc">
														@foreach ($category as $cat)
														<li><a class="clc" href="#">{{ $cat->category_name }}</a></li>
														@endforeach
													</ul>
												</div>
											</div>
											<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('frontend/images/search.png')}}" alt=""></button>
										</form>
									</div>
								</div>
							</div>
						</div>

						<!-- Wishlist -->
						<div class="col-lg-5 col-9 order-lg-3 order-2 text-lg-left text-right">
							<div class="wishlist_cart d-flex flex-row align-items-center justify-content-between">
								<div class="top_bar_user">
									@guest
									<div class="user_icon"><img src="{{asset('frontend/images/user.png')}}" alt=""></div>
									<div class="profile_text"><a href="{{ route('register') }}">Register</a></div>
									<div class="profile_text"><a href="{{ route('login') }}">Sign in</a></div>
									@else
									<ul class="standard_dropdown top_bar_dropdown">
										<li>
											<a href="{{ route('home') }}">
												<div class="user_icon"><img src="{{asset('frontend/images/user.png')}}" alt=""></div>
												<span class="profile_text">Profile<i class="fas fa-chevron-down"></i></span>
											</a>
											<ul>
												<li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
												<li><a href="{{ route('user.checkout') }}">Checkout</a></li>
											</ul>
										</li>
									</ul>
									@endguest
								</div>

								<div class=" d-flex flex-row align-items-center justify-content-end">
									@guest
									@else
									@php
									$wishlist = DB::table('wishlists')->where('user_id', Auth::id())->get();
									@endphp
									<div class="wishlist_icon"><img src="{{asset('frontend/images/heart.png')}}" alt=""></div>
									<div class="wishlist_content">
										<div class="wishlist_text"><a href="{{ route('user.wishlist') }}">Wishlist</a></div>
										<div class="wishlist_count">{{ count($wishlist) }}</div>
									</div>
									@endguest
								</div>

								<div class="cart">
									<div class="cart_container d-flex flex-row align-items-center justify-content-end">
										<div class="cart_icon">
											<img src="{{asset('frontend/images/cart.png')}}" alt="">
											<div class="cart_count"><span>{{ Cart::count() }}</span></div>
										</div>
										<div class="cart_content">
											<div class="cart_text"><a href="{{ route('show.cart') }}">Cart</a></div>
											<div class="cart_price">$ {{ Cart::subtotal() }} </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>


		@yield('content')
		@php
		$setting = DB::table('sitesetting')->first();
		@endphp

		<!-- Footer -->
		<footer class="footer" style="background-color: #0091E840;">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="footer_column footer_contact">
							<div class="logo_container">
								<div class="logo"><a href="{{url('/')}}"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a></div>
							</div>

							<div class="footer_contact_text">
								<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt doloribus vitae accusantium, non quisquam ex at porro ea maiores ipsum!</p>
							</div>
							<a href="{{ route('contact.page') }}" class="btn btn-primary btn-lg active mt-3">Contact us</a>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="footer_column">
							<div class="footer_title">MENIU</div>
							<ul class="footer_list">
								<li><a href="{{ url('/') }}">Home</a></li>
								<li><a href="{{ route('blog.post') }}">Blog</a></li>
								<li><a href="{{ route('about') }}">About</a></li>
								<li><a href="{{ route('contact.page') }}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="footer_column">
							<div class="footer_title">DATE DE CONTACT</div>
							<ul class="footer_list footer_list">
								<li>
									<div class="footer_phone"><i class="bi bi-telephone fs-5 me-2 text-primary mr-3"></i>{{ $setting->phone_tow }}</div>
								</li>
								<li>
									<div class="footer_phone"><i class="bi bi-envelope fs-5 me-2 text-primary mr-3"></i>{{ $setting->email }}</div>
								</li>
								<li>
									<div class="footer_contact_text d-flex">
										<i class="bi bi-geo-alt fs-4 me-2 text-primary mt-3 mr-3"></i><p class="footer_phone">{{ $setting->company_address }}</p>
									</div>
								</li>
								<div class="footer_social">
									<ul>
										<li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
										<li><a href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
										<li><a href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a></li>
									</ul>
								</div>
							</ul>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="footer_column">
							<div class="footer_title">ALTE INFORMATII</div>
							<ul class="footer_list">
								<li><a href="#">My Account</a></li>
								<li><a href="#">Order Tracking</a></li>
								<li><a href="#">Wish List</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Returns / Exchange</a></li>
								<li><a href="#">FAQs</a></li>
								<li><a href="#">Product Support</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row mt-5">
					<div class="col">
						<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
							<div class="newsletter_title_container">
								<div class="newsletter_icon"><img src="{{asset('frontend/images/send.png')}}" alt=""></div>
								<div class="newsletter_title">Sign up for Newsletter</div>
								<div class="newsletter_text">
									<p>...and receive 20% coupon for first shopping.</p>
								</div>
							</div>
							<div class="newsletter_content clearfix">
								<form action="{{ route('store.newslatter') }}" method="post" class="newsletter_form">
									@csrf
									<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address" name="email">
									<button class="newsletter_button" type="submit">Subscribe</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<hr>
				<div class="row">
					<div class="col">

						<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
							<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</div>
							<div class="logos ml-sm-auto">
								<ul class="logos_list">
									<li><a href="#"><img src="{{asset('frontend/images/logos_1.png')}}" alt=""></a></li>
									<li><a href="#"><img src="{{asset('frontend/images/logos_2.png')}}" alt=""></a></li>
									<li><a href="#"><img src="{{asset('frontend/images/logos_3.png')}}" alt=""></a></li>
									<li><a href="#"><img src="{{asset('frontend/images/logos_4.png')}}" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>


	<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('frontend/styles/bootstrap4/popper.js')}}"></script>
	<script src="{{asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="{{asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
	<script src="{{asset('frontend/plugins/slick-1.8.0/slick.js')}}"></script>
	<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
	<script src="{{asset('frontend/js/custom.js')}}"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="{{asset('frontend/js/product_custom.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

	@if(Session::has('message'))
	<script>
		var type = "{{ Session::get('alert-type', 'info') }}";
		switch (type) {
			case 'info':
				toastr.info("{{ Session::get('message') }}");
				break;
			case 'success':
				toastr.success("{{ Session::get('message') }}");
				break;
			case 'warning':
				toastr.warning("{{ Session::get('message') }}");
				break;
			case 'error':
				toastr.error("{{ Session::get('message') }}");
				break;
		}
	</script>
	@endif

	<script>
		$(document).on("click", "#return", function(e) {
			e.preventDefault();
			var link = $(this).attr("href");
			swal({
					title: "Are you Want to return?",
					text: "Once return, this will return your money!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						window.location.href = link;
					} else {
						swal("Cancel!");
					}
				});
		});
	</script>
</body>

</html>