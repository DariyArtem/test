@extends('layouts.base')

@section('page.title')
    Contact Me
@endsection

@section('backgroundImage')
    <img src="{{asset('img/contactMePage/background.png')}}" alt="">
@endsection

@section('content')
    <div class="form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @if(session('success'))
                        <div class="mt-4 mb-3">
                            <div class="d-grid btn-success big h5 text-center">{{session('success')}}</div>
                        </div>
                    @endif
                    <form method="post" enctype="multipart/form-data" action="{{route('message')}}">
                        @csrf
                        @if(Auth::check())
                            <div class="form-input">
                                <textarea required="required" id="inputMessage"
                                          class="form-message" type="text" name="message"
                                          placeholder="Your message here"></textarea>
                            </div>
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
                        @endif
                        @error('formMessage')
                        <div class="mt-4 mb-0">
                            <div class="d-grid btn-danger">{{$message}}</div>
                        </div>
                        @enderror
                        <button type="button" id="submit" class="form-submitButton">SEND MESSAGE</button>
                    </form>

                </div>
                <div class="col">
                    <div class="form-textRight">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed et donec purus viverra. Sit
                        justo velit,
                        eu sed sollicitudin tempus, risus. Sed sit elit mauris adipiscing. Lobortis pellentesque nulla
                        accumsan
                        id urna, ullamcorper gravida varius. Massa mauris, cursus orci magna non enim fames et sed.
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('js/AjaxMessage.js')}}"></script>
@endsection
