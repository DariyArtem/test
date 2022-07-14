@extends('layouts.admin')

@section('content')
    <div class="card mb-4">

        @error('formMessage')
        <div class="mt-4 mb-0">
            <div class="d-grid btn-danger">{{$message}}</div>
        </div>
        @enderror
        @if(session('success'))
            <div class="mt-4 mb-0">
                <div class="d-grid btn-success big h5">{{session('success')}}</div>
            </div>
        @endif

        <div class="card-body">
            <div class="mb-3 col-2">
                <a href="{{route('auth.admin.categories.create')}}" class="btn btn-primary">{{__('Create New')}}</a>
            </div>
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>{{__('Name of Category')}}</th>
                    <th>{{__('Image')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $element)
                    <tr>
                        <td>{{$element->id}}</td>
                        <td>{{$element->name}}</td>
                        <td>
                            <div class="slider-card">
                                <div class="slider-img">
                                    <img src="{{asset("storage/".$element->img_path)}}" alt="Category">
                                </div>
                            </div>
                        <td>
                            <form method="GET" action="{{route('auth.admin.categories.edit', $element->id)}}">
                                @csrf
                                <button class="btn btn-primary">{{__("Edit")}}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
