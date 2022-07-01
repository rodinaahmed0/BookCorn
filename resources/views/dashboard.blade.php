@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('content')
    <div class="row">
      
         <h1 class="m-auto">Welcome, {{auth()->user()->name}}</h1>
    
    </div>
@endsection


