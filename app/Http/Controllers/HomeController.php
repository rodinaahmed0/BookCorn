<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cinema;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['cinemas']= Cinema::take(3)->get();
        $data['movies']= Movie::where('cinema_id' , 1)->get();
        return view('home')->with($data);
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
