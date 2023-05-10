<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product_category>
 */

use App\Models\product_category;

class Product_CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Fashion', 'Home', 'Acessories', 'Sporting', 'Health', 'Medical', 'Pets'
            ]),
        ];
    }
}
