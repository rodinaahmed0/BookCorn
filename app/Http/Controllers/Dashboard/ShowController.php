<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Show;
use App\Models\User;
use App\Models\Cinema;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
  public function index(){
        $shows=  auth()->user()->cinema->shows;
        return view('dashboard.shows.index' , compact('shows'));
  }
  public function create(){
      return view('dashboard.shows.create')->with(['cinema' => auth()->user()->cinema]);
  }

  public function store(Request $r){
        Show::create([
            'movie_id' => $r->movie_id,
            'hall_id' => $r->hall_id,
            'time_id' => $r->time_id,
            'date' => $r->date,
            'cinema_id' => auth()->user()->cinema->id, //must be authebticate cinema user
        ]);

        return redirect(route('shows.index'));
  }

  public function edit($id){
      $show = Show::findOrFail($id);
      $cinema = auth()->user()->cinema;
      return view('dashboard.shows.edit',compact('show','cinema'));
  }

  public function update(Request $r,$id){


      Show::where('id',$id)->update([
        'movie_id' => $r->movie_id,
        'hall_id' => $r->hall_id,
        'time_id' => $r->time_id,
        'date' => $r->date,
        'cinema_id' => auth()->user()->cinema->id, //must be authebticate cinema user
    ]);

     return redirect(route('shows.index'));
  }

  public function destroy($id){
      Show::where('id' , $id)->delete();
      return redirect(route('shows.index'));
  }


  public function today() {
        $shows = auth()->user()->cinema->shows->where('date' , Carbon::now()->toDateString());
       return view('dashboard.shows.today' , compact('shows'));
  }
  public function view($id) {
    $show = Show::findOrFail($id);
    $tickets = $show->tickets->where('status' , 'Waiting');

    return view('dashboard.shows.view' , compact('show' , 'tickets'));
  }

    public function pay(Request $r , $id) {
        $r->validate([
            'price' => 'required'
        ]);
        $ticket = Ticket::findOrFail($id);
        $ticket_price = $ticket->seats->count() * $ticket->show->time->price;

        User::where('id' , $ticket->user_id)->update([
            'wallet' => $r->price - $ticket_price,
        ]);

        $ticket->update([
            'status' => 'Paid',
        ]);

       return redirect(route('shows.today'));
    }

    public function approve($id) {

        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'status' => 'Paid',
        ]);

       return redirect(route('shows.today'));
    }

    public function charge($id) {

        $ticket = Ticket::findOrFail($id);
        $ticket_price = $ticket->seats->count() * $ticket->show->time->price;

        $wallet = $ticket->user->wallet;
        $wallet -= $ticket_price;

        User::where('id' , $ticket->user_id)->update([
            'wallet' => $wallet,
        ]);

        $ticket->update([
            'status' => 'Charged',
        ]);

       return redirect(route('shows.today'));
    }



}
