@extends('layouts.dashboard')

@section('title')
Today Shows
@endsection
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Today Shows</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th style="width: 10px">#</th>
                <th>Cinema name</th>
                <th>Time</th>
                <th>Show name</th>
                <th>Hall number</th>

            </tr>
            </thead>
            <tbody>

              @foreach ($shows as $show)
              <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $show->cinema->name }}</td>
                    <td>{{  Carbon\Carbon::parse($show->time->show_time)->format('g:i A') }}</td>
                    <td> {{ $show->movie->name }}</td>
                    <td> {{ $show->hall->number }}</td>

                    <td >
                        <a href="{{route('shows.today.view' , $show->id)}}" class="btn btn-warning btn-sm photoFilepond" >
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

