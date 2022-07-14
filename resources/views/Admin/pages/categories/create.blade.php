@extends('layouts.admin')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light">{{__('Create new category')}}</h3></div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="{{route('auth.admin.categories.store')}}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputName" name="name" required="required"
                                           type="text" placeholder="name@example.com"/>
                                    <label for="inputName">{{__('Name of Category')}}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="inputImage" class="form-label">{{__('Upload title image of you post')}}</label>
                                    <input id="inputImage" type="file" name="image">
                                </div>
                                @error('formError')
                                <div class="mt-4 mb-0">
                                    <div class="d-grid btn-danger">{{$message}}</div>
                                </div>
                                @enderror
                                <div class="d-flex justify-content-center mt-4 mb-0">
                                    <button class="btn btn-primary btn-lg" type="submit">{{__('Create')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
