<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request, $book_id){

        $request->validate([
            'content' => 'required',
        ]);

        $user_id = Auth::id();

        $comment = new Comments;
        $comment->content = $request->input('content');
        $comment->book_id = $book_id;
        $comment->user_id = $user_id;

        $comment->save();
        return redirect('/books/'.$book_id)->with('success', 'Berhasil Menambahkan Comment✅');
    }
}
