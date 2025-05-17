<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Genres;

class DashboardController extends Controller
{
    public function home(Request $request)
    {
        // Ambil data genre limit 3
        $genres = Genres::limit(3)->get();
        // Ambil 3 buku terbaru
        $latest_books = Books::latest()->take(3)->get();

        return view('page.home', ['genres' => $genres, 'latest_books' => $latest_books]);
    }
}
