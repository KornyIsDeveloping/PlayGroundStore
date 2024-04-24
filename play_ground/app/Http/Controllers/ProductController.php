<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        if ($name = $request->get('name')) {
            $products = Product::query()->where('name', 'like', "%{$name}%")->get();
        } else {
            $products =  Product::all();
        }

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
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'currency' => 'required',
                'stock' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $path = null;
            // If the validation is successful, handle the image file:
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', 'public');
            }

            // Now, use the $path variable to store the image path along with the other product information.
            $product = Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'currency' => $validatedData['currency'],
                'stock' => $validatedData['stock'],
                'image' => $path ? 'storage/' . $path : null,
            ]);

            // If you need to redirect after saving the product:
            return redirect()->route('products.index')->with('success', 'Product created successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }

    /**
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function search(Request $request)
    {
        $search = $request->input('search_query');

        //search query
        $searchResults = Product::query()->where('name', 'like', "%{$search}%")->get();

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
