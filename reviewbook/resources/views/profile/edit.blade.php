@extends('layouts.master')

@section('title')
    Edit Profile
@endsection

@section('content')

@if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="/" class="btn btn-sm btn-success mb-3">Kembali</a>

    <form action="/profile/{{ $profile->id }}" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $profile->user->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $profile->age }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="address">Address</label>
            <textarea class="form-control" name="address" id="address" rows="3">{{$profile->address}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
