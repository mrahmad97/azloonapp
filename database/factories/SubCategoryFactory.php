<?php

namespace Database\Factories;
use App\Models\SubCategory;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(), // Create a related category
            'name' => $this->faker->word(),
            'imageURL' => $this->faker->imageUrl(640, 480, 'subcategories', true, 'Faker'),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
