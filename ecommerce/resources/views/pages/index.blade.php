@extends('layouts.app')

@section('content')

@include('layouts.menubar')
@include('layouts.slider')

@php
use Carbon\Carbon;

$feature = DB::table('products')->where('status', 1)->orderBy('id', 'desc')->limit(12)->get();
$hot_new = DB::table('products')->where('status', 1)->where('hot_new', 1)->orderBy('id', 'desc')->limit(8)->get();
$best = DB::table('products')->where('status', 1)->where('best_rated', 1)->orderBy('id', 'desc')->limit(8)->get();

$hot_deal = DB::table('products')
			->join('brands', 'products.brand_id', 'brands.id')
			->select('products.*', 'brands.brand_name')
			->where('products.status', 1)->where('hot_deal', 1)->orderBy('id', 'desc')->limit(3)->get();

$category = DB::table('categories')->get();

$mid_slider = DB::table('products')
				->join('categories', 'products.category_id', 'categories.id')
				->join('brands', 'products.brand_id', 'brands.id')
				->select('products.*', 'categories.category_name', 'brands.brand_name')
				->where('products.mid_slider', 1)->orderBy('id', 'desc')->limit(3)->get();

$cats = DB::table('categories')->first();
$cat_id = $cats->id;

$product = DB::table('products')
			->where('status', 1)
			->where('created_at', '>=', Carbon::now()->subWeek())
			->orderBy('id', 'DESC')
			->get();

$product_best = DB::table('products')
				->where('status', 1)
				->join('categories', 'products.category_id', 'categories.id')
				->select('products.*', 'categories.category_name')
				->whereNotNull('discount_price')
				->orderBy('discount_price', 'DESC')->limit(30)
				->get();

@endphp

<div class="characteristics">
	<div class="container">
		<div class="row">

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="{{asset('frontend/images/char_1.png')}}" alt=""></div>
					<div class="char_content">
						<div class="char_title">Free Delivery</div>
						<div class="char_subtitle">from $150</div>
					</div>
				</div>
			</div>

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="{{asset('frontend/images/char_2.png')}}" alt=""></div>
					<div class="char_content">
						<div class="char_title">Free Delivery</div>
						<div class="char_subtitle">from $50</div>
					</div>
				</div>
			</div>

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="{{asset('frontend/images/char_3.png')}}" alt=""></div>
					<div class="char_content">
						<div class="char_title">Extra discount</div>
						<div class="char_subtitle">from $150</div>
					</div>
				</div>
			</div>

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="{{asset('frontend/images/char_4.png')}}" alt=""></div>
					<div class="char_content">
						<div class="char_title">Extra voucher</div>
						<div class="char_subtitle">from $150</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Deals of the week -->
