

@extends('layouts.app')

@section('title')
{{$show->cinema->name}} - {{$show->movie->name}} Movie Booking
@endsection

@section('links')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/seat.css')}}" />

@endsection



@section('content')

@include('includes.navbar_background')

    <!-- ====================Start Seats====================== -->
    <p class="attention remove">You have reached the maximum number of seats for this transaction.</p>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p class="attention">
        {{ $error }}
      </p>
      @endforeach
     @endif

    <div class="seats__container">
    <div class="movie-container">
        <h2 class="movie__container--heading"> {{$show->movie->name}} </h2>
        <h2 class="movie__container--heading"> {{$show->date}} </h2>

    </div>
    <div class="film__poster">
      <img src="{{asset('images/movies/' . $show->movie->image)}}" alt="{{$show->movie->name}}" class="film__poster--img">
    </div>
    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <strong>Availble</strong>
      </li>
      <li>
        <div class="seat selected-1"></div>
        <strong>Your Seat</strong>
      </li>
      <li>
        <div class="seat occupied"></div>
        <strong>Booked</strong>
      </li>
    </ul>

    <div class="container">
      <div class="screen">
      </div>
      <form action="{{route('seats.store',$show->id)}}" method="post">
        @method('POST')
        @csrf
        @for ($i = 1 , $counter = 1 ; $i <= $show->hall->seats / 12 ; $i++)
        <div class="line" id="movie">
          @for ($j = 1 ; $j <= 10 ; $j++)
          <label class="seat" for="seat-{{$counter}}"></label>
          <input type="checkbox" name="seats[]" id="seat-{{$counter}}" value="{{$counter}}" hidden>
          @php $counter++ @endphp
          @endfor
        </div>
        @endfor

      <div class="payment__methods">
          <label class="rad-label">
          <input type="radio" class="rad-input" name="payment_method" value="Cash" checked>
          <div class="rad-design"></div>
          <div class="rad-text">By Cash</div>

       </label>
        <label class="rad-label">
            <input type="radio" class="rad-input" name="payment_method" value="Card" >
            <div class="rad-design"></div>
            <div class="rad-text">By Card</div>
        </label>

        <label class="rad-label">
          <input type="radio" class="rad-input" name="payment_method" value="Points" >
          <div class="rad-design"></div>
          <div class="rad-text">By Points</div>
      </label>
      </div>
    </div>



    <p class="text">
      You have selected <span id="count">0</span> seats for a price of <span id="total">0</span> EGP</p>

      <button class="btn-2 confirm__seat off" type="submit">Confirm Seats</button>

    </form>
</div>

@endsection






@section('scripts')
<script> occSeats = {!! json_encode($occSeats) !!}</script>
<script> showPrice = {!! json_encode($show->time->price) !!}</script>
<script src="{{asset('js/seat.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
@endsection
