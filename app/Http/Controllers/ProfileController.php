<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function index(){
        $user=User::findOrFail(auth()->id());
        return view('front.profile.inf',compact('user'));

    }
}
