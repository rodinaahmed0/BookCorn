@extends('layouts.app')

@section('title')
Cinemas
@endsection

@section('links')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/cinemas.css')}}" />
<link
rel="stylesheet"
href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
crossorigin=""
/>
<script
defer
src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
crossorigin=""
></script>

@endsection
    


@section('content')

@include('includes.navbar_background')

   <!-- ====================Start Container====================== -->
   <div class="cinemas__container">
    <div class="story__pictures">
      <img src="{{asset('images/Roxy.webp')}}" alt="Roxy" class="story__img--1">
      <img src="{{asset('images/chairs2.webp')}}" alt="chairs" class="story__img--2">

    </div>
    <div class="story__content">
      <h1 class="heading-1 story__content--heading">&ldquo;Choose Your Home Theater&rdquo;</h1>
      <p class="story__content--paragraph">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque eaque adipisci nam. Vitae eveniet qui dolore vel placeat sed veritatis. Ullam similique amet quae corrupti, labore accusamus perferendis dolor repellendus!
      </p>
      <button class="btn-2 btn--dark book__cinema">Book now</button>
    </div>

    <div id="map"></div>
  <section class="section cinemas" id="section-2">
      @foreach ($cinemas as $cinema )
          
    
        <div class="cinema">
        <img src="{{asset('images/cinemas/' . $cinema->image )}}" alt="Cinema Amir" class="cinema__img">
        <h5 class="cinema__name">Cinema {{$cinema->name}}</h5>
        <div class="cinema__location">
            <svg class="cinema__icon">
            <use xlink:href="{{ asset('images/sprite.svg#icon-location') }}"></use>
            </svg>
            <p>{{$cinema->location}}</p>
        </div>
        <div class="cinema__price">
            <svg class="cinema__icon">
            <use xlink:href="{{ asset('images/sprite.svg#icon-coin-dollar') }}"></use>
            </svg>
            <p>
              From {{$cinema->times->first()->price ?? 100}} LE
            </p>
        </div>
       
        <div class="cinema__halls">
            <svg class="cinema__icon">
            <use xlink:href="{{ asset('images/sprite.svg#icon-video-camera') }}"></use>
            </svg>
            <p>{{$cinema->movies->count()}} Movies</p>
        </div>
        <a href="{{route('cinema.show' , $cinema->id)}}" class="btn-3 cinema__btn">Book your movie</a>
        </div>
  
   
    @endforeach
  </section>
</div>
@endsection






@section('scripts')

<script src="{{asset('js/cinemas.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script> c = {!! json_encode($map) !!}</script>
<script  src="{{asset('js/map.js')}}"></script>
@endsection







