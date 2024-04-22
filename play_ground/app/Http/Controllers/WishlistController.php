<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class WishlistController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToWishlist(Request $request)
    {

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function removeProduct(Request $request)
    {
        // Get the product ID from the request
        $product_id = $request->input('product_id');

        // Find the wishlist entry and delete it
        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product_id)
            ->delete();

        return redirect()->back();  // Redirect back to the wishlist page
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $userId = auth()->id();
        $wishlists = Wishlist::where('user_id', $userId)->with('product')->get();
//        $wishlists = Wishlist::with(['product', 'user'])->get();
        return view('wishlist', compact('wishlists'));
    }
}
