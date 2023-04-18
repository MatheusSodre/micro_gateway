<?php

namespace Database\Factories\Company;

use App\Models\Company\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory()->create(),
            'name'        => $this->faker->unique()->name(),      
            'phone'       => $this->faker->unique()->numberBetween(1000000000,9999999999),
            'whatsapp'    => $this->faker->unique()->numberBetween(1000000000,9999999999),
            'email'       => $this->faker->unique()->email(),
        ];
    }
}
