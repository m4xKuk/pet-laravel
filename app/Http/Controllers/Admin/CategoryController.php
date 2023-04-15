<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $title = 'Categories';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        $title = $this->title;
        return view('admin.categories.index', compact('categories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $title = $this->title;
        return view('admin.categories.create', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'string',
            'parent_id' => 'integer|exists:categories,id',
        ]);
        $category = Category::firstOrCreate($data);
        return redirect()->route('admin.categories.show', $category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $parent = Category::find($category->parent_id);
        $title = $this->title;
        return view('admin.categories.show', compact('category', 'parent', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        $title = $this->title;
        return view('admin.categories.edit', compact('category', 'categories', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'string',
            'parent_id' => 'integer|exists:categories,id',
        ]);

        $category->update($data);

        $parent = Category::find($category->parent_id);
        return view('admin.categories.show', compact('category', 'parent'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
