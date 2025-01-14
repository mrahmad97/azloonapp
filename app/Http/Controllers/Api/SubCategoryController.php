<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class SubCategoryController extends Controller
{
    // Get all subcategories with id, name, and category_id
    public function getSubCategories(): JsonResponse
    {
        $subCategories = SubCategory::select('id', 'name', 'category_id')->get();
        return response()->json(['status' => true, 'data' => $subCategories], 200);
    }

    // Get products by sub-category ID
    public function getProductsBySubCategory($id): JsonResponse
    {
        $products = Product::where('subcategory_id', $id)->get();
        return response()->json(['status' => true, 'data' => $products], 200);
    }
}
