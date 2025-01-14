<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;


class SubCategory extends Model
{
    use HasFactory,HasUlids;

    protected $table = 'subcategories';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'name',
        'imageURL',
        'status',
    ];

    protected $casts = [
        'id' => 'string',
        'category_id' => 'string',
    ];


    // Relationship with Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship with Product model
    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }
}
