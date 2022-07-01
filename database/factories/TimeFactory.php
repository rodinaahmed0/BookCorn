<?php

namespace Database\Factories;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Time>
 */
class TimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $numbers = collect(['50' , '60' , '80']);
        return [
            'show_time' => '9 to 12' . $this->faker->title(),
            'price' => $numbers->random(),
            'cinema_id' => Cinema::inRandomOrder()->first()->id,
        ];
    }
}
