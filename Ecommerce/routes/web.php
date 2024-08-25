<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChangePassController;
use App\Models\User;
use App\Models\Multipic;

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware(['auth'])->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $images = Multipic::all();
    return view('home', compact('brands', 'abouts', 'images'));
});

Route::get('/home', function () {
    echo "This is Home page";
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', [ContactController::class, 'index'])->name('stefan');

// Category 
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

// Brand
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

// Multi Image
Route::get('/multi/image', [BrandController::class, 'Multpic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

// Admin all route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::post('/update/slider/{id}', [HomeController::class, 'UpdateSlider']);
Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider']);

// Home About all route
Route::get('/home/About', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);

// Portfolio Page Route
Route::get('/portfolio', [AboutController::class, 'portfolio'])->name('portfolio');

// Admin Contact Page Route
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/admin/store/contact', [ContactController::class, 'AdminStoreContact'])->name('store.contact');
Route::get('/admin/message', [ContactController::class, 'AdminMessage'])->name('admin.message');

// Home Contact Page Route
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');
Route::get('/contact/edit/{id}', [ContactController::class, 'EditContact']);
Route::post('/update/contact/{id}', [ContactController::class, 'UpdateContact']);
Route::get('/contact/delete/{id}', [ContactController::class, 'DeleteContact']);
Route::get('/message/delete/{id}', [ContactController::class, 'DeleteMessage']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        //$users = User::all();
        // $users = DB::table('users')->get();
        
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

// User Profile Route
Route::get('/user/password', [ChangePassController::class, 'changePassword'])->name('change.password');
Route::post('/password/update', [ChangePassController::class, 'updatePassword'])->name('password.update');
Route::get('/user/profile', [ChangePassController::class, 'updateProfile'])->name('profile.update');
Route::post('/user/profile/update', [ChangePassController::class, 'updateUserProfile'])->name('update.user.profile');