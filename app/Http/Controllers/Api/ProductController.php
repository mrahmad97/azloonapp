<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    // Get trending products where is_trending = true
    public function getTrendingProducts(): JsonResponse
    {
        $trendingProducts = Product::where('is_trending', true)->get();
        return response()->json(['status' => true, 'data' => $trendingProducts], 200);
    }

    // Get all products
    public function getAllProducts(): JsonResponse
    {
        $products = Product::all();
        return response()->json(['status' => true, 'data' => $products], 200);
    }
}
