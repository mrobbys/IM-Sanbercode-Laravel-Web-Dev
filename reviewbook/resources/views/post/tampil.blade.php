@extends('layouts.master')
@section('title')
    Tampil Postingan
@endsection
@section('content')
    @auth()
        @if (auth()->user()->role === 'admin')
            <a href="/posts/create" class="btn btn-lg btn-primary my-3">Tambah</a>
        @endif
    @endauth

    <div class="row">
        @forelse ($post as $item)
            <div class="col-md-4">
                <div class="card" style="height: 100%">
                    <img class="card-img-top" height="65%" src="{{ asset('image/' . $item->image) }}" alt="Card image cap">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <span class="badge bg-secondary w-50 py-2 my-1">{{ $item->genres->name }}</span>
                        <p class="card-text">{{ Str::limit($item->content, 50) }}</p>
                        <a href="/posts/{{ $item->id }}" class="btn btn-primary">Detail</a>
                        @auth()
                            @if (auth()->user()->role === 'admin')
                                <div class="row mt-3">
                                    <div class="col-6 d-grid">
                                        <a href="/posts/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                    </div>
                                    <div class="col-6">
                                        <form action="/posts/{{ $item->id }}" method="POST" class="d-grid"
                                            onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>

                </div>
            </div>
        @empty
            <h1>Belum ada Postingan</h1>
        @endforelse
    </div>
@endsection
