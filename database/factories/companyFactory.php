<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\company>
 */

use App\Models\company;
use App\Models\product_category;
use App\Models\company_category;
use App\Models\company_subcategory;

class companyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Create a new Company and ProductCategory and retrieve their IDs
        $companyCategory_id = company_category::factory()->create()->id;
        $companySubCategory_id = company_subcategory::factory()->create()->id;

        return [
            'name' => $this->faker->company,
            'keywords' => $this->faker->words(3, true),
            'country' => $this->faker->country,
            'web_adress' => $this->faker->url,
            'more_info' => $this->faker->words(3, true),
            'budged' => $this->faker->numberBetween(1000, 10000),
            'type' => $this->faker->randomElement(['local', 'international']),
            'taxpayer_office' => $this->faker->numberBetween(100, 999),
            'category_id' => $companyCategory_id,
            'subcategory_id' => $companySubCategory_id,
            'TIN' => $this->faker->numberBetween(10, 99),
        ];
    }
}
