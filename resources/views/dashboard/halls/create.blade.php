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

          <form action="{{route('halls.store')}}" method="post">
              @csrf

            <div class="form-group">
                <input type="text" class="form-control" name="number" placeholder="Hall Number">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="seats" placeholder="Seats Number">
            </div>
            
              <input type="submit" class="btn btn-primary mt-3">
          </form>
      </div>

</div>

@endsection
