@extends('layouts.master')

@section('headTitle')

@section('content')
    <section id="hero" class="py-5 my-5">
        <div class="container">
            <div class="row text-center align-items-center justify-content-between">
                <div class="col-lg-6 text-center text-lg-start pe-lg-5">
                    <h1 class="heading text-dark mb-3 fw-bold" data-aos="fade-up" data-aos-delay="300">Buku Adalah Jendela
                        Dunia.</h1>
                    <p class="text-dark mb-3" data-aos="fade-up" data-aos-delay="200">Temukan koleksi buku terbaik untuk
                        menemani hari-harimu. Jelajahi, baca, dan tambah koleksi bacaanmu dengan mudah.</p>
                    <div class="align-items-center mb-5" data-aos="fade-up" data-aos-delay="400">
                        <a href="/books" class="btn btn-outline-dark rounded">Lihat Buku</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="350">
                    <div class="img-wrap">
                        <img src="{{ asset('image/hero.jpg') }}" alt="image" class="mx-auto img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="client-holder" class="py-5" data-aos="fade-up">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="logo-wrap">
                        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 justify-content-center">
                            <!-- Client 1 -->
                            <div class="col d-flex justify-content-center">
                                <a href="#" class="d-block p-2">
                                    <img src="{{ asset('template/images/client-image1.png') }}" alt="client"
                                        class="img-fluid client-logo">
                                </a>
                            </div>

                            <!-- Client 2 -->
                            <div class="col d-flex justify-content-center">
                                <a href="#" class="d-block p-2">
                                    <img src="{{ asset('template/images/client-image2.png') }}" alt="client"
                                        class="img-fluid client-logo">
                                </a>
                            </div>

                            <!-- Client 3 -->
                            <div class="col d-flex justify-content-center">
                                <a href="#" class="d-block p-2">
                                    <img src="{{ asset('template/images/client-image3.png') }}" alt="client"
                                        class="img-fluid client-logo">
                                </a>
                            </div>

                            <!-- Client 4 -->
                            <div class="col d-flex justify-content-center">
                                <a href="#" class="d-block p-2">
                                    <img src="{{ asset('template/images/client-image4.png') }}" alt="client"
                                        class="img-fluid client-logo">
                                </a>
                            </div>

                            <!-- Client 5 -->
                            <div class="col d-flex justify-content-center">
                                <a href="#" class="d-block p-2">
                                    <img src="{{ asset('template/images/client-image5.png') }}" alt="client"
                                        class="img-fluid client-logo">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Buku Terbaru -->
    <section id="new-book" class="py-5 my-5">
        <div class="container">
            <div class="row" data-aos="fade-up">
                @include('partials.sectionTitle', ['sectionTitle' => 'Buku Terbaru'])
                @forelse ($latest_books as $item)
                    @include('partials.booksProductItem', ['item' => $item])
                @empty
                    <h1>Buku Tidak Tersedia</h1>
                @endforelse
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-12 text-center">
                    <a href="/books" class="btn btn-lg btn-primary rounded shadow-lg">Lihat Semua Buku</a>
                </div>
            </div>
        </div>
    </section>

    <section id="data-genre" class="py-5 my-5">
        <div class="container">
            <div class="row" data-aos="fade-up">
                @include('partials.sectionTitle', ['sectionTitle' => 'Daftar Genre'])
                @forelse ($genres as $genre)
                    @include('partials.genreCardItem', ['genre' => $genre])
                @empty
                    <h1>Genre Tidak Ditemukan</h1>
                @endforelse
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-12 text-center">
                    <a href="/genres" class="btn btn-lg btn-primary rounded shadow-lg">Lihat Semua Genre</a>
                </div>
            </div>
        </div>
    </section>

    <section id="subscribe">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="row">

                        <div class="col-lg-6">

                            <div class="title-element" data-aos="fade-up" data-aos-delay="350">
                                <h2 class="section-title divider">Subscribe to our newsletter</h2>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="subscribe-content" data-aos="fade-up">
                                <p>Bergabunglah dengan newsletter kami untuk update eksklusif dan penawaran menarik langsung
                                    ke inbox Anda.</p>
                                <form id="form" action="mailto:mhmmdrobby48@gmail.com" method="post"
                                    enctype="text/plain">
                                    <input type="text" name="email" placeholder="Masukkan email anda disini">
                                    <button class="btn-subscribe">
                                        <span>send</span>
                                        <i class="icon icon-send"></i>
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
