@extends('layouts.master')

@section('headTitle', 'Register')

@section('content')
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                {{-- Pemanggilan Section Title --}}
                @include('partials.sectionTitle', ['sectionTitle' => 'Register'])

                <form action="/register" method="POST" enctype="multipart/form-data">
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

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="name"
                            placeholder="John Doe">
                        <label for="floatingInput" class="lh-sm">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="email"
                            placeholder="name@example.com">
                        <label for="floatingInput" class="lh-sm">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput" name="password"
                            placeholder="name@example.com">
                        <label for="floatingInput" class="lh-sm">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput" name="password_confirmation"
                            placeholder="name@example.com">
                        <label for="floatingInput" class="lh-sm">Confirm Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded fw-bold shadow">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
