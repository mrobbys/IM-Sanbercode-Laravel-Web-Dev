@extends('layouts.master')

@section('headTitle', 'Profile')

@section('content')

    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                {{-- Pemanggilan Section Title --}}
                @include('partials.sectionTitle', ['sectionTitle' => 'Edit Profile'])

                <form action="/profile/{{ $profile->id }}" method="POST">
                    @method('PUT')
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
                    @auth
                        @if (auth()->user()->role == 'user')
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="name"
                                    placeholder="name@example.com" value="{{ $profile->user->name }}">
                                <label for="floatingInput" class="lh-sm">Name</label>
                            </div>
                        @endif
                    @endauth
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="age"
                            placeholder="name@example.com" value="{{ $profile->age }}">
                        <label for="floatingInput" class="lh-sm">Umur</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Jalan Banjarmasin No. 1" id="floatingTextarea2" name="address"
                            style="height: 100px">{{ $profile->address }}</textarea>
                        <label for="floatingTextarea2" class="lh-sm">Alamat</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
