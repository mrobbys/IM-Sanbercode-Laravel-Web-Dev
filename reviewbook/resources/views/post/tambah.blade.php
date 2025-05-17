@extends('layouts.master')

@section('title')
    Tambah Postingan
@endsection
@section('content')

    <a href="/genres" class="btn btn-sm btn-success mb-3">Kembali</a>

    <form action="/posts" method="POST" enctype="multipart/form-data">
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
            <label class="form-label" for="genres_id">Genre</label>
            <select name="genres_id" id="genre" class="form-control">
                <option value="">--Pilih Genre--</option>
                @forelse ($genre as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                    <option value="">Genre Kosong</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="title">Post Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="content">Post Content</label>
            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
