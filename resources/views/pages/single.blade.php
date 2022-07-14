@extends('layouts.base2')

@section('page.title')
    Post
@endsection

@section('content')
    <div class="container">
        <div class="single-top">
            <div class="row">
                <div class="col-md-8">
                    @foreach($currentPost as $key => $element)
                        <div class="post-img">
                            <img src="{{asset('storage/'.$element->img_path)}}" alt="">
                        </div>
                        <h6 class="single-title">{{$element->title}}</h6>
                        <div class="single-info">
                            <div class="single-data">
                                <div class="single-category">
                                    <i class="far fa-folder icon-folder" aria-hidden="true"></i>
                                        <a class="category-reference"
                                           href="{{route('category', ['id' => $element->category])}}">{{$element->category->name}}
                                        </a>
                                </div>
                                <div class="single-by">
                                    <i class="far fa-user icon-user" aria-hidden="true"></i>
                                    <a class="single-reference"
                                       href="{{route('author', ['author' => $element['author']])}}">{{$element->author}}
                                    </a>
                                </div>
                                <div class="single-quantity">
                                    <i class="far fa-comment icon-comment"
                                       aria-hidden="true"></i>{{$element->comments->count()}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if(Auth::check())
                            @if($isFav === null)
                                <form method="post" action="{{route('posts.addToFav')}}">
                                    @csrf
                                    <input type="hidden" id="post_id" name="post_id" value="{{$element->id}}">
                                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::id()}}">
                                    <button type="button" id="addToFav" class="favourite-add">ADD TO FAVOURITE</button>
                                </form>
                            @else
                                <form method="post" action="{{route('posts.removeFromFav')}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" id="post_id" name="post_id" value="{{$element->id}}">
                                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::id()}}">
                                    <button type="button" id="removeFromFav" class="favourite-remove">REMOVE FROM FAVOURITE</button>
                                </form>
                            @endif
                        @endif
                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        @if(Auth::check())
                            <h6 class="sidebar-title">
                                You might like these
                            </h6>
                        @else
                            <h6 class="sidebar-title">
                                Popular
                            </h6>
                        @endif
                        @foreach($popular as $key => $book)
                            <div class="sidebar-post">
                                <div class="sidebar-card">
                                    <a href="{{route('single',[$book->id])}}">
                                        <img class="sidebar-img" src="{{asset('storage/'.$book->img_path)}}" alt="">
                                    </a>
                                </div>
                                <div class="post-text">
                                    <div class="post-title">{{$book->title}}</div>
                                    <div class="post-author">
                                        <div class="post-post">Post</div>
                                        <div class="post-by">By</div>
                                        <div class="post-sign">{{$book->author}}
                                        </div>
                                    </div>
                                    <div class="post-data">
                                        <div class="post-hr"></div>
                                        <div class="post-comments">
                                            <a class="post-comment" href="#">
                                                {{$book->comments->count()}} comments</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @foreach($currentPost as  $element)
                <div class="single-content">
                    <div class="single-notification">
                        <span class="notification-span"></span>
                        <div class="notification-text">
                            {{$element->description}}
                        </div>
                    </div>
                    <div class="single-price">
                        Price: {{$element->price}}$
                    </div>
                    <div class="form">
                        <button type="button" id="submit" class="form-submitButton">
                            ADD TO CART
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="form">
            <div class="row">
                <div class="col-lg-8 ">
                    <div class="col-12">
                        <h6 class="form-title">Leave a Comment</h6>
                    </div>
                    @foreach($currentPost as $book)

                        <form method="post" enctype="multipart/form-data" action="{{route('comment')}}">
                            @csrf
                            @if(Auth::check())
                                <div class="form-input">
                                    <textarea required="required"
                                              id="inputMessage" class="form-message"
                                              type="text" name="message"
                                              placeholder="Your message here"></textarea>
                                </div>
                                <input type="hidden" id="post_id" name="post_id" value="{{$book->id}}">
                                <input type="hidden" id="user_id" name="user_id" value="{{Auth::id()}}">
                            @else
                                <div class="form-input">
                                    <input id="inputName" class="form-name" type="text" name="name"
                                           placeholder="Full Name">
                                </div>
                                <div class="form-input">
                                    <input id="inputEmail" class="form-email" type="text" name="email"
                                               placeholder="E-mail">
                                </div>
                                <div class="form-input">
                                    <input id="inputNumber" class="form-number" type="text"
                                           name="number"
                                           placeholder="Number">
                                </div>
                                <div class="form-input">
                                    <textarea id="inputMessage" class="form-message" type="text"
                                              name="message"
                                              placeholder="Your message"></textarea>
                                </div>
                                <input type="hidden" id="post_id" value="{{($book->id)}}">
                            @endif
                            <button type="button" id="submitComment" class="form-submitButton">SEND MESSAGE</button>
                        </form>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="single-comments">
            @foreach($currentPost as $post)
            <h6 class="comments-title">Comments ({{$post->comments->count()}})</h6>
                @foreach($post->comments as $comment)
                    <div class="comments-comment">
                        <div class="comment-photo">
                            <img src="{{asset('img/avatars/default.png')}}" alt="">
                        </div>
                        <div class="comment-text">
                            <div class="comment-name">{{$comment->name}}</div>
                            <div class="comment-comment">{{$comment->message}}</div>
                            <div class="single-time">
                                <i class="far fa-clock icon-clock" aria-hidden="true"></i>{{$comment->created_at}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <script src="{{asset('js/AjaxComment.js')}}"></script>
    <script src="{{asset('js/RemoveFromFav.js')}}"></script>
    <script src="{{asset('js/AddToFav.js')}}"></script>

@endsection
