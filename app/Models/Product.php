<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Product extends Model
{
    use HasUlids;

    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title', 'description', 'price', 'discount_price','discount_percentage', 'category_id',
        'subcategory_id', 'brand', 'rating', 'total_reviews', 'stock',
        'is_featured', 'clicks', 'image', 'is_trending', 'total_sold','status'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }


    public function scopeActivePublication($query)
    {
        return $query->where('status', '1');
    }

    public function scopeOrderByDesc($query)
    {
        return $query->orderBy('created_at', 'DESC');
    }

    public function scopeWithActiveCategory($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->where('status', 'active');
        });
    }

    public function scopeWithActiveSubCategory($query)
    {
        return $query->whereHas('subcategory', function ($query) {
            $query->where('status', 'active');
        });
    }

    public function getDecodedImagesAttribute()
    {
        return json_decode($this->image, true) ?? [];
    }

}
