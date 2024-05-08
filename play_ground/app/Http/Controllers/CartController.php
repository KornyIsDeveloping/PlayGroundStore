<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
            'productId' => 'required|exists:products,id',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validated->errors()
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

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function checkout()
    {
        $user = Auth::user();
        $carts = Cart::with('product')->where('user_id', $user->id)->get();

        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += $cart->product->price;
        }

        return view('cart.checkout', ['carts' => $carts, 'totalPrice' => $totalPrice]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function processPayment(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->product->price;
        }

        //integrate with a payment gateway
        //for now, let's just return a confirmation view

        return view('payment.confirmation', ['total' => $totalPrice]);
    }

    public function remove($productId)
    {
        $user = Auth::user();

        Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->delete();

        return back()->with('success', 'Product removed from cart.');
    }

    public function index()
    {
        $user = Auth::user();
        $cart = Cart::with('product')->where('user_id', $user->id)->get();

        return view('cart.index', ['carts' => $cart]);
    }
}
