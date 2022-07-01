<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class SeatController extends Controller
{
    public function store(Request $r , $id) {

        // checking cache
       if ($this->checkCachedSeats($r->seats , $id ) ) {
          return back()->withErrors("one of the seats is locked right now, choose another one");
       }

        $show = Show::findOrFail($id);

        $nums = [];
        $ticketNumbers= [];
        $numOfUserSeats = 0 ;

        foreach($show->tickets as $ticket) {
           foreach($ticket->seats as $seat) {
               $nums[] = $seat->number;
               if ($ticket->user_id == auth()->id()) {
                     $numOfUserSeats++;
               }
           }
           $ticketNumbers[] = $ticket->ticket_num;
        }

        $availableSeatsForUser = 2 - $numOfUserSeats;
        $check = (string)$availableSeatsForUser;
        $messages = [
            'seats.max' => 'you can book only 2 seats on your ticket',
        ];
        $validator = Validator::make($r->all(), [
            'seats' => ['required' , 'max:' . $check ],
            'seats.*' => ['required' , Rule::notIn($nums) , 'max:2']
        ] , $messages)->validate();

        $seats = array_map(function ($seat) {
            return array(
                'number' => $seat,
            );
        } , $r->seats);


        $randomTicketNum = $this->randomInteger($ticketNumbers);
        $price = count($seats) * $show->time->price;

       switch ($r->payment_method) {
          case "Cash":
            $this->cashMethod($id , $seats , $randomTicketNum);
            return redirect(route('profile.index'));
            break;
          case "Card":
            $this->cardMethod($show , $seats , $randomTicketNum , $id); //yeb2a b3d ma anfz de hro7 ll checkout
            return redirect(route('checkout.index'));
            break;
          case "Points":
           $flag = $this->pointsMethod($randomTicketNum,$seats , $id , $price);
           if (!$flag) {
            return back()->withErrors("Insufficient points!");
           }

            return redirect(route('profile.index'));
            break;
          default:
           return redirect()->back();
       }
    }

    public function cashMethod($id , $seats , $randomTicketNum ) {
        DB::transaction(function () use ($id , $randomTicketNum, $seats ) {
            $ticket = Ticket::firstOrCreate([
                'show_id' =>  $id  ,
                'user_id' => auth()->id(),
            ] , [
                'ticket_num' => $randomTicketNum,
                'show_id' =>  $id  ,
                'user_id' => auth()->id(),
                'payment_type' => 'Cash',
                'status' => 'Waiting',
            ]);

            // INSERT TO seats ('ticket_id' , 'number') VALUES (1,45) , (1,79)
            // Seat::createMany([ ['ticket_id => 5 , number -> 25] , ['ticket_id => 5 , number -> 26]])
            // $ticket->seats()->create([ 'number' => 79] , ['number' => 25 ] );
           $ticket->seats()->createMany($seats);
           $userPoints =  auth()->user()->points;
           $userPoints = $userPoints + 5 ;
           auth()->user()->update(['points' => $userPoints]);

        });
    }

    public function cardMethod($show , $seats , $randomTicketNum , $id) {
          Cart::destroy();
          Cart::add (
            $show->id . "|" . auth()->id() ,
           "Ticket for " .  $show->movie->name . " Movie" , count($seats) ,
            $show->time->price ,
            [
                'seats' => $seats ,
                 'randomTicketNum' => $randomTicketNum ,
                 'cinema' => $show->cinema->name ,
                 'show_id' => $id
            ]
           );


        foreach($seats as $seat) {
            $key = $id . '|' . $seat['number'];
            Cache::put($key, 1 , $seconds = 90);
        }

    }

    public function pointsMethod($randomTicketNum ,$seats, $id ,  $price) {
        $userPoints =  auth()->user()->points;

        if($userPoints>=$price){
            DB::transaction(function () use ($randomTicketNum, $seats , $id, $userPoints,$price) {

                $ticket = Ticket::firstOrCreate([
                    'show_id' =>  $id  ,
                    'user_id' => auth()->id(),
                ] , [
                    'ticket_num' => $randomTicketNum,
                    'show_id' =>  $id  ,
                    'user_id' => auth()->id(),
                    'payment_type' => 'Points',
                    'status' => 'Waiting',
                ]);

               $ticket->seats()->createMany($seats);
               $userPoints = $userPoints - $price ;
               auth()->user()->update(['points' => $userPoints]);

            });

             return true;
        } else {
            return false;
        }

    }



    public function randomInteger($in) {
        do {
            $rand = rand(1, 99);
        } while(in_array($rand, $in));
        return $rand;
    } //b3ml check eza kan el rand da mwgod gwa el in array de wala l2
    //el in de heya kol l random numbers  y3ni kol l seats el m7goza gwa el show de

    public function checkCachedSeats($seats , $id) {
        foreach($seats as $seat) {
            $key = $id . '|' . $seat;
            if (Cache::has($key)) {
               return true;
            }
        }

        return false;
    }
}
