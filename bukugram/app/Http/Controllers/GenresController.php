<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\Books;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genres::all();
        return view('genres.tampil', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'min:5'],
                'description' => 'required'
            ],
            [
                'name.required' => 'Nama Genre harus diisi',
                'name.min' => 'Nama Genre minimal 5 karakter',
                'description.required' => 'Deskripsi harus diisi'
            ]
        );

        $genres = new Genres;
        $genres->name = $request->input('name');
        $genres->description = $request->input('description');
        $genres->save();

        return redirect('/genres')->with('success', 'Genre Berhasil Dibuat ✅');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genres = Genres::find($id);
        return view('genres.detail', ['genres' => $genres]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres = Genres::find($id);
        return view('genres.edit', ['genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $genres = Genres::find($id);
        $genres->name = $request->input('name');
        $genres->description = $request->input('description');
        $genres->save();

        return redirect('/genres')->with('success', 'Berhasil Edit Genre ✅');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cek apakah genre ini masih digunakan di tabel books
        $genre = Genres::find($id);
        $bookCount = Books::where('genre_id', $id)->count(); // Menghitung berapa buku yang menggunakan genre ini

        if ($bookCount > 0) {
            // Jika ada buku yang terkait, tampilkan pesan error
            return redirect('/genres')->with('error', 'Genre ini tidak bisa dihapus karena masih ada buku yang menggunakan genre ini🙁');
        }

        // Jika tidak ada buku terkait, hapus genre
        $genre->delete();
        return redirect('/genres')->with('success', 'Berhasil Hapus Genre ✅');
    }
}
