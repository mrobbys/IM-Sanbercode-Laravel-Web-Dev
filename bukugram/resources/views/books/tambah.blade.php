@extends('layouts.master')

@section('headTitle', 'Tambah Data Buku')

@section('content')
    <div class="container pb-5 my-5">
        <a href="/books" class="btn btn-primary rounded">Kembali</a>
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">

                {{-- Pemanggilan Section Title --}}
                @include('partials.sectionTitle', ['sectionTitle' => 'Tambah Buku'])

                <form action="/books" method="POST" enctype="multipart/form-data">
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
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            name="genre_id">
                            <option selected>---Pilih Genre---</option>
                            @forelse ($genres as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty
                                <option value="">Genre Kosong</option>
                            @endforelse
                        </select>
                        <label for="floatingSelect" class="lh-sm">Genre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="title"
                            placeholder="name@example.com">
                        <label for="floatingInput" class="lh-sm">Judul Buku</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="author"
                            placeholder="name@example.com">
                        <label for="floatingInput" class="lh-sm">Nama Penulis</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Deskripsi Buku..." id="floatingTextarea2" name="description"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2" class="lh-sm">Deskripsi Buku</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="published_date" pattern="\d{4}"
                            title="Masukkan tahun yang valid (4 digit)" placeholder="YYYY" required>
                        <label for="floatingInput" class="lh-sm">Tahun Terbit</label>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile02">Gambar Buku</label>
                        <input type="file" class="form-control" id="inputGroupFile02" name="image">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
