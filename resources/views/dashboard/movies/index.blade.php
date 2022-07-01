@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Movies</h3>
        <a href="{{ route('movies.create') }}" class="btn btn-sm btn-primary ml-auto" > Create New Movie </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Language</th>
                <th>trailer_link</th>
                
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>

              @foreach ($movies as $movie)
              <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $movie->name }}</td>
                    <td> {{ $movie->description }}</td>
                    <td> {{ $movie->duration }}</td>
                    <td> {{ $movie->language }}</td>
                    <td> {{ $movie->trailer_link }}</td>                    

                    <td >

                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm photoFilepond"  data-category-id="{{ $movie-> id}}" >
                                <i class="fas fa-edit"></i>
                            </a>
                    
                        
                                {{-- <a class="btn btn-success btn-sm" href="{{ route('categories.show' , $category) }}">
                                    <i class="fas fa-eye"></i>
                                </a> --}}

                
                      
                                <form
                                    action="{{ route('movies.delete' , $movie->id) }}"
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


