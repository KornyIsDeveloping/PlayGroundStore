<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard() {
        $initialStats = [
            'totalUsers' => User::count(),
            'totalProducts' => Product::count(),
//            'recentProducts' => Product::where('created_at', '>=', now()->subDays(30))->count(),
            'recentProducts' => Product::latest()->first()->name ?? 'No games added',
            'totalComments' => Comment::count(),
        ];

        return view('home', compact('initialStats'));
    }
}
