@extends('layouts.app')

@section('title')
Checkout
@endsection

@section('links')
<link rel="stylesheet" href="{{asset('css/checkout.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">

@endsection


@section('content')

@include('includes.navbar_background')


<div class="payment-content">



<form id="payment-form" class="checkout__form" method="POST" action="{{route('checkout.store')}}">
    @csrf
    @foreach (Cart::content() as $cart )
    <div class="checkout__info">
      <p class="checkout__info--paragraph">
        {{$cart->name}}
      </p>
      <p class="checkout__info--paragraph">
        Price:
        <span>
          {{$cart->price}}
        </span>
      </p>
      <p class="checkout__info--paragraph">
        Total:
        <span>
          {{$cart->subtotal}}
        </span>
      </p>
      <p class="checkout__info--paragraph">
        Ticket Number:
        <span>
          {{$cart->options->randomTicketNum}}
        </span>
      </p>
    </div>

      <br>
@endforeach
    <div id="card-element">
      <!-- Elements will create input elements here -->
    </div>

    <!-- We'll put the error messages in this element -->
    <div id="card-errors" role="alert"></div>
    
    <button id="submit-payment">Submit Payment</button>
  </form>
</div>


<!-- ============================ toTOP button====================== -->
<div class="up">
    <svg class="slide__icon">
      <use xlink:href="img/sprite.svg#icon-chevron-thin-down"></use>
    </svg>
  </div>
  <!-- ============================End toTOP button====================== -->


@endsection


@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{asset('js/script.js')}}"></script>
<script> userName = {!! json_encode(auth()->user()->name) !!}</script>
<script> userEmail = {!! json_encode(auth()->user()->email) !!}</script>
<script src="{{asset('js/checkout.js')}}"></script>
@endsection
