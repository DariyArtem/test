@extends('layouts.admin')

@section('content')

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
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
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $element)
                    <tr>
                        <td>{{$element->title}}</td>
                        <td>{{$element->author}}</td>
                        <td>{{$element->price}}$</td>
                        <td>{{$element->description}}</td>
                        <td>
                            <form action="{{route('posts.edit', ['id' => $element->id])}}">
                                <button class="btn btn-primary">{{__("Edit")}}</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{route('posts.delete', ['id' => $element->id])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">{{__("Delete")}}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
