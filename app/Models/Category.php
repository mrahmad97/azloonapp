<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Category extends Model
{
    use HasFactory,HasUlids;

    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'imageURL',
        'status',
    ];

    protected $casts = [
        'id' => 'string',
    ];


    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
}
