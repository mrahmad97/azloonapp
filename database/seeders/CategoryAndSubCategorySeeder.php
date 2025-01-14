<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CategoryAndSubCategorySeeder extends Seeder
{
    public function run()
    {
        // Create 10 categories, each with 3 subcategories
        Category::factory(10)
            ->has(SubCategory::factory(3), 'subcategory') // Adjust relationship name
            ->create();
    }
}
