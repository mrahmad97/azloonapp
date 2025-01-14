<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();

        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_link' => 'required',
            'alt_text' => 'required',
            'position' => 'required',
            'status' => 'required|in:1,0',
        ]);

        try {
            // Handle the image upload
            $imagePath = $request->hasFile('image')
                ? $request->file('image')->store('banners', 'public')
                : null;

            Banner::create([
                'image_url' => $imagePath,
                'link' => $request->banner_link,
                'alt_text' => $request->alt_text,
                'position' => $request->position,
                'is_active' => $request->status,
            ]);

            Session::flash('message', 'Banner created successfully!');
            Session::flash('messageType', 'success');
        } catch (\Exception $e) {
            Log::error('Error creating banner: ' . $e->getMessage());
            Session::flash('message', 'Failed to create banner!');
            Session::flash('messageType', 'danger');
        }

        return redirect('create-banner');
    }

    public function destroy($id)
    {

        $deletebanner = Banner::find($id);

        if (!empty($deletebanner)) {
            $deletebanner->delete();
        }
        return redirect('banners');
    }

}
