<div class="navigation">
    <input type="checkbox" class="navigation__checkbox" id="navi-toggle" />
    <label for="navi-toggle" class="navigation__button"
      ><span class="navigation__icon">&nbsp;</span></label
    >

    <div class="navigation__background">&nbsp;</div>

    <nav class="navigation__nav">
      <ul class="navigation__list">

        @auth

        <li class="navigation__item">
          <a href="#" class="navigation__link">{{auth()->user()->points}}<span>CP</span></a>
        </li>
        @endauth
        <li class="navigation__item">
          <a href="{{route('home')}}" class="navigation__link">Home</a>
        </li>
        <li class="navigation__item">
          <a href="{{route('cinema.index')}}" class="navigation__link">Cinemas</a>
        </li>
        <li class="navigation__item">
          <a href="{{route('profile.index')}}" class="navigation__link">Profile</a>
        </li>
       @auth
        <li class="navigation__item">
            <form action="{{route('logout')}}" method="post" class="logout__form">
                @csrf
                <button type="submit" class="navigation__link logout__form--btn">Log out</button>
            </form>
        </li>
        @endauth

      </ul>
    </nav>
  </div>
