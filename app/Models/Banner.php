<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Banner extends Model
{ use HasUlids;

    protected $table = 'banners';

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'image_url', 'link', 'alt_text', 'position', 'is_active'
    ];

    protected $casts = [
        'id' => 'string',
        'is_active' => 'boolean',
        'position' => 'string',
    ];


    public function getBannerUrlAttribute()
    {
        return asset('storage/banners/' . $this->image_url); // Assuming the banner images are stored in the storage folder.
    }


}
