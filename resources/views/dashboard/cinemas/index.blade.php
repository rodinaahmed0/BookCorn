@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">cinemas</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Location</th>
            </tr>
            </thead>
            <tbody>

              @foreach ($cinemas as $cinema)
              <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cinema->name }}</td>
                    <td> {{ $cinema->owner_phone }}</td>
                    <td> {{ $cinema->location }}</td>
                    <td >
                        <a href="{{ route('cinemas.show', $cinema->id) }}" class="btn btn-warning btn-sm photoFilepond"  data-category-id="{{ $cinema-> id}}" >
                            <i class="fas fa-eye"></i>
                        </a>
                                <form
                                    action="{{ route('cinemas.destroy' , $cinema->id) }}"
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
