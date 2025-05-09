@extends('layouts.master')

@section('title')
    Edit Genre
@endsection

@section('content')
    <a href="/genres" class="btn btn-sm btn-success mb-3">Kembali</a>

    <form action="/genres/{{ $genre->id }}" method="POST">
        @method('put')
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
            <label class="form-label">Nama Genre</label>
            <input type="text" name="name" class="form-control" value="{{ $genre->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi Genre</label>
            <textarea class="form-control" name="description" rows="3">{{ $genre->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
