@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Shows</h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body">

          <form action="{{route('shows.store')}}" method="post">
              @csrf

              <div class="form-group mb-3">
                <input type="date" class="form-control" name="date" >
              </div>
              <select class="form-control mb-3" name="movie_id" >

                @foreach ($cinema->movies as $item)
                      <option value="{{ $item->id }}"> {{ $item->name }} </option>
                @endforeach
        
            </select>            
            <select class="form-control mb-3" name="hall_id" >

                @foreach ($cinema->halls  as $item)
                <option value="{{ $item->id }}"> {{ $item->number }} </option>

                @endforeach
        
            </select>
            <select class="form-control " name="time_id" >
        
                @foreach ($cinema->times  as $item)
                <option value="{{ $item->id }}"> {{ $item->show_time }} </option>
                @endforeach
        
            </select>
            
              <input type="submit" class="btn btn-primary mt-3">
          </form>
      </div>
<!-- /.card-body -->

</div>


@endsection
