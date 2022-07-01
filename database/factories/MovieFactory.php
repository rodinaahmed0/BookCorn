<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Cinema;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name() . ' Movie',
            'cinema_id' => Cinema::inRandomOrder()->first()->id,
            'description' => $this->faker->realText(),
            'duration' => '2 hr',
            'language' => 'eng',
            'trailer_link' => 'https://www.google.com',
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
