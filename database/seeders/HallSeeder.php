<?php

namespace Database\Seeders;

use App\Models\Hall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hall::insert(
               [
                   [
                    'number' => 1,
                    'seats' => 60,
                    'cinema_id' => 1,
                   ],
                   [
                    'number' => 2,
                    'seats' => 60,
                    'cinema_id' => 1,
                   ],
                   [ 
                    'number' => 3,
                    'seats' => 80,
                    'cinema_id' => 1,
                   ],
                   [
                    'number' => 1,
                    'seats' => 50,
                    'cinema_id' => 2,
                   ],
                   [
                    'number' => 2,
                    'seats' => 50,
                    'cinema_id' => 2,
                   ],
                   [ 
                    'number' => 3,
                    'seats' => 80,
                    'cinema_id' => 2,
                   ],
                   [
                    'number' => 1,
                    'seats' => 60,
                    'cinema_id' => 3,
                   ],
                   [
                    'number' => 2,
                    'seats' => 60,
                    'cinema_id' => 3,
                   ],
                   [
                    'number' => 1,
                    'seats' => 50,
                    'cinema_id' => 4,
                   ],
                   [
                    'number' => 2,
                    'seats' => 50,
                    'cinema_id' => 4,
                   ],
                   [
                    'number' => 3,
                    'seats' => 60,
                    'cinema_id' => 4,
                   ],
               ]
        );
    }
}
