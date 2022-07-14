@extends('layouts.base2')

@section('page.title')
    Gallivant
@endsection

@section('backgroundImage')
    <img src="{{asset('img/header/background.png')}}" alt="">
@endsection

@section('content')
    <section class="content">
        <div class="container">
            <div class="position-relative">
                <h6 class="content-title">
                    Choose A Category
                </h6>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($categories as $category)
                            <div class="swiper-slide">
                                <a href="#">
                                    <div class="slider-card">
                                        <div class="slider-img">
                                            <a href="{{route('category', ['id' => $category->id])}}">
                                                <img src="{{asset('storage/'.$category->img_path)}}"
                                                     alt="Category">
                                            </a>
                                        </div>
                                        <div class="centered">{{__($category->name)}}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
                        <path
                            d="M31.7777 23.5834L0.333356 23.5834L0.333357 18.4167L31.7777 18.4167L17.9207 4.55971L21.5735 0.906874L41.6667 21L21.5735 41.0932L17.9207 37.4404L31.7777 23.5834Z"
                            fill="#141414"/>
                    </svg>
                </div>
                <div class="swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62" fill="none">
                        <path
                            d="M20.2223 28.4166H51.6667V33.5833H20.2223L34.0793 47.4403L30.4265 51.0931L10.3333 31L30.4265 10.9068L34.0793 14.5596L20.2223 28.4166Z"
                            fill="#141414"/>
                    </svg>
                </div>
            </div>
            <div class="explores">
                <h6 class="content-title">
                    Top 15 Popular
                </h6>
                <div class="row">
                    @foreach($featuredPosts as $post)
                        <div class="col-xl-4 col-md-6 ">
                            <div class="explores-content">
                                <div class="explores-card">
                                    <a href="{{route('single',['id' => $post->id])}}">
                                        <img class="blog-image" src="{{asset('storage/'.$post->img_path)}}" alt="">
                                    </a>
                                </div>
                                <div class="explores-text">
                                    <h6 class="explores-title">{{__($post->title)}}</h6>
                                    <div class="explores-text-footer">
                                        <a href="{{route('category', ['id' => $post->category_id])}}">
                                            <div class="explores-category">
                                                {{$post->category->name}}
                                            </div>
                                        </a>
                                        <div class="explores-by" style="margin: 0 5px 0 5px">By</div>
                                        <div class="explores-author">
                                            {{$post->author}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

