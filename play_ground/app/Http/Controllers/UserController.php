<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

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
//    public function store(Request $request)
//    {
//        $user = User::create($request->all());
//
//        $stats = [
//            'totalUsers' => User::count(),
//            'totalProducts' => Product::count(),
//            'recentProducts' => Product::where('created_at', '>=', now()->subDays(30))->count(),
//            'totalComments' => Comment::count(),
//        ];
//
//        event(new StatsUpdated($stats));
//
//        return response()->json($user);
//    }
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'role' => 'required|string',
            'password' => 'required|min:6',
        ]);

//        $user = new User($request->all());
//        $user->password = bcrypt($request->password);
//        $user->save();
//
//        return redirect()->route('admin.users.index');
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
        } else {
            return back()->withErrors('Failed to create the user.');
        }
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required|string',
            'role' => 'required|string',
        ]);

        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function toggleStatus(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();
        return redirect()->route('admin.users.index');
    }

}
