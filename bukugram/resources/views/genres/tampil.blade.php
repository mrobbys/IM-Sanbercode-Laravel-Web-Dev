@extends('layouts.master')

@section('headTitle', 'Genre')

@section('content')
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-md-12">
                @include('partials.sectionTitle', ['sectionTitle' => 'Genre'])

                @auth()
                    @if (auth()->user()->role == 'admin')
                        <div class="d-grid gap mb-5">
                            <a href="/genres/create" class="btn btn-lg btn-primary">Tambah Data Genre</a>
                        </div>
                    @endif
                @endauth



                <div class="row">
                    @forelse ($genres as $genre)
                        @include('partials.genreCardItem', ['genre' => $genre])
                    @empty
                        <h1>Genre Tidak Ditemukan</h1>
                    @endforelse
                </div>

            </div>
        </div>
    </div>

@endsection
