<?php

namespace App\Http\Controllers\Dashboard;



use App\Models\Movie;
use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CinemaController extends Controller
{
    public function index(){
        $cinemas=Cinema::all();
        return view('dashboard.cinemas.index',compact('cinemas'));
    }

    public function show($id){
        $cinema=Cinema::findOrFail($id);
        return view('dashboard.cinemas.show',compact('cinema'));
    }

    public function destroy($id){
        $cinema = Cinema::FindOrFail($id);
        DB::transaction(function () use ($cinema) {  
            $cinema->user->assignRole('user');
            $cinema->user->removeRole('manager');
            $cinema->delete();
        });
      
        return redirect( route('cinemas.index'));
    }
}
