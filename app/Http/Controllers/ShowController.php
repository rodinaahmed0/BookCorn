<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function book($id){
        $show = Show::findOrFail($id);
        $ticketIdsArr = $show->tickets()->select('id')->get()->toArray(); 
     
        $ids = array_map(function ($ids) {
            return $ids['id'];
        } , $ticketIdsArr);

       
        $occSeats = Seat::select('number')->whereIn('ticket_id' , $ids )->get();
    
        return view('front.show.book',compact('show' , 'occSeats'));
    }
}
