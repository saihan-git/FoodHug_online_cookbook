<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefAuthController;
use App\Http\Controllers\ChefProfileController;
use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\MemberProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('member')->group(function () {
    Route::get('login', [MemberAuthController::class, 'showLoginForm'])->name('member.login');
    Route::post('login', [MemberAuthController::class, 'login'])->name('member.login.submit');
    Route::post('logout', [MemberAuthController::class, 'logout'])->name('member.logout');

    Route::get('password/reset', [MemberAuthController::class, 'showLinkRequestForm'])->name('member.password.request');
    Route::post('password/email', [MemberAuthController::class, 'sendResetLinkEmail'])->name('member.password.email');
    Route::get('reset-password', [MemberAuthController::class, 'showResetForm'])->name('member.password.reset');
    Route::post('reset-password', [MemberAuthController::class, 'resetPassword'])->name('member.password.update');
});

Route::prefix('member')->middleware('auth:member')->group(function () {
    Route::get('profile', [MemberProfileController::class, 'show'])->name('member.profile');
    Route::put('profile', [MemberProfileController::class, 'update'])->name('member.profile.update');
});

Route::get('/profile/{id}', [ReviewController::class, 'profile'])->name('profile');
Route::post('/profile', [ReviewController::class, 'profileStore'])->name('profile.store');

Route::prefix('chef')->group(function () {
    Route::get('login', [ChefAuthController::class, 'showLoginForm'])->name('chef.login');
    Route::post('login', [ChefAuthController::class, 'login'])->name('chef.login.submit');
    Route::post('logout', [ChefAuthController::class, 'logout'])->name('chef.logout');

    Route::get('forgot-password', [ChefAuthController::class, 'showForgotPasswordForm'])->name('chef.password.request');
    Route::post('forgot-password', [ChefAuthController::class, 'sendResetLinkEmail'])->name('chef.password.email');
    Route::get('reset-password/{token}', [ChefAuthController::class, 'showResetPasswordForm'])->name('chef.password.reset');
    Route::post('reset-password', [ChefAuthController::class, 'resetPassword'])->name('chef.password.update');
});

Route::prefix('chef')->middleware(['auth:chef'])->group(function () {
    Route::get('profile', [ChefProfileController::class, 'show'])->name('chef.profile');
    Route::put('profile', [ChefProfileController::class, 'update'])->name('chef.profile.update');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('password/reset', [AdminAuthController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [AdminAuthController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('reset-password', [AdminAuthController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('reset-password', [AdminAuthController::class, 'resetPassword'])->name('admin.password.update');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('profile', [AdminProfileController::class, 'show'])->name('admin.profile');
    Route::put('profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});

Route::get('/recipe_detail/{id}', [ReviewController::class, 'recipe_detail'])->name('recipe_detail');
Route::get('/recipe_items', [ReviewController::class, 'recipe_items'])->name('recipe_items');
Route::post('/recipe_search', [ReviewController::class, 'recipe_search'])->name('recipe_search');
Route::resource('recipes', RecipeController::class);
Route::get('/filter_category/{id}', [ReviewController::class, 'filter_category'])->name('filter_category');
Route::resource('categories', CategoryController::class);

//Route::get('/', [ReviewController::class, 'index'])->name('index');
Route::get('/about', [ReviewController::class, 'about'])->name('about');
Route::get('/contact', [ReviewController::class, 'contact'])->name('contact');

//Route::resource('rate', RatingController::class);
Route::resource('review', ReviewController::class);
