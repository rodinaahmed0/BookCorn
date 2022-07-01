@extends('layouts.dashboard')
@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">shows</h3>
        <a href="{{ route('shows.create') }}" class="btn btn-sm btn-primary ml-auto" > Create New show </a>
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

                            <a href="{{ route('shows.edit', $show->id) }}" class="btn btn-warning btn-sm photoFilepond"  data-category-id="{{ $show-> id}}" >
                                <i class="fas fa-edit"></i>
                            </a>
                
                      
                                <form
                                    action="{{ route('shows.delete' , $show->id) }}"
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

