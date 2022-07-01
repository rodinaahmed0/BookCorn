<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::insert(
            [
                [
                    'name' => "Al Jaremaa",
                    'cinema_id' => 1,
                    'description' => "Movie Desc",
                    'duration' => '2 hr',
                    'language' => 'ar',
                    'image' => 'eljarema.jpg',
                    'trailer_link' => "https://www.youtube.com/embed/gNU9k4MneHE",
                    'category_id' => 1,
                ],
                [
                    'name' => "The PLatform",
                    'cinema_id' => 1,
                    'description' => "Movie Desc",
                    'duration' => '2 hr',
                    'language' => 'eng',
                    'image' => 'platform.jpg',
                    'trailer_link' => "https://www.youtube.com/watch?v=RlfooqeZcdY",
                    'category_id' => 2,
                ],
                [
                    'name' => "Turning Red",
                    'cinema_id' => 1,
                    'description' => "Movie Desc",
                    'duration' => '2 hr',
                    'language' => 'eng',
                    'image' => 'turning-red.jpg',
                    'trailer_link' => "https://www.youtube.com/watch?v=XdKzUbAiswE",
                    'category_id' => 5,
                ],
                [
                    'name' => "The Lost City",
                    'cinema_id' => 1,
                    'description' => "Movie Desc",
                    'duration' => '2 hr',
                    'language' => 'eng',
                    'image' => 'ttheLostCity.jpg',
                    'trailer_link' => "https://www.youtube.com/embed/nfKO9rYDmE8",
                    'category_id' => 1,
                ],
                [
                    'name' => "Uncharted",
                    'cinema_id' => 1,
                    'description' => "Movie Desc",
                    'duration' => '2 hr',
                    'language' => 'eng',
                    'image' => 'uncahrted.jpg',
                    'trailer_link' => "https://www.youtube.com/watch?v=eHp3MbsCbMg",
                    'category_id' => 1,
                ],
                
            ]
        );

    }
}
