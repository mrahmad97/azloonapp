<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FlashDeal;
use Illuminate\Support\Facades\Session;

class FlashdealController extends Controller
{
    public function index()
    {
        $flashdeals = FlashDeal::orderBy('created_at', 'DESC')->get();

        return view('admin.Flashdeals.index', compact('flashdeals'));
    }

    public function create()
    {
        return view('admin.Flashdeals.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // $request->validate([
        // 'product_name' => 'required|string|max:255',
        // 'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // 'original_price' => 'required',
        // 'discounted_price' => 'required',
        // 'discount_percentage' => 'required',
        // 'deal_end_time' => 'required',
        // 'status' => 'required|in:active,inactive',
        // ]);

            // Handle the image upload
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imagePath = $image->store('flash_deals', 'public');
        } else {
            $imagePath = null;
        }

        $flashDeal = FlashDeal::create([
            'product_name' => $request->product_name,
            'product_image' => $imagePath,
            'original_price' => $request->original_price,
            'discounted_price' => $request->discounted_price,
            'discount_percentage' => $request->discount_percentage,
            'deal_end_time' => $request->deal_end_time,
            'is_active' => $request->status,
        ]);

        Session::flash("message", 'Flashdeal created successfully!');
        Session::flash("messageType", 'success');

        return redirect('create-flash-deal');
    }
    public function destroy($id)
    {

        $deleteFlashdeal = FlashDeal::find($id);

        if (!empty($deleteFlashdeal)) {
            $deleteFlashdeal->delete();
        }
        return redirect('flash-deals');
    }
}
