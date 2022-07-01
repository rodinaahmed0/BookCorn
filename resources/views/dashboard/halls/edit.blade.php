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

          <form action="{{route('halls.update',$hall->id)}}" method="post">
              @csrf

            <div class="form-group">
              <input type="text" name="number" class="form-control" value="{{old('number') ?? $hall->number}}" placeholder="Number">
            </div>

            <div class="form-group">
              <input type="text" name="seats" class="form-control" value="{{old('seats') ?? $hall->seats}}" placeholder="Seats">
            </div>
    
            
              <input type="submit" class="btn btn-primary mt-3">
          </form>
      </div>
<!-- /.card-body -->

</div>

@endsection


