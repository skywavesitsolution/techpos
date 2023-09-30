<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function create()
    {
        $categories = Category::query()
            ->orderByDesc('id')
            ->get();
        $currency_symbol = '$';

        return view('backend.products.create', compact('categories', 'currency_symbol'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'slug' => ['required', 'unique:products,slug'],
            'sku' => ['required'],
            'price' => ['required', 'int'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'cost' => ['required'],
            'is_gifted' => ['nullable'],
            'featured' => ['nullable'],
        ]);

        $product = Product::create($validated);
//        if ($product->wasRecentlyCreated) {
//
//        }

//        Product::create([
//            'name' => $validated['name'],
//            'slug' => $validated['slug'],
//            'sku' => $validated['sku'],
//        ]);
        //return view('backend.products.create')->with('status', 'Product created!');

        return redirect('products/create')->with('status', 'Product created!');
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'sku' => ['required'],
            'price' => ['required'],
            'category_id' => ['nullable'],
            'cost' => ['required'],
            'is_gifted' => ['required'],
            'featured' => ['required'],
        ]);

        $product->update($request->validated());

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json();
    }
}
