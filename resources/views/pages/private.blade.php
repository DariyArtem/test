@extends('layouts.admin')

@section('content')
    <main>
        @error('role')
        <div class="alert alert-danger mb-0 text-center">
            {{$message}}
        </div>
        @enderror
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{__('Admin Panel')}}</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <h1>You are in Admin section</h1>
                    <h2>Here you can create/read/update/delete your posts if you are an Author/Admin</h2>
                    <h2>If you are an Administrator you can also control user`s activity</h2>
                </div>
            </div>
        </div>
    </main>


@endsection
