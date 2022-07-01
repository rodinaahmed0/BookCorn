@extends('layouts.dashboard')
@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Show</h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body">

          <form action="{{route('shows.update',$show->id)}}" method="post">
              @csrf

              <div class="form-group">
                <input type="date" class="form-control" name="date" value="{{$show->date}}">
              </div>

                <select class="form-control mb-3" name="movie_id" >

                    @foreach ($cinema->movies as $item)
                      <option value="{{ $item->id }}" {{ $item->id == $show->show_id ? 'selected' : ''}}>
                         {{ $item->name }} </option>
                    @endforeach
            
                </select>            
                <select class="form-control mb-3" name="hall_id" >

                    @foreach ($cinema->halls  as $item)
                      <option value="{{ $item->id }}" {{ $item->id == $show->hall_id ? 'selected' : ''}}>
                         {{ $item->number }} </option>
                    @endforeach
            
                </select>
                <select class="form-control " name="time_id" >
            
                    @foreach ($cinema->times  as $item)
                      <option value="{{ $item->id }}" {{ $item->id == $show->time_id ? 'selected' : ''}}>
                         {{ $item->show_time }} </option>
                    @endforeach
            
                </select>
            
              <input type="submit" class="btn btn-primary mt-3">
          </form>
      </div>
<!-- /.card-body -->

</div>

@endsection


