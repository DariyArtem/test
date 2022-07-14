<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/4d1ce4c9a9.js" crossorigin="anonymous"></script>

</head>
<body>
@error('role')
<section class="alert alert-danger mb-0 text-center">
    {{$message}}
</section>
@enderror
<header>
    <div class="container">
        <div class="row header-row">
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
                    <input class="search-input" type="text" name="title" placeholder="Search your option">
                </form>
            </div>
            <div class="header-burger">
                <div class="burger-top errorPage-burger"></div>
                <div class="burger-center errorPage-burger"></div>
                <div class="burger-bottom errorPage-burger"></div>
            </div>
            <div class="header-icons">
                <a href="#">
                    <div class="header-icon">
                        <i class="fab fa-facebook-f icon"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="header-icon">
                        <i class="fab fa-twitter icon"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="header-icon">
                        <i class="fab fa-instagram icon"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="header-icon">
                        <i class="fab fa-youtube icon"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="header-hr">
            <hr class="header--hr">
        </div>
        <menu class="header-menu error-page">
            <ul class="header-references">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('about')}}">About Me</a></li>
                <li><a href="{{route('categories')}}">Categories</a></li>
                {{--                <li><a href="#">Blog</a></li>--}}
                <li><a href="{{route('contact')}}">Contact Me</a></li>
            </ul>
        </menu>
    </div>
</header>
<aside class="header-sidebar">
    <div class="sidebar-top">
        <div class="header-logo"><img src="http://gallivant/img/header/logo.png" alt=""></div>
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
            <li><a href="{{route('about')}}">About Me</a></li>
            <li><a href="{{route('categories')}}">Categories</a></li>
            <li><a href="{{route('contact')}}">Contact Me</a></li>
        </ul>
    </div>
    <div class="sidebar-icons-mobile">
        <a href="#">
            <div class="header-icon">
                <i class="fab fa-facebook-f icon" aria-hidden="true"></i>
            </div>
        </a>
        <a href="#">
            <div class="header-icon">
                <i class="fab fa-twitter icon" aria-hidden="true"></i>
            </div>
        </a>
        <a href="#">
            <div class="header-icon">
                <i class="fab fa-instagram icon" aria-hidden="true"></i>
            </div>
        </a>
        <a href="#">
            <div class="header-icon">
                <i class="fab fa-youtube icon" aria-hidden="true"></i>
            </div>
        </a>
    </div>
</aside>


@yield('content')

<footer class="footer-errorPage">
    <div class="footer-items">
        <div class="footer-copyright">
            <i class="far fa-copyright"></i>
            2020 ojjomedia All Right Reserved
        </div>
        <div class="footer-menu">
            <ul class="footer-references">
                <li><a href="#">Contact</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
        <div class="footer-icons">
            <a href="#">
                <div class="footer-icon">
                    <i class="fab fa-facebook-f icon"></i>
                </div>
            </a>
            <a href="#">
                <div class="footer-icon">
                    <i class="fab fa-twitter icon"></i>
                </div>
            </a>
            <a href="#">
                <div class="footer-icon">
                    <i class="fab fa-instagram icon"></i>
                </div>
            </a>
            <a href="#">
                <div class="footer-icon">
                    <i class="fab fa-youtube icon"></i>
                </div>
            </a>
        </div>
    </div>
</footer>
<script src="{{asset('js/swiper.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
