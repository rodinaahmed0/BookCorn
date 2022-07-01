@extends('layouts.dashboard')
@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Request</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p>User : {{$request->user->name}}</p>
        <p> Cinema Name : {{$request->cinema_name}}</p>
        <p> Cinema Location : {{$request->cinema_location}}</p>
        <p> Owner Phone : {{$request->phone}}</p>
        <p> Owner Email : {{$request->email}}</p>
        <p> Maps Link : {{$request->link}}</p>
         
        <form action="{{route('requests.approve' , $request->id)}}"  style="display: inline-block;" method="post">
            @csrf

            <input type="text" class="form-control" name="long" placeholder="Long"> 
            <input type="text" class="form-control" name="lat" placeholder="Lat">
            <button type="submit" class="btn btn-success btn-sm">Aprove</button>
        </form>


        <form
            action="{{route('requests.cancel',$request->id)}}"
            method="post"
        >
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                Cancel
            </button>
        </form>


    </div>
    <!-- /.card-body -->

</div>

@endsection


<div>
