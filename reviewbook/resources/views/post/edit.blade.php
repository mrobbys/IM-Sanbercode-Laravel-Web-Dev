@extends('layouts.master')

@section('title')
    Edit Postingan
@endsection
@section('content')

    <a href="/posts" class="btn btn-sm btn-success mb-3">Kembali</a>

    <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
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
        
        <div class="mb-3">
            <label class="form-label" for="genres_id">Genre</label>
            <select name="genres_id" id="genre" class="form-control">
                <option value="">--Pilih Genre--</option>
                @forelse ($genre as $item)
                    @if ($item->id === $post->genres_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @empty
                    <option value="">Genre Kosong</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="title">Post Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="content">Post Content</label>
            <textarea class="form-control" name="content" id="content" rows="3">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
