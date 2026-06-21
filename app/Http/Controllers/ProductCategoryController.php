<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::orderBy('id', 'asc')->get();
        return view('products.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('products.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:100|unique:product_categories,category_name',
            'is_active'     => 'required|boolean',
        ]);

        ProductCategory::create([
            'category_name' => $request->category_name,
            'slug'          => Str::slug($request->category_name),
            'is_active'     => $request->is_active,
        ]);

        return redirect()->route('backend.v1.categories.index')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    public function edit(ProductCategory $category)
    {
        return view('products.categories.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        $category->update([
            'category_name' => $request->name,
            'slug' => Str::slug($request->name),
            'is_active' => $request->input('is_active')
        ]);

        return redirect()->route('backend.v1.categories.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(ProductCategory $category)
    {
        $category->delete();

        return redirect()->route('backend.v1.categories.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}