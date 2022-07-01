
@extends('layouts.app')

@section('title')
{{-- {{$movie->cinema->name}} -  {{$movie->name}} Movie --}}
@endsection

@section('links')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/request.css')}}" />

@endsection



@section('content')

@include('includes.navbar_background')
<div class="request">
    <h1 class="heading--1">New Request</h1>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p class="attention">
        {{ $error }}
      </p>
      @endforeach
     @endif
    <form action="{{route('requests.store')}}" method="post" class="request__form" enctype="multipart/form-data">
    @csrf

      <div class="form__group">
        <input
          type="text"
          class="form__input"
          placeholder="Cinema Name"
          name="cinema_name"
          id="cinemaName"
          required
        />
        <label for="cinemaName" class="form__label">Cinema Name</label>
      </div>
      <div class="form__group">
        <input
          type="text"
          class="form__input"
          placeholder="Phone"
          name="phone"
          id="phone"
          required
        /><label for="phone" class="form__label">Phone</label>
      </div>
      <div class="form__group">
        <input
          type="text"
          class="form__input"
          placeholder="Email"
          name="email"
          id="email"
          required
        /><label for="email" class="form__label">E-mail</label>
      </div>
      <div class="form__group">
        <input
          type="text"
          class="form__input"
          placeholder="Owner Name"
          name="name"
          id="ownerName"
          required
        /><label for="ownerName" class="form__label">Owner Name</label>
      </div>
      <div class="form__group">
        <input
          type="text"
          class="form__input"
          placeholder="Cinema Location"
          name="cinema_location"
          id="location"
          required
        /><label for="location" class="form__label">Location</label>
      </div>

      <div class="form__group">
        <input
          type="text"
          class="form__input"
          placeholder="Google Maps Link"
          name="link"
          id="link"
          required
        /><label for="email" class="form__label">Google Maps Link</label>
      </div>

      <div class="form__group">
        <input
          type="file"

          placeholder="image"
          name="image"
          id="image"
          required
        />
      </div>
      <div class="form__button">
        <input type="submit" class="btn btn--dark" />
    </div>
    </form>
  </div>

@endsection

@section('scripts')
<script src="{{asset('js/script.js')}}"></script>
@endsection


{{-- <form action="{{route('requests.store')}}" method="post">
    @csrf

    <input type="text" name="cinema_name" placeholder="Cinema Name">
    <input type="text" name="phone" placeholder="Phone">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="name" placeholder="Owner Name">
    <input type="text" name="cinema_location" placeholder="Cinema Location">

    <input type="submit">
</form> --}}
