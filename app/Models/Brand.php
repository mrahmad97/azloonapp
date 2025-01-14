<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Brand extends Model
{
    use HasUlids;
    protected $table = 'brands';

    protected $fillable = [
        'title'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
