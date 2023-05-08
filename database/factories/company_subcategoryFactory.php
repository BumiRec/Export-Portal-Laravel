<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\company_subcategory>
 */
class company_subcategoryFactory extends Factory
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
                'Limited by Sheares',
                'Limited by Guarante',
                'Unlimited Company',
                'Holding',
                'Subsidiary',
                'Assosiate',
                'Listed',
                'Unlisted',
                'Goverment',
                'Foreing',
                'Section 8',
            ]),
        ];
    }
}
