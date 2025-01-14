<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category','subcategory')->orderBy('created_at', 'DESC')->get();

        return view('admin.Product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::select('id','name')->where('status', 'active')->get();
        $subCategories = SubCategory::select('id','name')->where('status', 'active')->get();
        $brands = Brand::select('id','title')->get();

        return view('admin.Product.create',compact('categories','subCategories','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'discount_percentage' => 'required',
            'stock' => 'required',
            'is_featured' => 'required',
            'is_trending' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
            'short_description' => 'required',
            'status' => 'required',
        ]);

        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('Products', 'public'); // Save to storage/app/public/Products
                $imagePaths[] = $imagePath; // Collect image paths
            }
        }

        Product::create([
            'title' => $request->product_name,
            'description' => $request->short_description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'discount_percentage' => $request->discount_percentage,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand' => $request->brand,
            'stock' => $request->stock,
            'is_featured' => $request->is_featured,
            'image' => json_encode($imagePaths), // Store JSON-encoded array
            'is_trending' => $request->is_trending,
            'status' => $request->status,
        ]);

        Session::flash("message", 'Product created successfully!');
        Session::flash("messageType", 'success');

        return redirect('create-product');
    }


    public function view($id){
        $product = Product::findOrFail($id);

        return view('admin.Product.show_product', compact('product'));
    }

    public function destroy($id)
    {

        $deleteproduct = Product::find($id);

        if (!empty($deleteproduct)) {
            $deleteproduct->delete();
        }
        return redirect('products');
    }

}


