<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request)
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

        //cart create
        if( Cart::query()->create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
        ])){
            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart.',
            ], 200);
        }

        //return json
        return response()->json([
            'status' => 'error',
            'message' => 'Unknown error',
        ], 401);
    }

    public function index()
    {
        $user = Auth::user();
        $cart = Cart::with('product')->where('user_id', $user->id)->get();

        return view('cart.index', ['carts' => $cart]);
    }
}
