@extends('layouts.master')

@section('headTitle', 'Books')

@section('content')

    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-md-12">
                @include('partials.sectionTitle', ['sectionTitle' => 'Buku'])

                @auth
                    @if (auth()->user()->role == 'admin')
                        <div class="d-grid gap mb-5">
                            <a href="/books/create" class="btn btn-lg btn-primary">Tambah Data Buku</a>
                        </div>
                    @endif
                @endauth


                <div class="row">
                    @forelse ($books as $item)
                        @include('partials.booksProductItem', ['item' => $item])
                    @empty
                        <h1>Buku Tidak Tersedia</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus Buku -->
    @foreach ($books as $item)
        <div class="modal fade" id="deleteConfirmationModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus buku "<strong>{{ $item->title }}</strong>" oleh
                        <strong>{{ $item->author }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <!-- Formulir penghapusan buku -->
                        <form action="/books/{{ $item->id }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
