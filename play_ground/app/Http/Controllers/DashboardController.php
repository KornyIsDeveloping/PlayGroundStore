<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function showDashboard()
    {
        $initialStats = [
            'totalUsers' => User::count(),
            'totalProducts' => Product::count(),
            'recentProducts' => Product::latest()->first()->name ?? 'No games added',
            'totalComments' => Comment::count(),
        ];

        return view('home', compact('initialStats'));
    }
}
