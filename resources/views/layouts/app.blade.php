<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{!! asset('images/favicon.ico') !!}"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- In your Blade template or HTML file -->


    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{!! asset('images/android-chrome-512x512.png') !!}" height="30px">{{ config('app.name', 'Laravel') }}
                </a>

                   <a class="navbar-brand" href="{{ url('/home') }}">
                            <button type="button" class="btn btn-outline" data-mdb-ripple-color="dark"> 
                             <span class="material-icons">
                                home
                                </span>
                            </button>
                     </a>
                    <ul class="navbar-nav me-auto">

                    </ul>
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                     <button type="button" class="btn btn-primary"><strong>{{ __('Login') }}</strong> 
                                        
                                    </button>
                                 </a> 
                           </li>  
                            @endif

                            @if (Route::has('register'))
                               <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                     <button type="button" class="btn btn-primary"><strong>{{ __('Register') }}</strong> 
                                        
                                    </button>
                                 </a> 
                           </li>
                            @endif
                        @else
                              

                            <div class="d-flex align-items-center">
                            <span class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                
                                <div class="rounded-circle overflow-hidden float-start" style="width: 40px; height: 40px; border: 2px solid #fff;">
                                    <img src="{!! asset('images/amos.png') !!}" alt="Avatar" style="width: 100%; height: 100%;">
                                </div>
                           
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="#">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        {{ __('Settings') }}
                                    </a>
                                </div>

                            </span>
                             </div>
                        @endguest
            </div>
        </nav>

        <main class="py-5">
            @yield('content')
            @include('inc.footer')
        </main>
    </div>

</body>

</html>
