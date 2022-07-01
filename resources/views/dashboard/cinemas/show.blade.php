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
                <th style="width: 10px">Cinema</th>
                <th>Phone</th>
                <th>Owner</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

              <tr class="text-center">
                    <td>{{$cinema->name}}</td>
                    <td> {{ $cinema->owner_phone }}</td>
                    <td> {{$cinema->user->name}}</td>
                    <td >

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
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>

@endsection


{{-- Owner : 


<form action="{{route('cinemas.destroy' , $cinema->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Delete!</button>
</form> --}}