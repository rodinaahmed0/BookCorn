@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">halls</h3>
        <a href="{{ route('halls.create') }}" class="btn btn-sm btn-primary ml-auto" > Create New hall </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Hall number</th>
                <th>Hall seats</th>

            </tr>
            </thead>
            <tbody>

              @foreach ($halls as $hall)
              <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>Hall number {{ $hall->number }}</td>
                    <td> {{ $hall->seats }}</td>

                    <td >

                            <a href="{{ route('halls.edit', $hall->id) }}" class="btn btn-warning btn-sm photoFilepond"  data-category-id="{{ $hall-> id}}" >
                                <i class="fas fa-edit"></i>
                            </a>
                    
                        
                                {{-- <a class="btn btn-success btn-sm" href="{{ route('categories.show' , $category) }}">
                                    <i class="fas fa-eye"></i>
                                </a> --}}

                
                      
                                <form
                                    action="{{route('halls.delete',$hall->id)}}"
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
