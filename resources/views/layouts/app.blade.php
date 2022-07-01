<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <title> @yield('title')</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/Artboard13.png')}}" />

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap"
      rel="stylesheet"
    />


    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    
    <link rel="stylesheet" href="{{asset('css/glide.core.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/glide.theme.min.css')}}" />
     

    @yield('links')
</head>
<body>
    <div id="app">
        @include('includes.navigation')
        @include('includes.loader')

        <main>
            @yield('content')
        </main>
    </div>

    @include('includes.footer')
    @yield('scripts')
</body>
</html>
