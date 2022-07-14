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
                    <th>ID</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Message')}}</th>
                    <th>{{__('Departure Date')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $element)
                    <tr>
                        <td>{{$element->id}}</td>
                        <td>{{$element->name}}</td>
                        <td>{{$element->email}}</td>
                        <td>{{$element->message}}</td>
                        <td>{{$element->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
