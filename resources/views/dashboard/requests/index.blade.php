@extends('layouts.dashboard')
@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">requests</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Cinema number</th>
                <th>Cinema location</th>
                <th>Phone</th>
                <th>E-mail</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

              @foreach ($requests as $request)
              <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$request->user->name}}</td>
                    <td> {{$request->cinema_name}}</td>
                    <td> {{$request->cinema_location}}</td>
                    <td> {{$request->phone}}</td>
                    <td> {{$request->email}}</td>

                    <td >
                    
                        
                <a class="btn btn-warning btn-sm" href="{{ route('requests.show' , $request->id) }}">
                    <i class="fas fa-eye"></i>
                </a>

                   
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>

@endsection


<div>
