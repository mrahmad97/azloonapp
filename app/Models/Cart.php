<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Product;


class Cart extends Model
{
    use HasUuids;

    protected $table = "carts";

    protected $fillable = [
        'created_by',
        'item_id',
        'quantity',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'item_id', 'id');
    }

    public function scopeWithActiveproduct($query)
    {
        return $query->whereHas('product', function ($query) {
            $query->where('status', '1');
        });
    }
}
