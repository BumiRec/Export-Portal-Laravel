<?php

namespace Database\Factories;

use App\Models\company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\company>
 */

use App\Models\company_category;
use App\Models\company_subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        return [
            'name' => $this->faker->company,
            'keywords' => $this->faker->words(3, true),
            'country' => $this->faker->country,
            'web_address' => $this->faker->url,
            'more_info' => $this->faker->words(3, true),
            'budged' => $this->faker->numberBetween(1000, 10000),
            'type' => $this->faker->randomElement(['local', 'international']),
            'taxpayer_office' => $this->faker->numberBetween(100, 999),
            'category_id' => company_category::inRandomOrder()->first()->id,
            'subcategory_id' => company_subcategory::inRandomOrder()->first()->id,
            'TIN' => $this->faker->numberBetween(10, 99),
            'profile_picture' => $this->faker->imageUrl(640, 480, 'company', true, 'Faker'),
            'membership' => $this->faker->words(3, true),
        ];
    }
}
