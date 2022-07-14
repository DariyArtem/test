@extends('layouts.admin')

@section('content')
    <div class="card mb-4">
        <div class="col-8 mb-3 mt-3">
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
                @foreach($user as $element)
                <div class="blog-sidebar sidebar-profile">
                    <div class="sidebar-profileInfo">
                        <div class="sidebar-name">
                            {{$element->name}}
                            {{$element->surname}}
                        </div>
                        <div class="sidebar-name">
                            {{$element->email}}
                        </div>
                        @endforeach
                        <div class="sidebar-name">
                            <form action="{{route('auth.admin.update', [$element->id])}}" method="post">
                                @csrf
                                @method('put')
                                <label for="role">{{__('Set Role')}}</label>
                                <select class="form-select" id="role" name="role">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                <label for="status">{{__('Set Status')}}</label>
                                <select class="form-select" id="status" name="status">
                                    <option>Active</option>
                                    <option>Banned</option>
                                </select>
                                <div class="d-flex mt-4 mb-0">
                                    <button class="btn btn-primary btn-lg" type="submit">{{__('Update')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
