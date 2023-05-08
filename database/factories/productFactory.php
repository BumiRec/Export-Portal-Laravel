<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */

use App\Models\product;
use App\Models\product_category;
use App\Models\company;

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
            'name' => $this->faker->word(2, true),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'imageURL' => $this->faker->imageUrl(640, 480, 'product', true, 'Faker'),
            'views' => $this->faker->numberBetween(0, 1000),
            'type' => $this->faker->randomElement(['import', 'export']),
            'category_id' => product_category::factory(),
            'company_id' => company::factory(),
        ];
    }
}
