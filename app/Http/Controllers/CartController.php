<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function store(Request $request, $item_id)
    {
        // Validate the item ID
        $product = Product::findOrFail($item_id);

        // Add item to cart
        $cart = Cart::create([
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'item_id' => $product->id,
            'quantity' => 1, // Default quantity
        ]);

        return response()->json([
            'message' => 'Item added to cart successfully!',
            'cart' => $cart
        ], 200);
    }


}
