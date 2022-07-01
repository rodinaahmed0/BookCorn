<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeController extends Controller
{
    public function index(){
        $times=  auth()->user()->cinema->times;
        return view('dashboard.times.index' , compact('times'));
  }
  public function create(){
      return view('dashboard.times.create');
  }

  public function store(Request $r){
        $validated= $r->validate([
            'show_time' => 'required|string',
            'price' => 'required',
       ]);

        Time::create([
            'show_time' => $r->show_time,
            'price' => $r->price,
            'cinema_id' => auth()->user()->cinema->id, //must be authebticate cinema user
        ]);

        return redirect(route('times.index'));
  }

  public function edit($id){
      $time = Time::findOrFail($id);
      return view('dashboard.times.edit',compact('time'));
  }

  public function update(Request $r,$id){
      $validated=$r->validate([
        'show_time' => 'required|string',
        'price' => 'required',
      ]);

      Time::where('id',$id)->update([
        'show_time' => $r->show_time,
        'price' => $r->price,
        'cinema_id' => auth()->user()->cinema->id, //must be authebticate cinema user
    ]);

     return redirect(route('times.index'));
  }

  public function destroy($id){
      Time::where('id' , $id)->delete();
      return redirect(route('times.index'));
  }
}
