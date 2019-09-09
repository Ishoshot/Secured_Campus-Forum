<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta property="og:url"           content="" />
  <meta property="og:type"          content="A School Forum" />
  <meta property="og:title"         content="Moshood Abiola Polytechnic" />
  <meta property="og:description"   content="This platform is developed by TobbyWeb" />
  <meta property="og:image"         content=""/>

  <meta name="theme-color" content="#bbb000">
  <meta name="keywords" 
  content="Mapoly, Moshood Abiola Polytechnic, School Forum, MAPOLY">

  <meta name="description" 
  content="This is a Campus forum of Moshood Abiola Polytechnic having an awesome platform to interact with and lets you tell people your thoughts and reality. Developed by Ishola Oluwatobi, department of Computer Science; using Laravel Framework.">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/captcha.js') }}" defer></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top p-3 shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'MAPOLY') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/home">
                                Forum
                            </a>
                        </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                About Us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Contact  Us
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest 
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                             <li class="nav-item">
                                <a class="nav-link" href="/posts/create">
                                    <i class="fa fa-edit"></i> Create Post
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="/profile/{{ auth()->user()->id }}">
                                   <i class="fa fa-user"></i> Profile
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="mt-5 pt-4">
            
            @if (session('status'))
                <div id="flash-message" class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')


        <!-- Footer -->
        <footer id="footer">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html" class="logo">
                                    <img src="/img/nacoss.png" alt="" style="width:100px; height:100px;">
                                </a>
                            </div>
                            <ul class="footer-nav">
                                <li>Communicating to the heart of the Students</li>
                            </ul> 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Quick Links</h3>
                                    <ul class="footer-links">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="/posts/create">Create Post</a></li>
                                        @guest
                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        @endif
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        @endguest
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Catagories</h3>
                                    <ul class="footer-links">
                                        <li>
                                            <a href="/posts/categories/4" class="cat-1">
                                            Business
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/posts/categories/6" class="cat-1">
                                            Economic
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/posts/categories/1" class="cat-1">
                                            Education
                                            </a>
                                        </li>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Catagories</h3>
                                    <ul class="footer-links">
                                        <li>
                                            <a href="/posts/categories/2" class="cat-1">
                                            Politics
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/posts/categories/5" class="cat-1">
                                            Social
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/posts/categories/3" class="cat-1">
                                            Technology
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/posts/categories/7" class="cat-1">
                                            Others
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="footer-title">Join our Newsletter</h3>
                            <div class="footer-newsletter">
                                <form method="POST" action="">
                                    <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                                    <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                            <ul class="footer-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- /row -->
                
                <div class="footer-copyright text-center">
                    <span>
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered by MAPOLY | Developed by: <a href="http://www.tobbyweb.tk" class="text-white">TobbyWeb
                        </a>
                    </span>
                </div>

            </div>
            <!-- /container -->
        </footer>
        <!-- /Footer -->
        
        </main>
    </div>
</body>
</html>
