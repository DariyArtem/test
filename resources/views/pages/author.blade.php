@extends('layouts.base2')

@section('page.title')
    Author
@endsection

@section('content')

    <div class="category-content">
        <div class="container">
            <div class="search">
                <div class="search-search">Author:</div>
                <div class="search-result">{{$author}}</div>
            </div>
            <div class="row">
                <div class="col-md-8 ">
                    <div class="row">
                        @foreach($popular as $key => $post)
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
                                                <div class="random__category-name">
                                                    <a href="{{route('category', ['id' => $post->category_id])}}">
                                                        <i class="far fa-folder icon-folder-search"></i>
                                                        {{$post->category->name}}
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
                </div>
            </div>
        </div>
    </div>

@endsection
