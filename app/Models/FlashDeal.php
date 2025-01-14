<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class FlashDeal extends Model
{
    use HasUlids;

    protected $table = 'flash_deals';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'product_name', 'product_image', 'original_price', 'discounted_price',
        'discount_percentage', 'deal_end_time', 'is_active'
    ];

    // protected $casts = [
    //     'is_active' => 'boolean',
    //     'deal_end_time' => 'datetime',
    //     'original_price' => 'decimal:2',
    //     'discounted_price' => 'decimal:2',
    //     'discount_percentage' => 'integer',
    // ];

    public function getDiscountAmountAttribute()
    {
        return $this->original_price - $this->discounted_price;
    }

    public function getProductImageUrlAttribute()
    {
        return asset('storage/flash_deals/' . $this->product_image); // Assuming product images are stored in 'storage/flash_deals'
    }
}
