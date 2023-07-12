<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->domainName(),
            'description' => $this->faker->words(5, true),
            'imagen' => 'imagen' . $this->faker->randomElement([1,2,3]) . '.jpg',
            'status' => $this->faker->boolean()
        ];
    }
}
