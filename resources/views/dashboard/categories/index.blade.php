@extends('layouts.dashboard')

{{-- <a href="{{route('categories.create')}}">Add category please</a> --}}
@section('title')
Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Categories</h3>
        <a data-target="#modal-create-category" data-toggle="modal" class="btn btn-sm btn-primary ml-auto" > Create New Category </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>
                    Actions
                </th>

            </tr>
            </thead>
            <tbody>

            @foreach ($categories as $category)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>

                    <td >

                            <button data-target="#modal-{{ $category->id }}" data-toggle="modal"  class="btn btn-warning btn-sm photoFilepond"  data-category-id="{{ $category-> id}}" >
                                <i class="fas fa-edit"></i>
                            </button>
                    
                        
                                {{-- <a class="btn btn-success btn-sm" href="{{ route('categories.show' , $category) }}">
                                    <i class="fas fa-eye"></i>
                                </a> --}}

                
                      
                                <form
                                    action="{{ route('categories.delete' , $category->id) }}"
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
                @include('dashboard.categories.modals._categoryModal' , $category)
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>

@include('dashboard.categories.modals._categoryModalCreate')

@endsection

