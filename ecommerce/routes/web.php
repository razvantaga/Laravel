<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

// Admin Section - Category
Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@store')->name('store.category');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@edit');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@update');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@delete');

// Admin Section - Subcategory
Route::get('admin/sub/categories', 'Admin\Category\SubcategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcategory', 'Admin\Category\SubcategoryController@store')->name('store.subcategory');
Route::get('edit/subcategory/{id}', 'Admin\Category\SubcategoryController@edit');
Route::post('update/subcategory/{id}', 'Admin\Category\SubcategoryController@update');
Route::get('delete/subcategory/{id}', 'Admin\Category\SubcategoryController@delete');

// Admin Section - Brands
Route::get('admin/brands', 'Admin\Category\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@store')->name('store.brand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@edit');
Route::post('update/brand/{id}', 'Admin\Category\BrandController@update');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@delete');

// Admin Section - Products
Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\ProductController@store')->name('store.product');
Route::get('edit/product/{id}', 'Admin\ProductController@edit');
Route::post('update/product/withoutphoto/{id}', 'Admin\ProductController@updateWithoutPhoto');
Route::post('update/product/photo/{id}', 'Admin\ProductController@updatePhoto');
Route::get('view/product/{id}', 'Admin\ProductController@view');
Route::get('delete/product/{id}', 'Admin\ProductController@delete');
Route::get('inactive/product/{id}', 'Admin\ProductController@inactive');
Route::get('active/product/{id}', 'Admin\ProductController@active');
// For show subcategory with ajax
Route::get('/get/subcategory/{category_od}', 'Admin\ProductController@getSubcategory');

// Admin Section - Reviews
Route::get('/products/reviews/all', 'Admin\ReviewController@allReview')->name('all.reviews');
Route::get('delete/review/{id}', 'Admin\ReviewController@deleteReview');
Route::get('/blogs/reviews/all', 'Admin\ReviewController@allBlogReview')->name('all.blog.reviews');

// Admin Section - Orders
Route::get('admin/pending/order', 'Admin\OrderController@newOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Admin\OrderController@viewOrder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/delivery/process/{id}', 'Admin\OrderController@deliveryProcess');
Route::get('admin/delivery/done/{id}', 'Admin\OrderController@deliveryDone');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');
Route::get('admin/accept/payment', 'Admin\OrderController@acceptPayment')->name('admin.accept.payment');
Route::get('admin/process/payment', 'Admin\OrderController@processPayment')->name('admin.process.payment');
Route::get('admin/success/payment', 'Admin\OrderController@successPayment')->name('admin.success.payment');
Route::get('admin/cancel/payment', 'Admin\OrderController@cancelPayment')->name('admin.cancel.payment');

// Admin Section - Coupons
Route::get('admin/coupons', 'Admin\Category\CouponController@coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@store')->name('store.coupon');
Route::get('edit/coupon/{id}', 'Admin\Category\CouponController@edit');
Route::post('update/coupon/{id}', 'Admin\Category\CouponController@update');
Route::get('delete/coupon/{id}', 'Admin\Category\CouponController@delete');

// Admin Section - Blog
Route::get('admin/blog/list', 'Admin\PostController@blogCategoryList')->name('all.blog.categorylist');
Route::post('admin/store/blog', 'Admin\PostController@storeCategory')->name('store.blog.category');
Route::get('edit/blogcategory/{id}', 'Admin\PostController@editCategory');
Route::post('update/blog/category/{id}', 'Admin\PostController@updateCategory');
Route::get('delete/blogcategory/{id}', 'Admin\PostController@deleteCategory');

// Admin Section - Post
Route::get('admin/blog/post', 'Admin\PostController@blogPostList')->name('all.blog.post');
Route::get('admin/add/post', 'Admin\PostController@createPost')->name('add.blog.post');
Route::post('admin/store/post', 'Admin\PostController@storePost')->name('store.post');
Route::get('edit/post/{id}', 'Admin\PostController@editPost');
Route::post('update/post/{id}', 'Admin\PostController@updatePost');
Route::get('delete/post/{id}', 'Admin\PostController@deletePost');

// Admin Section - Newslatter
Route::get('admin/newslatter', 'Admin\Category\NewslatterController@newslatter')->name('admin.newslatter');
Route::get('delete/newslatter/{id}', 'Admin\Category\NewslatterController@delete');
Route::delete('admin/newslatter/deleteall', 'Admin\Category\NewslatterController@deleteAll')->name('delete.all');


// Store from the frontend
Route::post('store/newslatter', 'FrontController@storeNewslatter')->name('store.newslatter');

// Admin Section - SEO
Route::get('admin/seo', 'Admin\SEOController@SEO')->name('admin.seo');
Route::post('admin/seo/update', 'Admin\SEOController@updateSEO')->name('update.seo');

