@extends('layouts.master')

@section('title')
    Create Profile
@endsection

@section('content')

    <form action="/profile" method="POST">
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
        <div class="mb-3">
            <label class="form-label" for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="address">Address</label>
            <textarea class="form-control" name="address" id="address" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
