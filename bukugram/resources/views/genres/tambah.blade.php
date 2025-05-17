@extends('layouts.master')

@section('headTitle', 'Tambah Data Genre')

@section('content')
    <div class="container pb-5 my-5">
        <a href="/genres" class="btn btn-primary rounded">Kembali</a>
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">

                {{-- Pemanggilan Section Title --}}
                @include('partials.sectionTitle', ['sectionTitle' => 'Tambah Genre'])

                <form action="/genres" method="POST">
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
                        <input type="text" class="form-control" id="floatingInput" name="name"
                            placeholder="name@example.com">
                        <label for="floatingInput" class="lh-sm">Nama Genre</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="description"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2" class="lh-sm">Deskripsi Genre</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
