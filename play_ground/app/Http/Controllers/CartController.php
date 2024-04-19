<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Assuming you have a User model and each user has a cart
        $userId = Auth::user()->id;

        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            // If the item already exists in the cart, update the quantity
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // If the item is not in the cart, create a new cart item
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        // Redirect back or to the cart page
        return redirect()->back()->with('success', 'Product added to cart successfully');
    }
}
