<?php

namespace Database\Seeders;

use App\Models\Show;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Show::insert(
            [
              [ //kol array mn dol hwa show
                'cinema_id' => 1,
                'time_id' => 1 ,
                'hall_id' => 1,
                'movie_id' => 1,
                'date' => Carbon::today(),
              ],
              [
                'cinema_id' => 1,
                'time_id' => 1  ,
                'hall_id' => 1,
                'movie_id' => 1,
                'date' => Carbon::tomorrow(),
              ],
              [ 
                'cinema_id' => 1,
                'time_id' => 2  ,
                'hall_id' => 1,
                'movie_id' => 2,
                'date' => Carbon::today(),
              ],
               [
                'cinema_id' => 1,
                'time_id' => 4 ,
                'hall_id' => 1,
                'movie_id' => 3,
                'date' => Carbon::today(),
              ],
              [
                'cinema_id' => 1,
                'time_id' => 3 ,
                'hall_id' => 1,
                'movie_id' => 5,
                'date' => Carbon::today(),
              ],
              [
                'cinema_id' => 1,
                'time_id' => 3 ,
                'hall_id' => 1,
                'movie_id' => 5,
                'date' => Carbon::tomorrow(),
              ],
            ]
        );
    }
}
