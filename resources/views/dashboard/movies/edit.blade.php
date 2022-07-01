
@extends('layouts.dashboard')
@section('title')
Dashboard
@endsection
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Movies</h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body">

          <form action="{{route('movies.update',$movie->id)}}" method="post">
              @csrf

            <div class="form-group">
              <input type="text" name="name" class="form-control" value="{{old('name') ?? $movie->name}}" placeholder="Name">
            </div>
            <div class="form-group">
              <textarea name="description" id="" class="form-control" cols="30" rows="10" ></textarea>
            </div>
            <div class="form-group">
              <input type="text" name="duration" class="form-control" value="{{old('duration') ?? $movie->duration}}" placeholder="Duration">
            </div>
            <div class="form-group">
              <input type="text" name="language" class="form-control" value="{{old('language') ?? $movie->language}}" placeholder="lang">
            </div>
            <div class="form-group">
              <input type="text" name="trailer_link" class="form-control" value=" {{old('trailer_link') ?? $movie->trailer_link}}" placeholder="link">
            </div>

              <select class="form-control" name="category_id">

                  <option selected>Select categorie</option>

                  @foreach ($categories as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $movie->category_id ? 'selected' : ''}}> 
                    {{$item->name}}
                    </option>
                  @endforeach

              </select>
            
              <input type="submit" class="btn btn-primary mt-3">
          </form>
      </div>
<!-- /.card-body -->

</div>

@endsection


