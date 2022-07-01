<?php

namespace Database\Factories;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hall>
 */
class HallFactory extends Factory
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
            'number' => $this->faker->numberBetween(1 , 10) ,
            'seats' => $numbers->random(),
            'cinema_id' => Cinema::inRandomOrder()->first()->id,
        ];
    }
}
