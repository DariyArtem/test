@extends('pages.private')

@section('content')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light">{{__('Create new post')}}</h3></div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="{{route('posts.store')}}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputTitle" name="title" required="required"
                                           type="text" placeholder="name@example.com"/>
                                    <label for="inputTitle">{{__('Title of your post')}}</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPrice" name="price" required="required"
                                           type="number" placeholder="Price"/>
                                    <label for="inputPrice">{{__('Input price')}}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="inputDescription"  class="form-label">{{__('Input short description of book')}}</label>
                                    <textarea class="form-control" name="description" id="inputDescription" rows="12" required="required"></textarea>
                                </div>
                                <div class="mb-3">
                                        <label for="inputImage" class="form-label">{{__('Upload title image of book')}}</label>
                                        <input id="inputImage" type="file" name="image">
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputAuthor" name="author" required="required"
                                           type="text" placeholder="Password"/>
                                    <label for="inputDescription">{{__('Input Author`s Name and Surname')}}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">{{__('Choose categories')}}</label>
                                    <select class="form-select" id="status" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                @error('formMessage')
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
