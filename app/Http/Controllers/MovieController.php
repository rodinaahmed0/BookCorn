<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show($id){
        $movie=Movie::findOrFail($id);
        $todayShows = $movie->shows()->where('date' , Carbon::today())->get();
        $tommorowShows = $movie->shows()->where('date' , Carbon::tomorrow())->get();

        return view('front.movies.show',compact('movie' , 'todayShows' , 'tommorowShows'));
    }
}
