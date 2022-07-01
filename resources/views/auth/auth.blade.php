@extends('layouts.auth')

@section('title')
Login
@endsection

@section('links')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/login.css')}}" />
@endsection

@section('content')
  <!-- ====================Registration====================== -->
  <div class="login__container ">

    <div class="registration">
      <div class="container__registration" id="container">
        <!-- ====================SignUp====================== -->
        <div class="form-container sign-up-container">
            <form class="registration__form" method="POST" action="{{ route('register') }}">
                @csrf
            <h1 class="heading-1">Create Account</h1>

            <div class="form__group">
                <input
                  type="text"
                  class="form__input"
                  placeholder="Full name"
                  id="name"
                  name="name"
                  required
                />
                <label for="name" class="form__label">Full name</label>
              </div>
              <div class="form__group">
                <input
                  type="email"
                  class="form__input"
                  placeholder="E-mail"
                  name="email"
                  id="email"
                  required
                />
                <label for="email" class="form__label">E-mail Address</label>
              </div>
              <div class="form__group">
                <input
                  type="tel"
                  class="form__input"
                  placeholder="Phone number"
                  id="phone"
                  name="phone"
                  required
                />
                <label for="phone" class="form__label">Phone number</label>
              </div>
              <div class="form__group">
                <input
                  type="password"
                  class="form__input"
                  name="password"
                  placeholder="Password"
                  id="signupPassword"
                  required
                />
                <label for="password" class="form__label">Password</label>
              </div>

              <div class="form__group">
                <input
                  type="password"
                  class="form__input"
                  name="password_confirmation"
                  placeholder="Confirm Password"
                  id="signupPassword"
                  required
                />
                <label for="password" class="form__label">Confirm Password</label>
              </div>

              <button class="btn btn--dark">Sign Up</button>
          </form>
        </div>
        <!-- ====================Pic Form====================== -->

        <div class="form-container form__pic">
          <img src="{{asset('images/cinema1.jpg')}}" alt="" class="form__pic--img" />
        </div>
        <!-- ====================SignIN====================== -->

        <div class="form-container sign-in-container">
            <form class="registration__form" method="POST" action="{{ route('login') }}">
                @csrf
            <h1 class="heading-1">Log In</h1>
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <p class="attention">
                {{ $error }}
              </p>
              @endforeach
             @endif
            <div class="form__group">
                <input
                  type="email"
                  name="email"
                  class="form__input"
                  placeholder="E-mail Address"
                  required
                />
                <label for="email" class="form__label">E-mail</label>
              </div>
              <div class="form__group">
                <input
                  type="password"
                  name="password"
                  class="form__input"
                  placeholder="Password"
                  id="signinPassword"
                  required
                />
                <label for="password" class="form__label">Password</label>
              </div>
              <p class="paragraph-1">
                <a href="#" class="forgetPassword">Forget password?</a>
              </p>

              <button class="btn btn--dark" type="submit">Sign In</button>
          </form>
        </div>

        <!-- ====================Forget password====================== -->

        <div class="form-container form__forget">
          <form class="registration__form">
            <h1 class="heading-1">Forget Password</h1>
            <p class="paragraph-1">
              Please enter the email address registered in our systems below to
              receive a password reset link and a code:
            </p>
            <div class="form__group">
              <input
                type="email"
                class="form__input forget__input"
                placeholder="Your E-mail Address"
                id="forgetEmail"
                required
              />
              <label for="email" class="form__label">E-mail Address</label>
            </div>
            <p class="paragraph-1">
              Don’t have an account?
              <a href="#" class="form__forget--signin">Sign Up</a>
            </p>

            <button class="btn btn--dark">Reset my Password</button>
          </form>
        </div>

        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <a href="index.html" class="overlay-container--link">
                <img
                  src="{{asset('images/Artboard1.svg')}}"
                  class="overlay-container--img"
                >
              </a>
              <h1>Welcome Back</h1>
              <p class="paragraph-1">
                If you already have account please login to keep connected with
                us
              </p>
              <button class="btn btn--blue ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
              <a href="index.html" class="overlay-container--link">
                <img
                  src="{{asset('images/Artboard1.svg')}}"
                  class="overlay-container--img"
                >
              </a>
              <h1>Hello Friend</h1>
              <p class="paragraph-1">
                Don't have account ? Please sign up with your personal details
                to connect with us !
              </p>
              <button class="btn btn--blue ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="registration__overlay"></div>
  </div>
@endsection


@section('scripts')
<script src="{{asset('js/login.js')}}"></script>
@endsection