// Admin Section - Reports
Route::get('admin/today/order', 'Admin\ReportController@todayOrder')->name('today.order');
Route::get('admin/today/delivery', 'Admin\ReportController@todayDelivery')->name('today.delivery');
Route::get('admin/this/month', 'Admin\ReportController@thisMonth')->name('this.month');
Route::get('admin/search/report', 'Admin\ReportController@searchReport')->name('search.report');
Route::post('admin/search/by/date', 'Admin\ReportController@searchByDate')->name('search.by.date');
Route::post('admin/search/by/month', 'Admin\ReportController@searchByMonth')->name('search.by.month');
Route::post('admin/search/by/year', 'Admin\ReportController@searchByYear')->name('search.by.year');

// Admin Section - User
Route::get('admin/all/user', 'Admin\UserRoleController@allUsers')->name('admin.all.user');
Route::get('admin/create', 'Admin\UserRoleController@createAdmin')->name('create.admin');
Route::post('admin/store/admin', 'Admin\UserRoleController@storeAdmin')->name('store.admin');
Route::get('edit/admin/{id}', 'Admin\UserRoleController@editAdmin');
Route::post('admin/update/admin', 'Admin\UserRoleController@updateAdmin')->name('update.admin');
Route::get('delete/admin/{id}', 'Admin\UserRoleController@deleteAdmin');

// Admin Section - Return orders
Route::get('admin/return/request', 'Admin\ReturnController@returnRequest')->name('admin.return.request');
Route::get('admin/approve/return/{id}', 'Admin\ReturnController@approveRequest');
Route::get('admin/all/return/request', 'Admin\ReturnController@allReturnRequest')->name('admin.all.request');

// Admin Section - Site setting
Route::get('admin/site/setting', 'Admin\SettingController@siteSetting')->name('admin.site.setting');
Route::post('admin/update/site/setting', 'Admin\SettingController@updateSiteSetting')->name('update.site.setting');

// Admin Section - Products stock
Route::get('admin/product/stock', 'Admin\StockController@stockProduct')->name('admin.product.stock');

// Admin Section - Contact messages
Route::get('admin/all/messages', 'ContactController@allMessages')->name('admin.all.messages');


// Home section - Wishlist
Route::get('add/wishlist/{id}', 'WishlistController@addItem');
Route::post('wishlist/delete', 'WishlistController@deleteItem')->name('product.delete');

// Home section - Cart
Route::get('/add/to/cart/{id}', 'CartController@addItem');
Route::get('check', 'CartController@check');
Route::get('product/cart', 'CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@removeItem');
Route::post('update/cart/item', 'CartController@updateItem')->name('update.cartitem');
Route::get('/cart/product/view/{id}', 'CartController@viewProduct');
Route::post('insert/into/cart/', 'CartController@insertCart')->name('insert.into.cart');
Route::get('/user/checkout', 'CartController@checkout')->name('user.checkout');
Route::get('/user/wishlist', 'CartController@wishlist')->name('user.wishlist');
Route::post('user/apply/coupon', 'CartController@applyCoupon')->name('apply.coupon');
Route::get('user/remove/coupon', 'CartController@removeCoupon')->name('remove.coupon');
Route::get('payment/page', 'CartController@paymentPage')->name('payment.step');

// Home section - Payment
Route::post('payment/process', 'PaymentController@paymentProcess')->name('payment.process');
Route::post('user/stripe/charge', 'PaymentController@stripeCharge')->name('stripe.charge');
Route::post('user/oncash/charge', 'PaymentController@onCashCharge')->name('oncash.charge');

// Home section - Product details
Route::get('/product/details/{id}/{product_name}', 'ProductController@view');
Route::post('/cart/product/add/{id}', 'ProductController@addCart');
Route::get('products/{id}', 'ProductController@productView');
Route::get('all_category/{id}', 'ProductController@categoryView');
// Home section - Review
Route::post('product/add/review', 'ProductController@addReview')->name('add.review');

// Home section - Blog
Route::get('blog/post', 'BlogController@blog')->name('blog.post');
Route::get('blog/single/{id}', 'BlogController@blogSingle');
Route::get('language/english', 'BlogController@english')->name('language.english');
Route::get('language/hindi', 'BlogController@hindi')->name('language.hindi');
Route::post('blog/add/review', 'BlogController@addReview')->name('add.blog.review');

// Home section - Return order
Route::get('success/list', 'PaymentController@successList')->name('success.orderlist');
Route::get('request/return/{id}', 'PaymentController@returnRequest');

// Home section - my order status
Route::get('order/status', 'FrontController@orderStatus')->name('status.tracking');
Route::post('view/status', 'FrontController@viewStatus')->name('view.status');

// Home section - Contact
Route::get('/contact', 'ContactController@contactPage')->name('contact.page');
Route::post('contact/form', 'ContactController@contactForm')->name('contact.form');

// Home section - Search
Route::post('product/search', 'CartController@search')->name('product.search');

// Home section - User
Route::get('my/profile', 'FrontController@myProfile')->name('my.profile');
Route::get('my/orders', 'FrontController@myOrders')->name('my.orders');

// Home section - About
Route::get('/about', 'FrontController@about')->name('about');
