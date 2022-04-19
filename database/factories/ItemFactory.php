<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'category' => rand(1, 3),
            'address' => $this->faker->address(),
            'description' => $this->faker->realTextBetween(200, 500),
            'notice' => (rand(0, 1)) ? $this->faker->realTextBetween(60, 191) : null,
            'is_active' => rand(0, 1),
            'created_at' => $this->faker->dateTime(now(), config('app.timezone')),
        ];
    }
}
