@extends('layouts.master')

@section('title')
    Tambah Genre
@endsection
@section('content')

    <a href="/genres" class="btn btn-sm btn-success mb-3">Kembali</a>

    <form action="/genres" method="POST">
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
            <label class="form-label" for="name">Nama Genre</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Deskripsi Genre</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
