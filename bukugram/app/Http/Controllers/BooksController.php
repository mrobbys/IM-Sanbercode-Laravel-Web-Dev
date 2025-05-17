<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Genres;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return view('books.tampil', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genres::all();
        return view('books.tambah', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'genre_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'published_date' => 'required|digits:4'
        ]);

        // Ambil tahun dari input
        $year = $request->input('published_date');

        // Formatkan menjadi YYYY-01-01
        $formattedDate = $year . '-01-01';

        $NewImageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('image'), $NewImageName);

        $books = new Books;
        $books->genre_id = $request->input('genre_id');
        $books->title = $request->input('title');
        $books->author = $request->input('author');
        $books->image = $NewImageName;
        $books->description = $request->input('description');
        $books->published_date = $formattedDate;
        $books->save();

        return redirect('/books')->with('success', 'Buku Berhasil Dibuat ✅');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Books::findOrFail($id);
        return view('books.detail', ['books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genres::all();
        $books = Books::find($id);
        return view('books.edit', ['books' => $books, 'genres' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $books = Books::find($id);

        $request->validate([
            'genre_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'published_date' => 'required|digits:4'
        ]);

        if ($request->has('image')) {
            // hapus data lama
            File::delete('image/' . $books->image);
            $newImageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $newImageName);
            $books->image = $newImageName;
        }

        // Ambil tahun dari input
        $year = $request->input('published_date');

        // Formatkan menjadi YYYY-01-01
        $formattedDate = $year . '-01-01';

        $books->genre_id = $request->input('genre_id');
        $books->title = $request->input('title');
        $books->author = $request->input('author');
        $books->description = $request->input('description');
        $books->published_date = $formattedDate;
        $books->save();

        return redirect('/books')->with('success', 'Buku Berhasil Diedit ✅');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Books::find($id);
        // Hapus komentar terkait dengan buku ini
        $books->comments()->delete(); // Jika relasi sudah didefinisikan dengan benar di model

        // Hapus gambar
        File::delete('image/' . $books->image);

        // Hapus buku
        $books->delete();
        return redirect('/books')->with('success', 'Buku Berhasil Dihapus ✅');
    }
}
