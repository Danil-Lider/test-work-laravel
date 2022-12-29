<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        $name = fake()->name();

        $slug = $name;

        return [
            'category_id' => rand(1,5),
            'name' => $name,
            'slug' => $slug,
            'price' => 100,
            'image' => 'test',
            'quantity' => 10,
        ];
    }
}
