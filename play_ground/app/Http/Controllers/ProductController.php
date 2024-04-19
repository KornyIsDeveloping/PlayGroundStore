<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    /**
     * @param Product $product
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Product $product): Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Application
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

        if ($validated->fails()) {
            dd($validated->errors()->first());
        }

        (new Product)->create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'currency' => $request->get('currency'),
            'stock' => $request->get('stock'),
        ]);

        return redirect('/products');
    }

    /**
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function search(Request $request)
    {
        $search = $request->input('search_query');

        //search query
        $searchResults = Product::where('name', 'like', "%{$search}%")->get();

        //return the search results
        return view('search-results', compact('searchResults'));
    }

    /**
     * @param Product $product
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Product $product): Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Application
    {
        //edit only if you're logged in
        if(Auth::guest()) {
            return redirect('/login');
        }

        return view('products.edit', ['product'=>$product]);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(Request $request, Product $product): RedirectResponse
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = file_get_contents($image);
            $base64 = base64_encode($imageData);
            $product->image = $base64;
        }

        $product->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'currency' => $request->get('currency'),
            'stock' => $request->get('stock'),
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product): Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $product->delete();
        return redirect('/products');
    }


}
