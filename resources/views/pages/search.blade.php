@extends('layouts.base2')

@section('page.title')
    Search Results
@endsection

@section('content')
    <div class="category-content">
        <div class="container">
            <div class="search">
                <div class="search-search">Search Result:</div>
                <div class="search-result">{{$query}}</div>
            </div>
            <div class="row">
                <div class="col-md-8 ">
                    <div class="row">
                        @foreach($posts as $key => $post)
                            <div class="col-lg-6 col-md-10 ">
                                <div class="random">
                                    <div class="random__post">
                                        <div class="random__card">
                                            <a href="{{route('single', ["id" => $post->id])}}">
                                                <img src="{{asset("storage/".$post->img_path)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="random__text">
                                            <div class="random__title">{{$post->title}}</div>
                                            <div class="random__data">
                                                <div class="random__date">
                                                    <i class="far fa-clock icon-clock-search"></i>
                                                    {{$datesOfPosts[$key]}}
                                                </div>
                                                <div class="random__category-name">
                                                    <a href="{{route('category', ['id' => $post->category_id])}}">
                                                        <i class="far fa-folder icon-folder-search"></i>
                                                        {{$post->category->name}}
                                                    </a>
                                                </div>
                                                <div class="random__author">
                                                    <a href="{{route('author', ['author' => $post->author])}}">
                                                        <i class="far fa-user icon-user-search"></i>
                                                        {{$post->author}}
                                                    </a>
                                                </div>
                                                <div class="random__comments-amount">
                                                    <i class="far fa-comment icon-comment-search"></i>
                                                    {{$post->comments->count()}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="popular">
                        <div class="popular__title">{{__("Popular Posts")}}</div>
                        @foreach($popular as $key => $post)
                            <div class="popular__post">
                                <div class="post__card">
                                    <a href="{{route('single', ['id' => $post->id])}}">
                                        <img src="{{asset('storage/'.$post->img_path)}}" alt="">
                                    </a>
                                </div>
                                <div class="post__text">
                                    <div class="text__title">{{$post->title}}</div>
                                    <div class="text__author">
                                        <div class="text__post-word">Post</div>
                                        <div class="text__by-word">By</div>
                                        <a href="{{route('author', ['author' => $post->author])}}">
                                            <div class="text__name">{{$post->author}}</div>
                                        </a>
                                    </div>
                                    <div class="text__info">
                                        <div class="text__date">{{$datesOfPopularPosts[$key]}}</div>
                                        <span class="text__hr"></span>
                                        <div class="text__comments">{{$post->comments->count()}} comments</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{$posts->appends($_GET)->links()}}
            </div>
        </div>
    </div>

@endsection
