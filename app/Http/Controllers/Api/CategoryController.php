<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    // Get all categories with id and imageURL
    public function getCategories(): JsonResponse
    {
        $categories = Category::select('id', 'name', 'imageURL')->get();
        return response()->json(['status' => true, 'data' => $categories], 200);
    }

    // Get products by category ID
    public function getProductsByCategory($id): JsonResponse
    {
        $products = Product::where('category_id', $id)->get();
        return response()->json(['status' => true, 'data' => $products], 200);
    }
}
