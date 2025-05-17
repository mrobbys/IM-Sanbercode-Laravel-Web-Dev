@extends('layouts.master')
@section('title')
    Home
@endsection

@section('content')
    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('logoutSuccess'))
        <div id="logout-alert" class="alert alert-danger">
            {{ session('logoutSuccess') }}
        </div>
    @endif

    @if (session('error'))
        <div id="error-alert" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @auth()
        <h1 class="my-3">
            Selamat Datang, {{ Auth()->user()->name }}
            @if (Auth()->user()->profile && Auth()->user()->profile->age)
                ({{ Auth()->user()->profile->age }} tahun)
            @endif
        </h1>
    @endauth

    <h1>SanberBook</h1>
    <h3>Social Media Developer Santai Berkualitas</h3>
    <p>Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>

    <h3>Benefit Join di SanberBook</h3>
    <ul>
        <li>Mendapatkan motivasi dari sesama developer</li>
        <li>Sharing knowledge dari para mastah Sanber</li>
        <li>Dibuat oleh calon web developer terbaik</li>
    </ul>

    <h3>Cara Bergabung ke SanberBook</h3>
    <ol>
        <li>Mengunjungi Website ini</li>
        <li>Mendaftar di <a href="/register">Form Sign Up</a></li>
        <li>Selesai!</li>
    </ol>
@endsection

<script>
    // Mengecek apakah ada elemen dengan ID success-alert atau logout-alert
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        const logoutAlert = document.getElementById('logout-alert');

        // Jika ada notifikasi success, kita set timer untuk menghilangkannya
        if (successAlert) {
            setTimeout(function() {
                successAlert.style.display = 'none'; // Menyembunyikan elemen setelah 5 detik
            }, 5000); // 5000ms = 5 detik
        }

        // Jika ada notifikasi logoutSuccess, kita set timer untuk menghilangkannya
        if (logoutAlert) {
            setTimeout(function() {
                logoutAlert.style.display = 'none'; // Menyembunyikan elemen setelah 5 detik
            }, 5000); // 5000ms = 5 detik
        }

        // Jika ada notifikasi error, kita set timer untuk menghilangkannya
        const errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            setTimeout(function() {
                errorAlert.style.display = 'none'; // Menyembunyikan elemen setelah 5 detik
            }, 5000); // 5000ms = 5 detik
        }
    });
</script>
