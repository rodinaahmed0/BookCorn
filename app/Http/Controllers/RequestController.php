<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function create() {
        return view("front.requests.create");
    }

    public function store(Request $r) {
        $validated= $r->validate([
            'cinema_name' => 'required|min:3|max:50',
            'phone' => 'required',
            'email' => 'required',
            'name' => 'required',
            'link' => 'required|max:255',
            'cinema_location' => 'required',
         ]);

          if (auth()->user()->requests->first() != null) {
              auth()->user()->requests->first()->delete();
          }

          $validated['user_id'] = auth()->id();
          $validated['status'] = 'Pending';

        $image = $r->file('image');
        $extension = $image->getClientOriginalExtension();
        $name = 'cinema-'. $r->name .'-'.uniqid() . ".$extension";

        $image->move('images/cinemas/' , $name);
        $validated["image"] = $name;
          ModelsRequest::create($validated);

          return redirect(route('home'));

    }
}
