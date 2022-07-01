<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index($id){
     $ticket=Ticket::findOrFail($id);
     return view('front.tickets.inf',compact('ticket'));
    }

    public function cancel($id){
        $ticket=Ticket::findOrFail($id);
        $ticket_price = $ticket->seats->count() * $ticket->show->time->price;
        $time = Carbon::parse($ticket->show->time->show_time);
        $time->setDateFrom($ticket->show->date);

        if (Carbon::now()->diffInHours($time, false) > 3) {
            
              if ($ticket->payment_type == 'Card') {
                //   transaction here
                $wallet = auth()->user()->wallet;
                $wallet += $ticket_price;
                auth()->user()->update(['wallet' => $wallet]);
                $ticket->delete();
              } else {
                $ticket->delete();
              }
              //  check ticket type if visa add the payment money to wallet
              //   if cash do nothing
        } else {
             // minus the money to his wallet for next payment
             if ($ticket->payment_type == 'Cash') {
                $wallet = auth()->user()->wallet;
                $wallet -= $ticket_price;
                auth()->user()->update(['wallet' => $wallet]);
                $ticket->delete();
             } else {
                $ticket->delete();
             }
             
        }
        return redirect(route('profile.index'));
       }
}
