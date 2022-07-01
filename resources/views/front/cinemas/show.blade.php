
@extends('layouts.app')

@section('title')
Cinema {{$cinema->name}}
@endsection

@section('links')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/cinema.css')}}" />

@endsection
    


@section('content')

@include('includes.navbar_background')

 <!-- ====================Start Container====================== -->
 <div class="cinema__container">
    <div class="cinema__pictures">
      <img src="{{asset('images/cinemas/' . $cinema->image)}}" alt="" class="cinema__img--1">

    </div>
    <div class="cinema__content">
      <h1 class="heading-1 cinema__content--heading">&ldquo;Cinema {{$cinema->name}}&rdquo;</h1>
      <div class="cinema__content--paragraphs">
      <p class="cinema__content--paragraph">
        <span>
            <svg class="location__icon">
              <use xlink:href="{{ asset('images/sprite.svg#icon-location') }}"></use>
            </svg>
        </span>
        Location:  {{$cinema->location}}
      </p>
      <p class="cinema__content--paragraph">
        <span>
            <svg class="phone__icon">
              <use xlink:href="{{ asset('images/sprite.svg#icon-phone') }}"></use>
            </svg>
        </span>
        Phone: {{$cinema->owner_phone}}
      </p>
      <p class="cinema__content--paragraph">
        <span>
          <svg class="movie__icon">
            <use xlink:href="{{ asset('images/sprite.svg#icon-video-camera') }}"></use>
          </svg>
        </span>
        Movies Available: {{$cinema->movies->count()}}
      </p>
      <p class="cinema__content--paragraph">
        <span>
          <svg class="important__icon">
            <use xlink:href="{{ asset('images/sprite.svg#icon-label_important') }}"></use>
          </svg>
        </span>
        Halls Available:  {{$cinema->halls->count()}}
      </p>
      <p class="cinema__content--paragraph">
        <span>
          <svg class="important__icon">
            <use xlink:href="{{ asset('images/sprite.svg#icon-label_important') }}"></use>
          </svg>
        </span>
        For 3D films, the ticket price does not include the price of the 3D glasses.
      </p>

    </div>
    <button class="btn-2 btn--dark book__cinema">Show Available Movies</button>
  </div>

  <section class="section films" id="section-2">

     @foreach ($cinema->movies as $movie )
            <div class="film">
                    <img src="{{asset('images/movies/' . $movie->image )}}" alt="uncahrted" class="film__img">
                    <div class="film__rating">
                    <p class="film__rating--num">8.7</p> 
                    </div>
                    <div class="film__content">
            
                    
                    <h2 class="film__heading"> {{$movie->name}} </h2>
                    <p class="film__paragraph">
                        {{$movie->description}}
                    </p>
                    <div class="film__btns">
            
                        <a href="{{route('movie.show' , $movie->id)}}" class="film__btn">Book Now</a>
                        <a href="#" class="play__icon">
                        <svg class="play__icon--1">
                            <use xlink:href="{{ asset('images/sprite.svg#icon-controller-play') }}"></use>
                        </svg>
                        </a>
                    </div>
                    </div>
                </div>
            
    @endforeach 

                
                
                
            
                </section>
            </div>

@endsection






@section('scripts')
<script src="{{asset('js/cinema.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
@endsection


{{-- 
show all mocies related to this cinema, and show it's id, without variable, show cinema name, show user
@foreach ($cinema->movies as $movie)
{{$movie->name}}
<a href="{{route('movie.show',$movie->id)}}">go to movie</a>
@endforeach --}}
