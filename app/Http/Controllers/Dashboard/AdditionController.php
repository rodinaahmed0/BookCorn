<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Addition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdditionController extends Controller
{
    public function index(){
        $additions=  Addition::all();
        return view('dashboard.additions.index' , compact('additions'));
  }
  public function create(){

      return view('dashboard.additions.create');
  }

  public function store(Request $r){
        $validated= $r->validate([
          'name' => 'required|string',
          'price' => 'required|integer',

       ]);

        Addition::create([
            'name' => $r->name,
            'price' => $r->price,
            'image' => 'sora',
            'cinema_id' => 2 //must be authebticate cinema user
        ]);

        return redirect(route('additions.index'));
  }

  public function edit($id){
      $addition = Addition::findOrFail($id);
      return view('dashboard.additions.edit',compact('addition'));
  }

  public function update(Request $r,$id){
      $validated=$r->validate([
        'name' => 'required|string',
        'price' => 'required|integer',
      ]);

      Addition::where('id',$id)->update([
        'name' => $r->name,
        'price' => $r->price,
        'image' => "sora",
        'cinema_id' => 2, //must be authebticate cinema user
    ]);

     return redirect(route('additions.index'));
  }

  public function destroy($id){
      Addition::where('id' , $id)->delete();
      return redirect(route('additions.index'));
  }
}
