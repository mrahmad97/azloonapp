<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::orderBy('created_at', 'DESC')->get();

        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
        'brand_name' => 'required|string|max:255',
        ]);

        Brand::create([
            'title' => $request->brand_name,

        ]);

        Session::flash("message", 'Brand created successfully!');
        Session::flash("messageType", 'success');

        return redirect('create-brand');
    }

    public function destroy($id)
    {

        $deleteBrand = Brand::find($id);

        if (!empty($deleteBrand)) {
            $deleteBrand->delete();
        }
        return redirect('brands');
    }
}