<div class="deals_featured">
	<div class="container">
		<div class="row">
			<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

				<!-- Deals -->
				<div class="deals">
					<div class="deals_title">Deals of the Week</div>
					<div class="deals_slider_container">

						<!-- Deals Slider -->
						<div class="owl-carousel owl-theme deals_slider">
							@foreach ($hot_deal as $hot)
							<!-- Deals Item -->
							<div class="owl-item deals_item">
								<div class="deals_image"><img src="{{asset($hot->image_one)}}" alt=""></div>
								<div class="deals_content">
									<div class="deals_info_line d-flex flex-row justify-content-start">
										<div class="deals_item_category"><a href="#">{{ $hot->brand_name }}</a></div>
										@if ($hot->discount_price == NULL)
										@else
										<div class="deals_item_price_a ml-auto">${{ $hot->selling_price }}</div>
										@endif
									</div>
									<div class="deals_info_line d-flex flex-row justify-content-start">
										<div class="deals_item_name">{{ $hot->product_name }}</div>
										@if ($hot->discount_price == NULL)
										<div class="deals_item_price ml-auto">${{ $hot->selling_price }}</div>
										@else

										@endif

										@if ($hot->discount_price != NULL)
										<div class="deals_item_price ml-auto">${{ $hot->discount_price }}</div>
										@else

										@endif
									</div>
									<div class="available">
										<div class="available_line d-flex flex-row justify-content-start">
											<div class="available_title">Available: <span>{{ $hot->product_quantity }}</span></div>
											<div class="sold_title ml-auto">Already sold: <span>28</span></div>
										</div>
										<div class="available_bar"><span style="width:17%"></span></div>
									</div>
									<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
										<div class="deals_timer_title_container">
											<div class="deals_timer_title">Hurry Up</div>
											<div class="deals_timer_subtitle">Offer ends in:</div>
										</div>
										<div class="deals_timer_content ml-auto">
											<div class="deals_timer_box clearfix" data-target-time="">
												<div class="deals_timer_unit">
													<div id="deals_timer1_hr" class="deals_timer_hr"></div>
													<span>hours</span>
												</div>
												<div class="deals_timer_unit">
													<div id="deals_timer1_min" class="deals_timer_min"></div>
													<span>mins</span>
												</div>
												<div class="deals_timer_unit">
													<div id="deals_timer1_sec" class="deals_timer_sec"></div>
													<span>secs</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>

					</div>

					<div class="deals_slider_nav_container">
						<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
						<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
					</div>
				</div>

				<!-- Featured -->
				<div class="featured">
					<div class="tabbed_container">
						<div class="tabs">
							<ul class="clearfix">
								<li class="active">Best Discount</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<!-- Product Panel -->
						<div class="product_panel panel active">
							<div class="featured_slider slider">
								@foreach($product_best as $row)
								<!-- Slider Item -->
								<div class="featured_slider_item">
									<div class="border_active"></div>
									<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
										<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset( $row->image_one )}}" alt="" style="height:120px; width:100px"></div>
										<div class="product_content">
											<div class="product_price discount">
												@if($row->discount_price == NULL)
												${{ $row->selling_price }}
												@else
												<span>${{ $row->selling_price }}</span> ${{ $row->discount_price }}
												@endif
											</div>
											<div class="product_name">
												<div><a href="{{ url('product/details/' . $row->id . '/' . $row->product_name ) }}">{{ $row->product_name }}</a></div>
											</div>

											<div class="product_extras d-none">
												<button class="product_cart_button addcart" data-id="{{ $row->id }}">Add to Cart</button>
											</div>

											<div class="product_extras">
												<button id="{{ $row->id }}" class="product_cart_button " data-bs-toggle="modal" data-bs-target="#cartmodal" onclick="productView(this.id)">Add to Cart</button>
											</div>
										</div>

										<button class="addwishlist" data-id="{{ $row->id }}">
											<div class="product_fav"><i class="fas fa-heart"></i></div>
										</button>

										<ul class="product_marks">
											@if ($row->discount_price == NULL)
											<li class="product_mark product_discount" style="background: blue;">New</li>
											@else
											<li class="product_mark product_discount">
												@php
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->discount_price*100;
												@endphp
												{{ intval($discount) }}%
											</li>
											@endif
										</ul>
									</div>
								</div>
								@endforeach
							</div>
							<div class="featured_slider_dots_cover"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- Banner -->
<div class="banner_2 mt-5">
	<div class="banner_2_background" style="background-image: url('{{ asset('frontend/images/banner_2_background.jpg') }}')"></div>
	<div class="banner_2_container">
		<div class="banner_2_dots"></div>
		<!-- Banner 2 Slider -->
		<div class="owl-carousel owl-theme banner_2_slider">
			@foreach ($mid_slider as $row)
			<!-- Banner 2 Slider Item -->
			<div class="owl-item">
				<div class="banner_2_item">
					<div class="container fill_height">
						<div class="row fill_height">
							<div class="col-lg-4 col-md-6 fill_height">
								<div class="banner_2_content">
									<div class="banner_2_category">
										<h4>{{ $row->category_name }}</h4>
									</div>
									<div class="banner_2_title">{{ $row->product_name }}</div>
									<div class="banner_2_text">
										<h4>{{ $row->brand_name }}</h4>
									</div> <br>
									<h2>${{ $row->selling_price }}</h2>
									<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
									<div class="button banner_2_button"><a href="#">Explore</a></div>
								</div>

							</div>
							<div class="col-lg-8 col-md-6 fill_height">
								<div class="banner_2_image_container">
									<div class="banner_2_image"><img src="{{asset( $row->image_one )}}" alt="" style="height:300px; width:250px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

