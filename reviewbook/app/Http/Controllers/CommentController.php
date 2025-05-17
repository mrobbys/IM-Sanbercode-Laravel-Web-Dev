<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $post_id){

        $request->validate([
            'content' => 'required',
        ]);

        $userId = Auth::id();

        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->posts_id = $post_id;
        $comment->user_id = $userId;

        $comment->save();
        return redirect('/posts/'.$post_id)->with('success', 'Berhasil Menambahkan Comment');
    }
}
