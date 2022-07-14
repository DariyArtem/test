@extends('layouts.base')

@section('page.title')
    Categories
@endsection

@section('title')
    <div class="header-title">{{$category->name}}</div>
@endsection

@section('backgroundImage')
    <img src="{{asset('storage/'.$category->img_path)}}" alt="">
@endsection

@section('content')
    <div class="category-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="row">
                        @foreach($books as $key => $book)
                            <div class="col-lg-6 col-md-10 ">
                                <div class="random">
                                    <div class="random__post">
                                        <div class="random__card">
                                            <a href="{{route('single', ["id" => $book->id])}}">
                                                <img src="{{asset("storage/".$book->img_path)}}" alt=""></a>
                                        </div>
                                        <div class="random__text">
                                            <div class="random__title">{{$book->title}}</div>
                                            <div class="random__data">
                                                <div class="random__category-name">
                                                    <a href="{{route('category', ['id' => $book->category_id])}}">
                                                        <i class="far fa-folder icon-folder-search"></i>
                                                        {{$book->category->name}}</a>
                                                </div>
                                                <div class="random__author">
                                                    <a href="{{route('author', ['author' => $book->author])}}">
                                                        <i class="far fa-user icon-user-search"></i>{{$book->author}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $books->links() }}
                </div>
                <div class="col-md-4">
                    <div class="categories">
                        <h5 class="categories__title">{{__("Categories")}}</h5>
                        <div class="categories__list">
                            @foreach($categories as $category)
                                <div class="category-item">
                                    <div class="category-item__name">
                                        <a href="{{route('category', ['id' => $category->id])}}">{{$category->name}}</a>
                                    </div>
                                    <div class="category-item__posts">({{$category->posts->count()}})</div>
                                </div>
                                <div class="category__hr"></div>
                            @endforeach
                        </div>
                    </div>
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
            </div>
        </div>
    </div>

@endsection
