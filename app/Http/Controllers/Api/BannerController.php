<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\JsonResponse;

class BannerController extends Controller
{
    public function getBanners(): JsonResponse
    {
        $banners = Banner::where('is_active', true)->orderBy('position')->get();
        return response()->json(['status' => true, 'data' => $banners], 200);
    }
}
