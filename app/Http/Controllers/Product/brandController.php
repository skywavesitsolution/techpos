<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\product\brand;
use Illuminate\Http\Request;

class brandController extends Controller
{
    public function index()
    {
        return brand::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'metadata' => ['nullable'],

        ]);

        return brand::create($request->validated());
    }

    public function show(brand $brand)
    {
        return $brand;
    }

    public function update(Request $request, brand $brand)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'metadata' => ['nullable'],
        ]);

        $brand->update($request->validated());

        return $brand;
    }

    public function destroy(brand $brand)
    {
        $brand->delete();

        return response()->json();
    }
}
