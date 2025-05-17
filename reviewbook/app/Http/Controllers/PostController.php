<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Genre;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // new Middleware('auth', except: ['index', 'show'])
            new Middleware(IsAdmin::class, except: ['index', 'show']),

        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return view('post.tampil', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();
        return view('post.tambah', ['genre' => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'content' => 'required',
            'genres_id' => 'required'
        ]);


        $NewImageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('image'), $NewImageName);

        $post = new Post;

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->genres_id = $request->input('genres_id');
        $post->image = $NewImageName;

        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('post.detail', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::all();
        $post = Post::find($id);

        return view('post.edit', ['post' => $post, 'genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if ($request->has('image')) {
            // hapus data lama
            File::delete('image/' . $post->image);

            $newImageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('image'), $newImageName);

            $post->image = $newImageName;
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->genres_id = $request->input('genres_id');

        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        File::delete('image/' . $post->image);
        $post->delete();
        return redirect('/posts');
    }
}
