
@extends('layouts.app')

@section('title')
{{$movie->cinema->name}} -  {{$movie->name}} Movie
@endsection

@section('links')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/film.css')}}" />

@endsection



@section('content')

@include('includes.navbar_background')

    <!-- ========================== film informations========================== -->
    <section class="container">
        <div class="basic__information">
          <h2 class="heading-2__line"> {{$movie->name}} </h2>
          <span class="age">G</span>
        </div>
        <div class="film__poster">
          <img src="{{asset('images/movies/' . $movie->image)}}" alt="Turning Red" class="film__poster--img">
        </div>

        <div class="film__trailer">
            <iframe width="560" height="315" src="{{$movie->trailer_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="dashed-1">
          <a href="" class="btn-2 show__btn">Showtimes</a>
        </div>

        <div class="film__information">
          <aside class="information">
            <p class="information__paragraph" ><strong>Genre: </strong> {{$movie->category->name}} </p>
            <p class="information__paragraph" ><strong>Time: </strong> {{$movie->duration}}  </p>
            <p class="information__paragraph" ><strong>Language:</strong> {{$movie->language}} </p>
          </aside>
          <article class="story">
            <p class="story__paragraph">
                {{$movie->description}}
            </p>
        </article>
        </div>

        <hr class="dashed-2">

        <div class="booking">
          <h1 class="heading-1 booking__heading">It's more than just a <span> movie.</span></h1>

         <h2 class="heading-2__line film__heading--name"> {{$movie->name}} - SHOWTIMES</h2>
         <div class="catigories__headings catigories__headings--container">
            <a href="" class="catigories__link operations__tab--1 catigories__tab--active " data-tab="1">
              Today
            </a>
            <span class="catigories__span">/</span>
            <a href="" class="catigories__link operations__tab--2 " data-tab="2">
              Tomorrow
            </a>
          </div>

          <div class="catigories__content catigories__content--1 catigories__content--active films">
            <div class="booking__hall">
              <div class="standard__hall">
                  <h4 class="heading-4 booking__hall--standerd">Standard</h4>
                  <div class="booking__tickets">

                    @foreach ($todayShows as $show )

                    <div class="booking__details">
                        <a href="{{route('show.book' , $show->id)}}" class="booking__time">
                         {{  Carbon\Carbon::parse($show->time->show_time)->format('g:i A') }}
                        </a>
                        <p class="booking__price"> {{$show->time->price}} EGP </p>
                    </div>
                   @endforeach
                  
                </div>
              </div>
            </div>
          </div>

          <div class="catigories__content catigories__content--2 films">
            <div class="booking__hall">
              <div class="standard__hall">
                  <h4 class="heading-4 booking__hall--standerd">Standard</h4>
                  <div class="booking__tickets">
                    @foreach ($tommorowShows as $show )

                      <div class="booking__details">
                          <a href="{{route('show.book' , $show->id)}}" class="booking__time">
                          {{  Carbon\Carbon::parse($show->time->show_time)->format('g:i A') }}
                          </a>
                          <p class="booking__price"> {{$show->time->price}} EGP </p>
                      </div>
                   @endforeach
                </div>
              </div>
            </div>
          </div>

         {{-- <div class="booking__hall">

            <div class="standard__hall">
              <h4 class="heading-4 booking__hall--standerd">Standard</h4>
              <div class="booking__tickets">
          
            </div>
          </div>

          </div> --}}
        </div>  
      </section>
      <!-- ========================== End film informations========================== -->

@endsection






@section('scripts')
<script src="{{asset('js/film.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
@endsection


