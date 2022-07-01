@extends('layouts.app')

@section('links')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/profile.css')}}" />
@endsection

@section('title')
Profile
@endsection

@section('content')

<header class="profile__header">
          
    <div class="header__logo">
      <object data="{{asset('images/Artboard15.svg')}}" class="header__logo--img"> </object>
    </div>

  <div class="btns day__night">
    <svg class="nav__icon">
      <use xlink:href="{{asset('images/sprite.svg#icon-sun')}}"></use>
    </svg>
    <svg class="nav__icon">
      <use xlink:href="{{asset('images/sprite.svg#icon-moon')}}"></use>
    </svg>
  </div>
  </header>
  <main>
    <section class="myinfo">
      <h1 class="myinfo__heading--1">Wallet: <span> {{$user->wallet}}EGP</span></h1>
      <h4 class="myinfo__heading--4">Points: <span>{{$user->points}}CP</span></h4>

    <div class="myinfo__details">
      <div class="top__info">
        <div class="top__info--1">
          <div class="heading">
            <h1 class="heading--1"> PERSONAL INFORMATION</h1>
            <span class="line"></span>
          </div>
          <div class="myinfo__detail">
        <h3 class="heading--3"> Name:</h3>
        <span> {{$user->name}} </span>
      </div>
    
      
      <div class="myinfo__detail">
        <h3 class="heading--3">Mobile Phone:</h3>
        <span> {{$user->phone}} </span>
      </div>
      
      <div class="myinfo__detail">
        <h3 class="heading--3">Email:</h3>
        <span> {{$user->email}} </span>
      </div>
    </div>
    <div class="top__info--2">

      <div class="heading">
        <h1 class="heading--1">YOUR REQUESTS</h1>
        <span class="line"></span>
      </div>   
        @forelse ($user->requests as $request )
        <div class="myinfo__detail">
            <h3 class="heading--3">Status:</h3>
            <span> {{$request->status}} </span>
        </div>
        @empty
        <h3 class="heading--3"> You have no requests</h3>
        @endforelse
         
    
    </div>
    
    </div>


      <div class="heading">
        <h1 class="heading--1"> Your tickets</h1>
        <span class="line"></span>
      </div>            
      <div class="booking__tickets">
       @foreach ($user->tickets as $ticket )
            
        <a href="{{route('ticket.index',$ticket->id)}}" class="booking__ticket" >
          <span>{{$ticket->show->date}} <strong> / </strong> </span>
          <span> {{$ticket->show->cinema->name}} <strong> / </strong> </span>
          <span> {{$ticket->show->movie->name}} </span>
        </a>  
        
        @endforeach  
      </div>
      
  </div>
</section>

</main>


@endsection


@section('scripts')
<script src="{{asset('js/script.js')}}"></script>
@endsection