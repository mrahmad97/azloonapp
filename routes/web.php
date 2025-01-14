<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\FlashdealController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\HomeViewController;
use App\Http\Controllers\CartController;


// Front End user side Routes ... starts here ->

Route::get('/',[HomeViewController::class, 'index']);
Route::post('/add-to-cart/{item_id}', [CartController::class, 'store']);
Route::get('/categories/{id}/subcategories', [HomeViewController::class, 'getSubCategories'])->name('categories.subcategories');





// Front End user side Routes ... starts here ->

// Admin or Manager Routes .... start here ->

Route::get('manager', function () {
    return view('admin.index');
});

// Category Routes

Route::get('categories',[CategoryController::class, 'index']);
Route::get('create-category',[CategoryController::class, 'create']);
Route::post('save-category',[CategoryController::class, 'store']);
Route::get('edit-category/{id}',[CategoryController::class, 'edit']);
Route::post('update-category/{id}',[CategoryController::class, 'update']);
Route::get('destroy-category/{id}',[CategoryController::class, 'destroy']);

// Sub Category Routes

Route::get('sub-categories',[SubcategoryController::class, 'index']);
Route::get('create-sub-category',[SubcategoryController::class, 'create']);
Route::post('save-sub-category',[SubcategoryController::class, 'store']);
Route::get('edit-sub-category/{id}',[SubcategoryController::class, 'edit']);
Route::post('update-sub-category/{id}',[SubcategoryController::class, 'update']);
Route::get('destroy-sub-category/{id}',[SubcategoryController::class, 'destroy']);

// Brand routes

Route::get('brands',[BrandController::class, 'index']);
Route::get('create-brand',[BrandController::class, 'create']);
Route::post('save-brand',[BrandController::class, 'store']);
Route::get('destroy-brand/{id}',[BrandController::class, 'destroy']);

// Banner routes

Route::get('banners',[BannerController::class, 'index']);
Route::get('create-banner',[BannerController::class, 'create']);
Route::post('save-banner',[BannerController::class, 'store']);
Route::get('destroy-banner/{id}',[BannerController::class, 'destroy']);

// Flash Deals routes

Route::get('flash-deals',[FlashdealController::class, 'index']);
Route::get('create-flash-deal',[FlashdealController::class, 'create']);
Route::post('save-flash-deal',[FlashdealController::class, 'store']);
Route::get('destroy-flash-deal/{id}',[FlashdealController::class, 'destroy']);

// Products routes

Route::get('products',[ProductController::class, 'index']);
Route::get('create-product',[ProductController::class, 'create']);
Route::post('save-product',[ProductController::class, 'store']);
Route::get('view-product/{id}',[ProductController::class, 'view']);
Route::get('destroy-product/{id}',[ProductController::class, 'destroy']);


// Admin Routes .... End here ->


Route::get('/about', function () {
    return view('about');
});

Route::get('/blog-detail', function () {
    return view('blog_details');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/cart', function () {
    return view('cart');
});

// Route::get('/categories', function () {
//     return view('categories');
// });

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/register', function () {
    return view('register');
});


Route::get('/services', function () {
    return view('service');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/single-product', function () {
    return view('single_product');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});
