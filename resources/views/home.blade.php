@extends('layouts.app')


@section('title')
Bookcorn
@endsection

@section('links')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endsection

@section('content')

@include('includes.navbar_transparent')

<section class="section section-1">
    <video
      src="{{asset('videos/popcorn.mp4')}}"
      autoplay
      muted
      loop
      type="mp4"
      class="section-1__video"
    ></video>
    <img src="{{asset('images/mask.jpg')}}" class="section-1__img" alt="Masking" />
    <h2 class="heading--2">Bookcorn</h2>
    
</section>

    <!-- ============================Down button====================== -->
    <div class="down">
      <a href="#" class="down__link">
        <svg class="down__icon">
          <use xlink:href="{{ asset('images/sprite.svg#icon-chevron-thin-down') }} "></use>
        </svg>
        <svg class="down__icon">
          <use xlink:href="{{ asset('images/sprite.svg#icon-chevron-thin-down') }}"></use>
        </svg>
        <svg class="down__icon">
          <use xlink:href="{{ asset('images/sprite.svg#icon-chevron-thin-down') }}"></use>
        </svg>
      </a>
    </div>
    <!-- ============================End Down button====================== -->
  <!-- =======================topMovies Slider================================= -->
  <section class="section section-2" id="section-2">
    <div class="section__title section__title--testimonials">
      <h1 class="heading-1 slider__heading">
        Newest movies in <span class="span-1"> cinemas</span>
      </h1>
    </div>
    <div class="slider__container">
      <div class="images glide">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides glide__slides--topMovies">
           @foreach ($movies as $movie )
             
            <li class="glide__slide glide__slide--topMovies">
              <figure class="slide__fig">
                <img
                  src="{{asset('images/movies/' . $movie->image)}}"
                  class="slide__image"
                  alt=""
                />
                <figcaption class="slide__layer">
                  <h2 class="slide__heading">{{$movie->name}}</h2>

                  <p class="slide__paragraph">
                    {{$movie->description}}
                  </p>

                </figcaption>
              </figure>
            </li>

            @endforeach
          </ul>
        </div>

        <div class="glide__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
            <i class="fas fa-arrow-left"></i>
          </button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
            <i class="fas fa-arrow-right"></i>
          </button>
        </div>
      </div>
    </div>
  </section>
 <!--  end  -->



  <!-- ============================Card====================== -->
  <section class="section section-3" id="section3">

    <div class="u-center-text u-margin-bottom-big">
        <h2 class="heading-1 section-3__heading">
          MOST POPULAR <span class="span-1">cinemas</span>
        </h2>
    </div>

    <div class="row">
      @foreach ($cinemas as $cinema )
      <div class="col-1-of-3">
        <div class="card">
            <div class="card__side card__side--front" >
                <div class="card__picture">
                    <img src="{{ asset('images/cinemas/' .$cinema->image) }}" alt="{{$cinema->name}}" class=" card__picture--1">
                </div>
                <div class="card__heading">
                    <span class="card__heading-span card__heading-span--1">
                        Cinema {{$cinema->name}}
                    </span>
                </div>
                <div class="card__detials">
                    <ul>
                        <li> {{$cinema->movies->count()}} movies showing per day </li>
                        <li> Snacks available</li>
                        <li> 3D films</li>
                        <li>Up to 1000 person</li>
                    </ul>
                </div>
            </div>


            <div class="card__side card__side--back card__side--back-1">
                <div class="card__cta">
                    <div class="card__box">
                        <p class="card__only">only</p>
                        <p class="card__price">{{$cinema->times->first()->price ?? 100}} EGP</p>
                    </div>
                    <a href="#popup" class="btn btn--dark">Book Your Cinema now!</a>
                </div>
            </div>
        </div>
    </div>
      @endforeach
        
    </div>
    <div class="u-center-text u-margin-top-huge">
        <a href="{{route('cinema.index')}}" class="btn btn--dark">See Your Nearest Cinema!</a>
    </div>
</section>
<!-- ============================ END Card====================== -->


