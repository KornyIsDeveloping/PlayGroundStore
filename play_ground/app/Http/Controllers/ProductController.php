<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::all();

        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {

        return view('products.create');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product'=>$product]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'stock' => 'required',
        ], []);

        Product::create([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'currency' => request('currency'),
            'stock' => request('stock'),
        ]);

        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product'=>$product]);
    }

    public function update(Request $request, Product $product)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'stock' => 'required',
        ], []);

        if ($validated->fails()) {
            dd($validated->errors()->first());
        }

        $product-> update([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'currency' => request('currency'),
            'stock' => request('stock'),
        ]);

        return redirect('/products/' . $product->id);
    }

    public function destroy(Product $product): Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $product->delete();
        return redirect('/products');
    }


}
