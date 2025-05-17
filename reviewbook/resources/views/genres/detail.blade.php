@extends('layouts.master')

@section('title')
    Detail Genre
@endsection

@section('content')
    <h1 class="text-primary">{{ $genre->name }}</h1>
    <hr>
    <p>{{ $genre->description }}</p>

    <hr>

    <div class="row">
        <h1 class="text-info">Postingan Yang Tersedia</h1>
        
        @forelse ($genre->posts as $item)
            <div class="col-md-4 my-3">
                <div class="card" style="height: 100%">
                    <img class="card-img-top" height="65%" src="{{ asset('image/' . $item->image) }}" alt="Card image cap">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ Str::limit($item->content, 50) }}</p>
                        <a href="/posts/{{ $item->id }}" class="btn btn-primary">Detail</a>
                    </div>

                </div>
            </div>

        @empty
        <h1>Positngan TIdak Ada</h1>
        @endforelse
    </div>

    <a href="/genres" class="btn btn-secondary mt-5">Kembali</a>
@endsection()
