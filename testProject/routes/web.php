<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// USER INTERFACE

Route::get('/project', function () { return view('projects'); });

Route::get('/single-project/{id}', [FrontEndController::class, 'show_project']);
Route::post('/single-project-review', [FrontEndController::class, 'add_review'])->name('review');
Route::post('/admin/reviews/{id}', [FrontEndController::class, 'delete_review']);

Route::get('/service', function () { return view('services'); });
Route::get('/about', function () { return view('about'); });

Route::get('/contact', function () { return view('contact'); });
Route::post('/contact-us', [FrontEndController::class, 'contact_us'])->name('contact');

// ADMIN INTERFACE

    // Admin Dashboard
    Route::get('/admin/dashboard', function () { return view('admin.dashboard'); });

    Route::get('/admin/login', function () { return view('admin.auth.login'); })->name('login');
    Route::get('/admin/register', function () { return view('admin.auth.register'); })->name('register');

    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Înregistrare
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register-confirm');

Route::middleware(['auth'])->group(function () {

    // CRUD
    Route::get('/admin/category', function () { return view('admin.crud.category'); });
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'categories.list',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'show' => 'categories.show',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);

    Route::get('/admin/services', function () { return view('admin.crud.services'); });
    Route::resource('services', ServiceController::class)->names([
        'index' => 'services.list',
        'create' => 'services.create',
        'store' => 'services.store',
        'show' => 'services.show',
        'edit' => 'services.edit',
        'update' => 'services.update',
        'destroy' => 'services.destroy',
    ]);

    Route::get('/admin/projects', function () { return view('admin.crud.projects'); });
    Route::resource('projects', ProjectController::class)->names([
        'index' => 'projects.list',
        'create' => 'projects.create',
        'store' => 'projects.store',
        'show' => 'projects.show',
        'edit' => 'projects.edit',
        'update' => 'projects.update',
        'destroy' => 'projects.destroy',
    ]);

    Route::get('/admin/members', function () { return view('admin.crud.members'); });
    Route::resource('members', MemberController::class)->names([
        'index' => 'members.list',
        'create' => 'members.create',
        'store' => 'members.store',
        'show' => 'members.show',
        'edit' => 'members.edit',
        'update' => 'members.update',
        'destroy' => 'members.destroy',
    ]);

    Route::get('/admin/customers', function () { return view('admin.crud.customers'); });
    Route::resource('customers', CustomerController::class)->names([
        'index' => 'customers.list',
        'create' => 'customers.create',
        'store' => 'customers.store',
        'show' => 'customers.show',
        'edit' => 'customers.edit',
        'update' => 'customers.update',
        'destroy' => 'customers.destroy',
    ]);

    Route::get('/admin/reviews', function () { return view('admin.crud.reviews'); });
    Route::get('/admin/messages', function () { return view('admin.crud.messages'); });

    // Settings
    Route::get('/admin/settings', function () { return view('admin.settings'); });
});
