<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\FlashDealController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubCategoryController;

Route::get('/flash-deals', [FlashDealController::class, 'getFlashDeals']);
Route::get('/banners', [BannerController::class, 'getBanners']);
Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/categories/{id}/products', [CategoryController::class, 'getProductsByCategory']);
Route::get('/sub-categories', [SubCategoryController::class, 'getSubCategories']);
Route::get('/sub-categories/{id}/products', [SubCategoryController::class, 'getProductsBySubCategory']);
Route::get('/trending-products', [ProductController::class, 'getTrendingProducts']);
Route::get('/all-products', [ProductController::class, 'getAllProducts']);
