<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class HallController extends Controller
{
    public function index(){
        $halls=  auth()->user()->cinema->halls;
        return view('dashboard.halls.index' , compact('halls'));
  }
  public function create(){
      return view('dashboard.halls.create');
  }

  public function store(Request $r){
        $validated= $r->validate([
          'number' => 'required|integer',
          'seats' => 'required|integer',
       ]);

        Hall::create([
            'number' => $r->number,
            'seats' => $r->seats,
            'cinema_id' => auth()->user()->cinema->id, //must be authebticate cinema user
        ]);

        return redirect(route('halls.index'));
  }

  public function edit($id){
      $hall = Hall::findOrFail($id);
      return view('dashboard.halls.edit',compact('hall'));
  }

  public function update(Request $r,$id){
      $validated=$r->validate([
        'number' => 'required|integer',
        'seats' => 'required|integer',
      ]);

      Hall::where('id',$id)->update([
        'number' => $r->number,
        'seats' => $r->seats,
        'cinema_id' => auth()->user()->cinema->id, //must be authebticate cinema user
    ]);

     return redirect(route('halls.index')); 
  }

  public function destroy($id){
      Hall::where('id' , $id)->delete();
      return redirect(route('halls.index'));
  }
}
