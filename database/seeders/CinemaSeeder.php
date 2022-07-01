<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cinema::insert([
              [
                'name' => "Vox",
                'location' => "Carfour City Center, Alexandria",
                'owner_phone' =>"0100000000",
                'user_id' => 2,
                'image' => "cinemaVox.jpg",
                'long' => "31.1656908",
                'lat' => "29.930524",
              ],
              [
                'name' => "Amir",
                'location' => "Mahatet El Ramel, Alexandria",
                'owner_phone' =>"0100000000",
                'user_id' => 3,
                'image' => "cinemaAmir.jpg",
                'long' => "31.19707221913942",
                'lat' => "29.904006966821456",
              ],
              [
                'name' => "San Stefano",
                'location' => "San Stefano Mall, Alexandria",
                'owner_phone' =>"0100000000",
                'user_id' => 4,
                'image' => "cinemaSan.jpg",
                'long' => "31.24543757134621",
                'lat' => "29.967793116555715",
              ],
              [
                'name' => "Green Plaza",
                'location' => "Smouha, Alexandria",
                'owner_phone' =>"0100000000",
                'user_id' => 5,
                'image' => "cinemaGreenPlaza.jpg",
                'long' => "31.205071000388887",
                'lat' => "29.965541497508777",
              ],
        ]);
    }
}
