@extends('layouts.master')

@section('headTitle', 'Detail Data Buku')

@section('content')
    <div class="container pb-5 my-5">
        <a href="/books" class="btn btn-primary rounded">Kembali</a>
        @include('partials.sectionTitle', ['sectionTitle' => 'Detail Buku'])
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row border shadow-lg rounded">
                    <div class="col-lg-6 my-auto">
                        <figure class="products-thumb text-center position-relative">
                            <img src="{{ asset('image/' . $books->image) }}" alt="book" class="single-image">
                            <span
                                class="badge text-bg-dark position-absolute top-0 end-0 mt-3 me-3 mt-md-4 me-md-5 me-lg-3">{{ $books->genre->name }}</span>
                        </figure>
                    </div>

                    <div class="col-lg-6">
                        <div class="product-entry">
                            <h2 class="section-title divider">{{ $books->title }}</h2>

                            <div class="products-content">
                                <div class="author-name">By {{ $books->author }}</div>
                                <p class="mt-5 pt-2 border-top">{{ $books->description }}</p>
                                <p class="mt-5 pt-2 border-top ">Terbit Pada Tahun
                                    <span
                                        class="fw-bold ">{{ \Carbon\Carbon::parse($books->published_date)->format('Y') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row py-5 my-5 border-top">
            <div class="col-md-12">
                @include('partials.sectionTitle', ['sectionTitle' => 'Komentar'])

                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                            <div class="card-body p-4">
                                <form action="/comments/{{ $books->id }}" class="border-black border-bottom"
                                    method="POST">
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

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <textarea name="content" id="addANote" cols="30" rows="3" class="form-control" placeholder="Beri Komentar"></textarea>
                                        <button type="submit" class="btn-comment">Kirim</button>
                                    </div>
                                </form>
                                @forelse ($books->comments as $item)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <p>{{ $item->content }}</p>

                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <p class="small mb-0 ms-2 fw-bold">{{ $item->owner->name }}</p>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <p class="small text-muted mb-0">{{ $item->created_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h1>Komentar Kosong</h1>
                                @endforelse


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
