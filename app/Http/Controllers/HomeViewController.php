<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Category;
use App\Models\SubCategory;

class HomeViewController extends Controller
{
    public function index() {
        $recommendedItemsQuery = Product::ActivePublication()
            // ->select('id', 'name', 'rating', 'total_reviews', 'category_id', 'subcategory_id') // Include rating and reviews
            ->OrderByDesc()
            ->with(['category', 'subcategory'])
            ->withActiveCategory()
            ->withActiveSubCategory();

        $recommendedItems = $recommendedItemsQuery->paginate(15);
        $randomItems = $recommendedItemsQuery->inRandomOrder()->take(8)->get();
        // dd($randomItems);

        $banners = Banner::where('is_active','1')->orderBy('id', 'DESC')->get();
        // dd($banners);

        $categories = Category::where('status', 'active')->orderBy('id','DESC')->get();
        // dd($categories);
        return view('Pages.home', compact('recommendedItems', 'randomItems', 'banners','categories'));
    }

public function getSubCategories($categoryId)
{
    $subCategories = SubCategory::where('category_id', $categoryId)
        ->where('status', 'active')
        ->orderBy('id', 'DESC')
        ->get();

    return response()->json($subCategories);
}

}


