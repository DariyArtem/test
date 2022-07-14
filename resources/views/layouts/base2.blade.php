<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <meta name="csrf_token" id="csrf" content="{{ csrf_token() }}" />
    <title>@yield('page.title', config('app.name'))</title>
    <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/4d1ce4c9a9.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
</head>
<body>
@error('role')
<section class="alert alert-danger mb-0 text-center">
    {{$message}}
</section>
@enderror
<header class="header-template2">
    <div class="container">
        <div class="header-row">
            <div class="header-logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('img/errorPage/logo.png')}}" alt="">
                </a>
            </div>
            <div class="header-search">
                <form class="search-form" action="{{route('search')}}">
                    @csrf
                    <button class="search-loupe">
                        <img src="{{asset('img/header/lupa.png')}}" alt="loupe">
                    </button>
                    <input class="search-input-second" type="text" name="title" placeholder="Search your option">
                </form>
            </div>
            <div class="header-burger">
                <div class="burger-top errorPage-burger"></div>
                <div class="burger-center errorPage-burger"></div>
                <div class="burger-bottom errorPage-burger"></div>
            </div>
        </div>
        <div class="header-hr">
            <hr class="header--hr">
        </div>
        <menu class="header-menu error-page">
            <ul class="header-references">
                <li><a href="{{route('home')}}">Home</a></li>
                @auth()
                    @if(Auth::user()->role->name === "User")
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    @else
                        <li><a href="{{route('private')}}">Admin Panel</a></li>@endif
                @else
                    <li><a href="{{route('login')}}">Account</a></li>
                @endauth
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </menu>
    </div>
</header>
<aside class="header-sidebar">
    <div class="sidebar-top">
        <div class="header-logo"><img src="{{asset('public/img/header/logo.png')}}" alt=""></div>
        <div class="header-closeSidebar">
            <span class="close-left"></span>
            <span class="close-right"></span>
        </div>

    </div>
    <div class="sidebar-search">
        <form class="search-form" action="{{route('search')}}">
            @csrf
            <button class="search-loupe">
                <img src="{{asset('img/header/lupa.png')}}" alt="loupe">
            </button>
            <input class="search-input" type="text" name="title" placeholder="Search your option">
        </form>
    </div>
    <div class="header-menu">
        <ul class="sidebar-references">
            <li><a href="{{route('home')}}">Home</a></li>
            @auth()
                @if(Auth::user()->role->name === "User")
                    <li><a href="{{route('logout')}}">Logout</a></li>
                @else
                    <li><a href="{{route('private')}}">Admin Panel</a></li>@endif
            @else
                <li><a href="{{route('login')}}">Account</a></li>
            @endauth
            <li><a href="{{route('contact')}}">Contact</a></li>
        </ul>
    </div>
</aside>

@yield('content')

<footer class="footer-errorPage">
    <div class="footer-items">
        <div class="footer-copyright">
            <i class="far fa-copyright"></i>
            2022 Bachelor Project by Dariy Artem student of CHNU Petra Mohyly
        </div>
    </div>
</footer>
<script src="{{asset('js/main.js')}}"></script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script src="{{asset('js/swiper.js')}}"></script>
</body>
</html>
