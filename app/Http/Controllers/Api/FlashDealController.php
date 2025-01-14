<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FlashDeal;
use Illuminate\Http\JsonResponse;

class FlashDealController extends Controller
{
    public function getFlashDeals(): JsonResponse
    {
        $flashDeals = FlashDeal::where('is_active', true)->get();
        return response()->json(['status' => true, 'data' => $flashDeals], 200);
    }
}