<!-- =======================catigories Slider================================= -->
<section class="section section-4 catigories" id="section4">
  <div class="catigories__headings catigories__headings--container">
    <a href="" class="catigories__link operations__tab--1 catigories__tab--active " data-tab="1">
      Action
    </a>
    <span class="catigories__span">/</span>
    <a href="" class="catigories__link operations__tab--2 " data-tab="2">
      Horror
    </a>
    <span class="catigories__span">/</span>
    <a href="" class="catigories__link operations__tab--3 " data-tab="3">
      Comedy
    </a>
   </div>
  <!-- <div> -->
  <div class="catigories__content catigories__content--1 catigories__content--active films">
    <div class="film">
      <img src="{{asset('images/movies/Batman__logo.jpg')}}" alt="BatMan" class="film__img">
      <div class="film__rating">
        <p class="film__rating--num">8.3</p> 
      </div>
      <div class="film__content">

        
        <h2 class="film__heading">The Batman</h2>
        <p class="film__paragraph">
          When the Riddler, a sadistic serial killer, begins murdering key political figures in Gotham, Batman is forced to investigate the city's hidden corruption and question his family's involvement.
        </p>

      </div>
    </div>
    
    <div class="film">
      <img src="{{asset('images/movies/theAdamProject.jpg')}}" alt="The Adam Project" class="film__img">
      <div class="film__rating">
        <p class="film__rating--num">6.7</p> 
      </div>
      <div class="film__content">

        
        <h2 class="film__heading">The Adam Project</h2>
        <p class="film__paragraph">
          After accidentally crash-landing in 2022, time-traveling fighter pilot Adam Reed teams up with his 12-year-old self for a mission to save the future.
        </p>

      </div>
    </div>
    <div class="film">
      <img src="{{asset('images/movies/Spiderman-logo.png')}}" alt="Spiderman" class="film__img">
      <div class="film__rating">
        <p class="film__rating--num">8.6</p> 
      </div>
      <div class="film__content">

        
        <h2 class="film__heading">Spider-Man: No Way Home</h2>
        <p class="film__paragraph">
          With Spider-Man's identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man.
        </p>

      </div>
    </div>
  </div>
  <div class="catigories__content catigories__content--2 films">
    <div class="film">
      <img src="{{asset('images/movies/x_xlg.jpg')}}" alt="X" class="film__img">
      <div class="film__rating">
        <p class="film__rating--num">7.4</p> 
      </div>
      <div class="film__content">

        
        <h2 class="film__heading">X</h2>
        <p class="film__paragraph">
          In 1979, a group of young filmmakers set out to make an adult film in rural Texas, but when their reclusive, elderly hosts catch them in the act, the cast find themselves fighting for their lives.
        </p>

      </div>
    </div>

    <div class="film">
      <img src="{{asset('images/movies/جزيرة الغمايم.jpg')}}" alt="Gezeryt Al Amaym" class="film__img">
      <div class="film__rating">
        <p class="film__rating--num">8.2</p> 
      </div>
      <div class="film__content">

        
        <h2 class="film__heading">Gezert El Ghmaym</h2>
        <p class="film__paragraph">
        يعيش سكان جزيرة غمام سلسلة من الأحداث التي تهز واقع حياتهم عندما تصل مجموعة غامضة من الأغراب إلى ديارهم.
        </p>
      </div>
    </div>

    <div class="film">
      <img src="{{asset('images/movies/Fresh.jpg')}}" alt="Fresh" class="film__img">
      <div class="film__rating">
        <p class="film__rating--num">6.7</p> 
      </div>
      <div class="film__content">

        
        <h2 class="film__heading">Fresh</h2>
        <p class="film__paragraph">
          The horrors of modern dating seen through one young woman's defiant battle to survive her new boyfriend's unusual appetites.
        </p>
      </div>
    </div>

  </div>
  
  <div class="catigories__content catigories__content--3  films">
    <div class="film">
      <img src="{{asset('images/movies/uncahrted.jpg')}}" alt="uncahrted" class="film__img">
      <div class="film__rating">
        <p class="film__rating--num">6.7</p> 
      </div>
      <div class="film__content">

        
        <h2 class="film__heading">The Adam Project</h2>
        <p class="film__paragraph">
          After accidentally crash-landing in 2022, time-traveling fighter pilot Adam Reed teams up with his 12-year-old self for a mission to save the future.
        </p>

      </div>
    </div>

    <div class="film">
      <img src="{{asset('images/movies/turning-red.jpg')}}" alt="Turning red" class="film__img">
      <div class="film__rating">
        <p class="film__rating--num">8.1</p> 
      </div>
      <div class="film__content">

        <h2 class="film__heading">Turning Red</h2>
        <p class="film__paragraph">
          A 13-year-old girl named Meilin turns into a giant red panda whenever she gets too excited.
        </p>

      </div>
    </div>

    <div class="film">
      <img src="{{asset('images/movies/theLostCity.jpg')}}" alt="theLostCity" class="film__img">
      <div class="film__rating">
        <p class="film__rating--num">8.2</p> 
      </div>
      <div class="film__content">

        
        <h2 class="film__heading">The Lost City</h2>
        <p class="film__paragraph">
          A reclusive romance novelist on a book tour with her cover model gets swept up in a kidnapping attempt that lands them both in a cutthroat jungle adventure.
        </p>

      </div>
    </div>

  </div>
<!-- </div> -->
</section>

<!-- =======================End catigories Slider================================= -->


@endsection


@section('scripts')
<script src="{{asset('js/glide.min.js')}}"></script>
  <script src="{{asset('js/index.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
@endsection