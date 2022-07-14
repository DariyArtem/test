@extends('layouts.admin')

@section('content')
    <div class="card mb-4">
        <div class="col-5 mb-3 mt-3">
            @if(session('success'))
                <div class="mt-4 mb-0">
                    <div class="d-grid btn-success big h5">{{session('success')}}</div>
                </div>
            @endif
            @error('fromMessage')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
            <div class="about-sidebar">
                    <div class="blog-sidebar sidebar-profile">
                        <div class="sidebar-profileInfo">
                            <form action="{{route('auth.admin.categories.update', [$category->id])}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputName" name="name" type="text"
                                               required="required" value="{{$category->name}}"
                                               placeholder="Enter your first name"/>
                                        <label for="inputName">{{__('Category name')}}</label>
                                    </div>
                                    @error('name')
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid btn-danger">{{$message}}</div>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="sidebar-name">{{__('Current Image')}}</div>
                                    <img class="category_image-update" src="{{asset("storage/".$category->img_path)}}" alt="">
                                </div>
                                <div class="mb-3">
                                    <label for="inputImage" class="form-label">{{__('Upload category picture')}}</label>
                                    <input id="inputImage" type="file" name="image">
                                </div>
                                <div class="d-flex mt-4 mb-0">
                                    <button class="btn btn-primary btn-lg" type="submit">{{__('Update')}}</button>
                                </div>
                            </form>
                        </div>

                    </div>
            </div>
        </div>
@endsection
