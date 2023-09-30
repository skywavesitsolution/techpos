<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //dd(Category::where('id', '=', 2)->get());
        /*foreach ($categories as $category) {
            if ($category->parent_id !== null) {
                $c = Category::where('id', '=', $category->parent_id)->first();
                dd($c);
            }
        }*/

        //$categories = Category::query()->paginate(40);
        $categories = Category::query()->with('sub_category')->get();

        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        //$categories = Category::query()->where('parent_id', '=', null)->get();
        //$categories = Category::query()->whereNull('parent_id')->get();
        //$categories = Category::query()->parentCategories()->get();

        $categories = Category::query()
            ->whereNull('parent_id')
            ->get();

        return view('backend.categories.create', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $response = '';
        //Category::query()->create($request->all());
        $category = Category::query()->create([
            'name' => $request->validated('name'),
            'slug' => \Str::slug($request->validated('slug')),
            'metadata' => $request->validated('metadata'),
            'parent_id' => $request->validated('parent_id'),
        ]);
        if ($category->wasRecentlyCreated) {
            $response = 'Record Created';
        } else {
            $response = 'Record Not Created';
        }

        return redirect()->route('category.index')->with(['status' => $response]);
    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json();
    }

}
