<header class="main__header">
    <a href="#" class="logo">
      <object data="{{asset('images/Artboard15.svg')}}" class="logo__img"> </object>
    </a>
    <div class="right__side">
      @guest    
      <a href="{{route('auth')}}" class="btn btn--dark login__modal ">Log in</a>
      @else
      @role('user')
     <a href="{{route('requests.new')}}" class="btn btn--dark login__modal">Have a cinema? Join Us</a>
      @endrole

      @role('admin|manager')
       <a href="{{route('dashboard')}}" class="btn btn--dark login__modal">Dashboard</a>
      @endrole

      @endguest

      <div class="btns day__night">
        <svg class="nav__icon">
          <use xlink:href="{{ asset('images/sprite.svg#icon-sun') }}"></use>
        </svg>
        <svg class="nav__icon">
          <use xlink:href="{{ asset('images/sprite.svg#icon-moon') }}"></use>
        </svg>
      </div>
    </div>
  </header>

  