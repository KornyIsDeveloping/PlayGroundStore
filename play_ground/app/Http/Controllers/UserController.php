<?php

namespace App\Http\Controllers;

use App\Events\StatsUpdated;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

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
