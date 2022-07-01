<?php

namespace Database\Factories;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cinema = Cinema::inRandomOrder()->first();
        return [
            'cinema_id' => $cinema->id ,
            'time_id' => $cinema->times->random()->id ,
            'hall_id' => $cinema->halls->random()->id ,
            'movie_id' => $cinema->movies->random()->id ,
        ];
    }
}
