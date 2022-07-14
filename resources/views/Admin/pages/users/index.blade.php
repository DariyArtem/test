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
                    <th>{{__('Surname')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Status')}}</th>
                    <th>{{__('Role')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $element)
                    <tr>
                        <td>{{$element->id}}</td>
                        <td>{{$element->name}}</td>
                        <td>{{$element->surname}}</td>
                        <td>{{$element->email}}</td>
                        <td>
                            @if($element->status === 1){{"Active"}}@else{{"Banned"}}@endif
                        </td>
                        <td>{{\App\Models\User::checkRole($element->role_id)}}</td>
                        <td>
                            <form action="{{route('auth.admin.edit', ['id' => $element->id])}}">
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
