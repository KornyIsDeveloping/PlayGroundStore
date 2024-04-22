<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {

        //validare pe productId
        //query dupa product id
        //accesam user id : auth()->id()

        //wishlist create

        //return json


        dd($request->all());
//        $user = Auth::user();
//
//        // Check if product is already in the user's wishlist
//        if (!Wishlist::query()->where('user_id', $user->id)->where('product_id', $product_id)->exists()) {
//            Wishlist::query()->create([
//                'user_id' => $user->id,
//                'product_id' => $product_id,
//            ]);
//        }
//
//        return redirect()->back(); // Redirect back to the referring page
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $user = Auth::user();
        $wishlists = Wishlist::with('product')->where('user_id', $user->id)->get();

        return view('wishlists.index', ['wishlists' => $wishlists]);
    }
}
