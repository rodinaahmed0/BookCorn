<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index() {
        return view('front.checkout.index');
    }


    public function store(Request $request ) {
        $user = auth()->user() ?? new User;
        $ticket_cart = Cart::content()->first();

        try {
            $user->charge((int)$ticket_cart->subtotal * 100 , $request->stripeId);
        } catch (Exception $e) {
            // we want to return it back to checkout with the error error
            //  dd($e->user_error);
             return back()->withErrors($e->user_error);
        }

        $show_id = $ticket_cart->options->show_id;
        $randomTicketNum = $ticket_cart->options->randomTicketNum;
        $seats = $ticket_cart->options->seats;

        DB::transaction(function () use ($show_id , $randomTicketNum, $seats ) {
            $ticket = Ticket::firstOrCreate([
                'show_id' =>  $show_id  ,
                'user_id' => auth()->id(),
            ] , [
                'ticket_num' => $randomTicketNum,
                'show_id' =>  $show_id  ,
                'user_id' => auth()->id(),
                'payment_type' => 'Card',
                'status' => 'Waiting',
            ]);

            $ticket->seats()->createMany($seats);
            $userPoints =  auth()->user()->points;
            $userPoints = $userPoints + 5 ;
            auth()->user()->update(['points' => $userPoints]);
        });
        Cart::destroy();
//df3t w khlst 34an keda 3mlt destroy
        return redirect(route('profile.index'));
    }

}