<!-- Hot New Arrivals -->
<div class="new_arrivals">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="tabbed_container">
					<div class="tabs clearfix tabs-right">
						<div class="new_arrivals_title">Products of the week</div>
						<ul class="clearfix">
							<li class="active"></li>
						</ul>
						<div class="tabs_line"><span></span></div>
					</div>
					<div class="row">
						<div class="col-lg-12" style="z-index:1;">

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">
									@foreach($product as $row)
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset( $row->image_one )}}" alt="" style="height:120px; width:100px"></div>
											<div class="product_content">
												<div class="product_price discount">
													@if($row->discount_price == NULL)
													${{ $row->selling_price }}
													@else
													<span>${{ $row->selling_price }}</span> ${{ $row->discount_price }}
													@endif
												</div>
												<div class="product_name">
													<div><a href="product.html">{{ $row->product_name }}</a></div>
												</div>
												<div class="product_extras">
													<div class="product_color">
														<input type="radio" checked name="product_color" style="background:#b19c83">
														<input type="radio" name="product_color" style="background:#000000">
														<input type="radio" name="product_color" style="background:#999999">
													</div>
													<button class="product_cart_button">Add to Cart</button>
												</div>
											</div>

											<button class="addwishlist" data-id="{{ $row->id }}">
												<div class="product_fav"><i class="fas fa-heart"></i></div>
											</button>

											<ul class="product_marks">
												@if ($row->discount_price == NULL)
												<li class="product_mark product_discount" style="background: blue;">New</li>
												@else
												<li class="product_mark product_discount">
													@php
													$amount = $row->selling_price - $row->discount_price;
													$discount = $amount/$row->discount_price*100;
													@endphp
													{{ intval($discount) }}%
												</li>
												@endif
											</ul>
										</div>
									</div>
									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>



						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Best Sellers -->
<div class="best_sellers">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="tabbed_container">
					<div class="tabs clearfix tabs-right">
						<div class="new_arrivals_title">Best Discounts</div>
						<ul class="clearfix">
							<li class="active"></li>
							
						</ul>
						<div class="tabs_line"><span></span></div>
					</div>

					<div class="bestsellers_panel panel active">

						<!-- Best Sellers Slider -->
						<div class="bestsellers_slider slider">
							@foreach($product_best as $row)
								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{asset($row->image_one)}}" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">{{ $row->category_name }}</a></div>
											<div class="bestsellers_name"><a href="product.html">{{ $row->product_name }}</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">${{ $row->discount_price }}<span>${{ $row->selling_price }}</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">
											@php		
												$amount = $row->selling_price - $row->discount_price;
												$discount = $amount/$row->discount_price*100;
											@endphp
												{{ intval($discount) }}%
										</li>
									</ul>
								</div>
							@endforeach
						</div>
					</div>

					<div class="bestsellers_panel panel">

						<!-- Best Sellers Slider -->

						<div class="bestsellers_slider slider">

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_1.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_2.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_3.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_4.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_5.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_6.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_1.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_2.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_3.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_4.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_5.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_6.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

						</div>
					</div>

					<div class="bestsellers_panel panel">

						<!-- Best Sellers Slider -->

						<div class="bestsellers_slider slider">

							<!-- Best Sellers Item -->images/view_5.jpg
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_1.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_2.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_3.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_4.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_5.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_6.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_1.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_2.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_3.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_4.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item discount">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_5.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

							<!-- Best Sellers Item -->
							<div class="bestsellers_item">
								<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
									<div class="bestsellers_image"><img src="{{asset('frontend/images/best_6.png')}}" alt=""></div>
									<div class="bestsellers_content">
										<div class="bestsellers_category"><a href="#">Headphones</a></div>
										<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
										<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="bestsellers_price discount">$225<span>$300</span></div>
									</div>
								</div>
								<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
								<ul class="bestsellers_marks">
									<li class="bestsellers_mark bestsellers_discount">-25%</li>
									<li class="bestsellers_mark bestsellers_new">new</li>
								</ul>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<!-- Brands -->
