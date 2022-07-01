<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{

    public function index() {
        $cinemas= Cinema::all();

        $c = $cinemas->toArray();

        $map = array_map(function ($cinema) {
            return array(
                $cinema["name"] => [$cinema["lat"] , $cinema["long"]],
            );
        } , $c);

        return view('front.cinemas.index',compact('cinemas' , 'map'));
    }
    public function show($id){
        $cinema=Cinema::findOrFail($id);
        return view('front.cinemas.show',compact('cinema'));
    }
}
