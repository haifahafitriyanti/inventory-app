<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id, // ✅ ambil kategori acak
            'name'        => fake()->word(),
            'price'       => fake()->numberBetween(10000, 100000),
            'stock'       => fake()->numberBetween(1, 100),
        ];
    }
}