<div class="brands">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="brands_slider_container">

					<!-- Brands Slider -->

					<div class="owl-carousel owl-theme brands_slider">

						<div class="owl-item">
							<div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_1.jpg')}}" alt=""></div>
						</div>
						<div class="owl-item">
							<div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_2.jpg')}}" alt=""></div>
						</div>
						<div class="owl-item">
							<div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_3.jpg')}}" alt=""></div>
						</div>
						<div class="owl-item">
							<div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_4.jpg')}}" alt=""></div>
						</div>
						<div class="owl-item">
							<div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_5.jpg')}}" alt=""></div>
						</div>
						<div class="owl-item">
							<div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_6.jpg')}}" alt=""></div>
						</div>
						<div class="owl-item">
							<div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_7.jpg')}}" alt=""></div>
						</div>
						<div class="owl-item">
							<div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('frontend/images/brands_8.jpg')}}" alt=""></div>
						</div>

					</div>

					<!-- Brands Slider Navigation -->
					<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
					<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="cartmodal" tabindex="-1" aria-labelledby="exampleModalLevel" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLevel">Product quick view</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<img src="" alt="" id="pimage">
							<div class="card-body">
								<h5 class="card-title text-center" id="pname"></h5>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<ul class="list-group">
							<li class="list-group-item">Product code: <span id="pcode"></span> </li>
							<li class="list-group-item">Category: <span id="pcat"></span> </li>
							<li class="list-group-item">Subcategory: <span id="psub"></span> </li>
							<li class="list-group-item">Brand: <span id="pbrand"></span> </li>
							<li class="list-group-item">Stock: <span class="badge" style="background: green; color:white;">Available</span> </li>
						</ul>
					</div>
					<div class="col-md-4">
						<form action="{{ route('insert.into.cart') }}" method="post">
							@csrf
							<input type="hidden" name="product_id" id="product_id">
							<div class="form-group">
								<label for="exampleInputcolor">Color</label>
								<select class="form-control" name="color" id="color">
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputcolor">Size</label>
								<select class="form-control" name="size" id="size">
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputcolor">Quantity</label>
								<input type="number" class="form-control" name="qty" value="1">
							</div>

							<button type="submit" class="btn btn-primary">Add to Cart</button>
						</form>
					</div>
				</div>
			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function productView(id) {
		var myModal = new bootstrap.Modal(document.getElementById('cartmodal'));
		myModal.show();

		$.ajax({
			url: "{{ url('/cart/product/view/') }}/" + id,
			type: "GET",
			dataType: "json",
			success: function(data) {
				$('#pcode').text(data.product.product_code);
				$('#pcat').text(data.product.category_name);
				$('#psub').text(data.product.subcategory_name);
				$('#pbrand').text(data.product.brand_name);
				$('#pname').text(data.product.product_name);
				$('#pimage').attr('src', data.product.image_one);
				$('#product_id').val(data.product.id);

				var d = $('select[name="color"]').empty();
				$.each(data.color, function(key, value) {
					$('select[name="color"]').append('<option value = "' + value + '">' + value + '</option>')
				});

				var d = $('select[name="size"]').empty();
				$.each(data.size, function(key, value) {
					$('select[name="size"]').append('<option value = "' + value + '">' + value + '</option>')
				});
			}

		});
	}
</script>

<script
	src="https://code.jquery.com/jquery-3.7.1.min.js"
	integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
	crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.addwishlist').on('click', function() {
			var id = $(this).data('id');
			if (id) {
				$.ajax({
					url: "{{ url('add/wishlist/') }}/" + id,
					type: "GET",
					dataType: "json",
					success: function(data) {
						const Toast = Swal.mixin({
							toast: true,
							position: "top-end",
							showConfirmButton: false,
							timer: 3000,
							timerProgressBar: true,
							didOpen: (toast) => {
								toast.onmouseenter = Swal.stopTimer;
								toast.onmouseleave = Swal.resumeTimer;
							}
						});

						if ($.isEmptyObject(data.error)) {
							Toast.fire({
								icon: "success",
								title: data.success
							});
						} else {
							Toast.fire({
								icon: "error",
								title: data.error
							});
						}
					},
				});
			} else {
				alert('danger');
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.addcart').on('click', function() {
			var id = $(this).data('id');
			if (id) {
				$.ajax({
					url: "{{ url('/add/to/cart/') }}/" + id,
					type: "GET",
					dataType: "json",
					success: function(data) {
						const Toast = Swal.mixin({
							toast: true,
							position: "top-end",
							showConfirmButton: false,
							timer: 3000,
							timerProgressBar: true,
							didOpen: (toast) => {
								toast.onmouseenter = Swal.stopTimer;
								toast.onmouseleave = Swal.resumeTimer;
							}
						});

						if ($.isEmptyObject(data.error)) {
							Toast.fire({
								icon: "success",
								title: data.success
							});
						} else {
							Toast.fire({
								icon: "error",
								title: data.error
							});
						}
					},
				});
			} else {
				alert('danger');
			}
		});
	});
</script>

@endsection