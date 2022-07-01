@extends('layouts.dashboard')
@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Time</h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body">

          <form action="{{route('times.store')}}" method="post">
              @csrf

              <div class="form-group mb-3">
                <input type="time" class="form-control" name="show_time" placeholder="Show Time" >
              </div>

              <div class="form-group mb-3">
                <input type="number" class="form-control" name="price" placeholder="Price" >
              </div>
            
              <input type="submit" class="btn btn-primary mt-3">
          </form>
      </div>
<!-- /.card-body -->

</div>


@endsection

<form action="{{route('times.store')}}" method="post">
    @csrf




    <input type="submit">
</form>
