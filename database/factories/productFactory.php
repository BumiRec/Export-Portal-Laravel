<?php

namespace Database\Factories;

use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name'           => $this->faker->word(),
            'description'    => $this->faker->sentence(),
            'price'          => $this->faker->randomFloat(2, 1, 1000),
            'views'          => $this->faker->numberBetween(0, 1000),
            'type'           => $this->faker->randomElement(['import', 'export']),
            'category_id'    => ProductCategory::inRandomOrder()->first()->id,
            'subcategory_id' => ProductCategory::inRandomOrder()->first()->id,
            'company_id'=> Company::inRandomOrder()->first()->id,
        ];
    }
}
