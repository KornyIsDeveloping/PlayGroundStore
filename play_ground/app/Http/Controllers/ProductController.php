<?php

namespace App\Http\Controllers;

use App\Events\StatsUpdated;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function index(Request $request)
    {

        $query = Product::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('genre') && $request->genre !== 'all') {
            $query->where('genre', $request->genre);
        }

        $products = $query->get();

        return view('products.index', [
            'products' => $products,
            'selectedGenre' => $request->genre ?? 'all',
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
        $comments = $product->comments()->latest()->get(); // Assuming a one-to-many relationship is defined on the Product model

        return view('products.show', compact('product', 'comments'));
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
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', 'public');
            }

            $product = Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'currency' => $validatedData['currency'],
                'stock' => $validatedData['stock'],
                'image' => $path ? 'storage/' . $path : null,
            ]);

            // After saving the product, update and dispatch stats
            $stats = [
                'totalUsers' => User::count(),
                'totalProducts' => Product::count(),
                'recentProducts' => Product::where('created_at', '>=', now()->subDays(30))->count(),
                'totalComments' => Comment::count(),
            ];

            event(new StatsUpdated($stats));

            // Redirect with success message
            return redirect()->route('products.index')->with('success', 'Product created successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Redirect back with errors if validation fails
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
        // Validation rules including the image
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'currency' => 'required',
            'stock' => 'required|integer',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        // Update non-image fields
        $product->update($validatedData);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            $existingImagePath = 'public/' . $product->image; // Path is relative to the "storage" folder
            if (Storage::exists($existingImagePath)) {
                Storage::delete($existingImagePath);
            }

            // Store the new image and update the product record
            $path = $request->file('image')->store('images', 'public');
            $product->image = basename($path); // Only save the filename, not the full path
            $product->save(); // Save the product with the new image path
        }

        // Redirect back with success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');

    }

    public function destroy(Product $product): Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $product->delete();
        return redirect('/products');
    }
}
