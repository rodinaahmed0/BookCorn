<?php

namespace Database\Seeders;

use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Time::insert(
            [
                [
                    'show_time' => Carbon::createFromFormat('g:i A', "12:00 PM"),
                    'price' => 60,
                    'cinema_id' => 1,
                ],
                [ 
                    'show_time' => Carbon::createFromFormat('g:i A', '4:00 PM'),
                    'price' => 60,
                    'cinema_id' => 1,
                ],
                [
                    'show_time' => Carbon::createFromFormat('g:i A', '8:00 PM'),
                    'price' => 80,
                    'cinema_id' => 1,
                ],
                [
                    'show_time' => Carbon::createFromFormat('g:i A', '12:00 AM'),
                    'price' => 100,
                    'cinema_id' => 1,
                ],
            ]
        );
    }
}
