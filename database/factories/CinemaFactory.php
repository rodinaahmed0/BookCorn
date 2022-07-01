<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cinema>
 */
class CinemaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $names = collect(['Amir ' , 'Vox ' , 'Grand ' , 'San Stefano ']);
        return [
            'name' => $names->random().$this->faker->name(),
            'location' => "men geha tkhaf tgeha",
            'owner_phone' => $this->faker->phoneNumber(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
