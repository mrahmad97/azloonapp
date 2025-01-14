<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
        'category_name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:active,inactive',
        ]);

            // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('categories', 'public');
        } else {
            $imagePath = null;
        }


        Category::create([
            'name' => $request->category_name,
            'imageURL' => $imagePath,
            'status' => $request->status,

        ]);

        Session::flash("message", 'Category created successfully!');
        Session::flash("messageType", 'success');

        return redirect('create-category');
    }
    public function edit($id)
    {

        $editCategory = Category::find($id);

        return view('admin.category.edit', compact('editCategory'));
    }

    public function update($id, Request $request)
    {

        $updateCategory = Category::find($id);

        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('categories', 'public');
            } else {
                $imagePath = null;
            }

        Category::find($id)->update([
            'name' => $request->category_name,
            'imageURL' => $imagePath,
            'status' => $request->status,
        ]);

        Session::flash("message", 'Category Updated successfully!');
        Session::flash("messageType", 'success');

        return redirect('categories');
    }
    public function destroy($id)
    {

        $deletecategory = Category::find($id);

        if (!empty($deletecategory)) {
            $deletecategory->delete();
        }
        return redirect('categories');
    }
}
