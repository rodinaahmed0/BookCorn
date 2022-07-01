@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Time</h3>

    </div>
    <div class="card-body">

          <form action="{{route('times.update',$time->id)}}" method="post">
              @csrf

              <div class="form-group">
                <input type="text" class="form-conrol" name="show_time" placeholder="Show Time" value="{{old('show_time') ?? $time->show_time}}">
            </div>

            <div class="form-group">
                <input type="number" class="form-conrol"  name="price" placeholder="Price" value="{{old('price') ?? $time->price}}">
            </div>

              <input type="submit" class="btn btn-primary mt-3">
          </form>
      </div>

</div>

@endsection


