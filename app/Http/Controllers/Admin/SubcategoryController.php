<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Session;


class SubcategoryController extends Controller
{

    public function index()
    {
        $subCategories = SubCategory::orderBy('created_at', 'DESC')->get();

        return view('admin.subCategory.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.subCategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
        'category_id' => 'required',
        'sub_category_name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:active,inactive',
        ]);

            // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('Sub_categories', 'public');
        } else {
            $imagePath = null;
        }

        SubCategory::create([
            'category_id' =>$request->category_id,
            'name' => $request->sub_category_name,
            'imageURL' => $imagePath,
            'status' => $request->status,

        ]);

        Session::flash("message", 'Sub Category created successfully!');
        Session::flash("messageType", 'success');

        return redirect('create-sub-category');
    }
    public function edit($id)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $editSubCategory = SubCategory::find($id);

        return view('admin.subCategory.edit', compact('categories','editSubCategory'));
    }

    public function update($id, Request $request)
    {

        $updateCategory = Category::find($id);

        $request->validate([
            'category_id' => 'required',
            'sub_category_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('Sub_categories', 'public');
            } else {
                $imagePath = null;
            }

            SubCategory::find($id)->update([
            'category_id' =>$request->category_id,
            'name' => $request->sub_category_name,
            'imageURL' => $imagePath,
            'status' => $request->status,
        ]);

        Session::flash("message", 'Sub Category Updated successfully!');
        Session::flash("messageType", 'success');

        return redirect('sub-categories');
    }
    public function destroy($id)
    {

        $deletecategory = SubCategory::find($id);

        if (!empty($deletecategory)) {
            $deletecategory->delete();
        }
        return redirect('sub-categories');
    }
}
