@extends('layouts.master')

@section('title')
    Tampil Genre
@endsection
@section('content')
    @auth
        @if (auth()->user()->role === 'admin')
            <a href="/genres/create" class="btn btn-lg btn-primary">Tambah Data Genre</a>
        @endif
    @endauth

    <h1 class="mt-5 mb-2">Daftar Genre</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Genre</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $genre)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <form action="/genres/{{ $genre->id }}" method="post" class="d-inline"
                            onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                            @method('delete')
                            @csrf
                            <a href="/genres/{{ $genre->id }}" class="btn btn-info">Detail</a>
                            @auth()
                                @if (auth()->user()->role === 'admin')
                                <a href="/genres/{{ $genre->id }}/edit" class="btn btn-warning">Edit</a>

                                <button type="submit" class="btn btn-danger">Delete</button>
                                @endif
                            @endauth
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data genre</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
