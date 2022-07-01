@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">times</h3>
        <a href="{{ route('times.create') }}" class="btn btn-sm btn-primary ml-auto" > Create New time </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th style="width: 10px">#</th>
                <th>Price</th>
                <th>Show time</th>

            </tr>
            </thead>
            <tbody>

              @foreach ($times as $time)
              <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $time->price }} EGP</td>
                    <td> {{  Carbon\Carbon::parse($time->show_time)->format('g:i A') }}</td>


                    <td >

                            <a href="{{ route('times.edit', $time->id) }}" class="btn btn-warning btn-sm photoFilepond"  data-category-id="{{ $time-> id}}" >
                                <i class="fas fa-edit"></i>
                            </a>
                
                      
                                <form
                                    action="{{ route('times.delete' , $time->id) }}"
                                    method="post"
                                    style="display: inline-block;"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('{{ __('Are you sure?') }}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                       
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>

@endsection
