<?php

namespace App\Http\Controllers;

use App\Events\StatsUpdated;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = User::create($request->all());

        // Assuming validation and other business logic are handled

        // Update stats after creating a new user
        $stats = [
            'totalUsers' => User::count(),
            'totalProducts' => Product::count(),
            'recentProducts' => Product::where('created_at', '>=', now()->subDays(30))->count(),
            'totalComments' => Comment::count(),
        ];

        event(new StatsUpdated($stats));

        return response()->json($user);
    }
}
