<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class WishlistController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addToWishlist(Request $request)
    {

        //validare pe productId
        $validated = Validator::make($request->all(), [
                'productId' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
            ], 401);
        }

        $product_id = $request->get('productId');

        //query dupa product id
       if(! $product = Product::query()->where('id', $product_id)->first()) {
           return response()->json([
               'status' => 'error',
               'message' => 'Product not found',
           ], 401);
       }
        //accesam user id : auth()->id()

        //wishlist create
       if( Wishlist::query()->create([
           'user_id' => auth()->id(),
           'product_id' => $product->id,
       ])){
           return response()->json([
               'status' => 'success',
               'message' => 'Product added to wishlist.',
           ], 200);
       }

        //return json
        return response()->json([
            'status' => 'error',
            'message' => 'Unknown error',
        ], 401);
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
