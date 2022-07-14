@extends('layouts.auth')

@section('content')
    @error('status')
    <div class="aletr alert-danger">{{$message}}</div>
    @enderror
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            @if(session('success'))
                                <div class="mt-4 mb-0">
                                    <div class="d-grid btn-success big h5">{{session('success')}}</div>
                                </div>
                            @endif
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form method="post" action="{{route('login.login')}}">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="email" required="required" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">{{__('Email address')}}</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="password" required="required" type="password" placeholder="Password" />
                                            <label for="inputPassword">{{__('Password')}}</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" name="rememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">{{__('Remember Password')}}</label>
                                        </div>
                                        @error('formMessage')
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid btn-danger">{{$message}}</div>
                                        </div>
                                        @enderror
                                        <div class="d-flex justify-content-center mt-4 mb-0">
                                            <button class="btn btn-warning" type="submit">{{__('Login')}}</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="{{route('register')}}">{{__('Need an account? Sign up!')}}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">{{__('Privacy Policy')}}</a>
                            &middot;
                            <a href="#">{{__('Terms &amp; Conditions')}}</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

@endsection
