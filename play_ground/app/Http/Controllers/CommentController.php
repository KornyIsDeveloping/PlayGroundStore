<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate(['body' => 'required']);
        Comment::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
        ]);

        return back();
    }
}
