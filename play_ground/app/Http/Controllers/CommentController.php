<?php

namespace App\Http\Controllers;

use App\Events\StatsUpdated;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('products.show', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'product_id' => 'required'
        ]);

        // Create the comment
        $comment = Comment::create([
            'body' => $request->body,
            'user_id' => auth()->id(), // Ensure user is logged in
            'product_id' => $request->product_id,
        ]);

        // Update stats after adding a new comment
        $stats = [
            'totalUsers' => User::count(),
            'totalProducts' => Product::count(),
            'recentProducts' => Product::where('created_at', '>=', now()->subDays(30))->count(),
            'totalComments' => Comment::count(),
        ];

        // Dispatch the event
        event(new StatsUpdated($stats));

        // Determine the response based on the context (API vs. web)
        // For an API
        // return response()->json($comment);

        // For a web application, redirect back with a session message
        return back()->with('success', 'Comment added successfully');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully');
    }
}
