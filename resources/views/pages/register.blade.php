@extends('layouts.auth')
@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">{{__('Create Account')}}</h3></div>
                                <div class="card-body">
                                    <form method="post" action="{{route('register.store')}}">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" name="name" type="text" required="required" placeholder="Enter your first name" />
                                                    <label for="inputFirstName">{{__('First name')}}</label>
                                                </div>
                                                @error('name')
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid btn-danger">{{$message}}</div>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" name="surname" required="required" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">{{__('Surname')}}</label>
                                                </div>
                                                @error('surname')
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid btn-danger">{{$message}}</div>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" name="email" required="required" placeholder="name@example.com" />
                                            <label for="inputEmail">{{__('Email address')}}</label>
                                            @error('email')
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid btn-danger">{{$message}}</div>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputNumber" type="number" name="phone" required="required" placeholder="+380934567890" />
                                            <label for="inputNumber">{{__('Phone Number')}}</label>
                                            @error('phone')
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid btn-danger">{{$message}}</div>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" name="password" required="required" type="password" placeholder="Create a password" />
                                                    <label for="inputPassword">{{__('Password')}}</label>
                                                </div>
                                                @error('password')
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid btn-danger">{{$message}}</div>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" required="required" type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">{{__('Confirm Password')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputCountry" required="required" name="country" type="text" placeholder="Enter country" />
                                                    <label for="inputCountry">{{__('Country')}}</label>
                                                </div>
                                                @error('country')
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid btn-danger">{{$message}}</div>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputRegion" required="required" name="region" type="text" placeholder="Enter region" />
                                                    <label for="inputRegion">{{__('Region')}}</label>
                                                </div>
                                                @error('region')
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid btn-danger">{{$message}}</div>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputCity" required="required" name="city" type="text" placeholder="Enter city" />
                                                    <label for="inputCity">{{__('City')}}</label>
                                                </div>
                                                @error('city')
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid btn-danger">{{$message}}</div>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">{{__('Create Account')}}</button></div>
                                        </div>
                                        @error('formError')
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid btn-danger">{{$message}}</div>
                                        </div>
                                        @enderror
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="{{route('login')}}">{{__('Have an account? Go to login')}}</a></div>
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
                        <div class="text-muted">{{__('Copyright')}} &copy; {{config('app.name')}}</div>
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
