<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenresController extends Controller
{
    public function create()
    {
        return view('genres.tambah');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'min:5'],
                'description' => 'required'
            ],
            [
                'name.required' => 'Nama harus diisi',
                'name.min' => 'Nama minimal 5 karakter',
                'description.required' => 'Deskripsi harus diisi'
            ]
        );
        $now = Carbon::now();


        DB::table('genres')->insert(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'created_at' => $now,
                'updated_at' => $now
            ]
        );
        return redirect('/genres');
    }

    public function index()
    {
        $genres = DB::table('genres')->get();
        return view('genres.tampil', ['genres' => $genres]);
    }

    public function show($id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        return view('genres.detail', ['genre' => $genre]);
    }

    public function edit($id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        return view('genres.update', ['genre' => $genre]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => ['required', 'min:5'],
                'description' => 'required'
            ],
            [
                'name.required' => 'Nama harus diisi',
                'name.min' => 'Nama minimal 5 karakter',
                'description.required' => 'Deskripsi harus diisi'
            ]
        );
        $now = Carbon::now();

        DB::table('genres')->where('id', $id)->update(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'updated_at' => $now
            ]
        );
        return redirect('/genres');
    }

    public function destroy($id) {
        DB::table('genres')->where('id', $id)->delete();
        return redirect('/genres');
    }
}
