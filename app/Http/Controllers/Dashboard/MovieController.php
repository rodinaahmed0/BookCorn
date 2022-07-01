<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(){
        $movies= auth()->user()->cinema->movies;
        return view('dashboard.movies.index' , compact('movies'));
    }

    public function create(){
        return view('dashboard.movies.create')->with(['categories' => Category::all()]);
    }

  public function store(Request $r){
        $validated= $r->validate([
          'name' => 'required|unique:movies|min:3|max:50',
          'description' => 'required|min:10',
          'language' => 'required',
          'duration' => 'required',
          'trailer_link' => 'required',
        ]);
        $image = $r->file('image');
        $extension = $image->getClientOriginalExtension();
        $name = 'movie-'. $r->name .'-'.uniqid() . ".$extension";

        $image->move('images/movies/' , $name);

        Movie::create([
            'name' => $r->name,
            'description' => $r->description,
            'language' => $r->language,
            'duration' => $r->duration,
            'trailer_link' => $r->trailer_link,
            'cinema_id' => auth()->user()->cinema->id, //must be authebticate cinema user
            'category_id' => $r->category_id,
            'image' => $name,
        ]);

        return redirect(route('movies.index'));
  }

  public function edit($id){
      $movie = Movie::findOrFail($id);
      $categories = Category::all();
      return view('dashboard.movies.edit',compact('movie' , 'categories'));
  }

  public function update(Request $r,$id){
      $validated=$r->validate([
          'name' => ['required', Rule::unique('movies')->ignore($id),'between:3,50'],
          'description' => 'required|min:10',
          'language' => 'required',
          'duration' => 'required',
          'trailer_link' => 'required',
      ]);

      Movie::where('id',$id)->update([
        'name' => $r->name,
        'description' => $r->description,
        'language' => $r->language,
        'duration' => $r->duration,
        'trailer_link' => $r->trailer_link,
        'cinema_id' => auth()->user()->cinema->id, //must be authebticate cinema user
        'category_id' => $r->category_id,
    ]);

     return redirect(route('movies.index'));
  }

  public function destroy($id){
      Movie::where('id' , $id)->delete();
      return redirect(route('movies.index'));
  }
}
