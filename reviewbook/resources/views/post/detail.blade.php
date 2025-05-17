@extends('layouts.master')

@section('title')
    Detail Postingan
@endsection

@section('content')
    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-grid gap-5">
        <div class="d-grid justify-content-center">
            <img src="{{ asset('image/' . $post->image) }}" alt="image" width="100%" height="600px" class="border p-2">
        </div>
        <h1 class="text-primary">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
    </div>

    <hr>
    <h1 class="mb-2">Komentar</h1>
    @forelse ($post->comments as $item)
        <div class="card mb-3">
            <div class="card-header">
                <span>{{ $item->owner->name }}</span>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $item->content }}</p>
            </div>
        </div>
    @empty
        <h1>Belum Ada Komentar</h1>
    @endforelse


    <hr>
    @auth
        <h5 class="mt-5">Beri Komentar</h5>

        <form action="/comments/{{ $post->id }}" method="POST">

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
                <textarea class="form-control border-2" name="content" id="content" rows="3"
                    placeholder="Buku ini bagus sekali"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    @endauth
@endsection
