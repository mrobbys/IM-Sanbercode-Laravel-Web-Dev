@extends('layouts.master')

@section('headTitle', 'Detail Data Genre')

@section('content')
    <div class="container pb-5 my-5">
        <a href="/genres" class="btn btn-primary rounded">Kembali</a>
        @include('partials.sectionTitle', ['sectionTitle' => 'Detail Genre'])
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-primary">{{ $genres->name }}</h1>
                <p>{{ $genres->description }}</p>
            </div>
        </div>
        <div class="row my-5 py-3 border-top">
            <div class="row">
                <div class="col-md-12">@include('partials.sectionTitle', ['sectionTitle' => 'Buku Yang Tersedia'])</div>
            </div>
            <div class="row">
                @forelse ($genres->book as $item)
                    @include('partials.booksProductItem', ['item' => $item])
                @empty
                    <h1>Buku Tidak Tersedia</h1>
                @endforelse

            </div>
        </div>
    </div>
    </div>

@endsection
