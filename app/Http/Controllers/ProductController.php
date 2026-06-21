<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'categories_id'   => 'required|exists:product_categories,id',
            'batch_number'    => 'required|string',
            'manufactured_at' => 'required|date',
            'expired_at'      => 'required|date',
            'stock'           => 'required|integer',
            'price'           => 'required|numeric',
            'status'          => 'required|in:active,discontinued',
            'benefits'        => 'nullable|string',
            'ingredients'     => 'nullable|string',
            'how_to_use'      => 'nullable|string',
            'product_image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('product_image')) {
            $validated['image'] = $request->file('product_image')->store('products', 'public');
        }

        $product = Product::create($validated);
        $product->load('category');
        $this->syncRelatedSubProducts($product);

        return redirect()->route('backend.v1.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        
        return view('products.edit', compact('product', 'categories'));
    }

    public function show($id) {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'categories_id'   => 'required|exists:product_categories,id',
            'batch_number'    => 'required|string',
            'manufactured_at' => 'required|date',
            'expired_at'      => 'required|date',
            'stock'           => 'required|integer',
            'price'           => 'required|numeric',
            'status'          => 'required|in:active,discontinued',
            'benefits'        => 'nullable|string',
            'ingredients'     => 'nullable|string',
            'how_to_use'      => 'nullable|string',
            'product_image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $oldCategoryName = $product->category->category_name ?? '';
        $oldPrefix = match ($oldCategoryName) {
            'Facial Wash'  => 'FW', 'Toner' => 'TN', 'Serum' => 'SR', 'Moisturizer' => 'MS',
            'Sunscreen'    => 'SS', 'Cleanser' => 'MC', 'Mask' => 'SM', 'Lip Care' => 'LP',
            'Eye Care'     => 'EC', 'Face Mist' => 'FM', 'Treatment' => 'TM', default => 'PROD',
        };
        $oldStatusCode = $oldPrefix . '–' . $product->batch_number;

        if ($request->hasFile('product_image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('product_image')->store('products', 'public');
        }

        $product->update($validated);
        $product->load('category');

        return redirect()->route('backend.v1.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->input('id'));

        DB::transaction(function () use ($product) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->delete();
        });

        return redirect()->route('backend.v1.products.index')->with('success', 'Produk berhasil dihapus!');
    }

    private function syncRelatedSubProducts(Product $product): void
    {
        $now = now();
        $categoryName = $product->category->category_name ?? '';
        $prefix = match ($categoryName) {
            'Facial Wash'  => 'FW', 'Toner' => 'TN', 'Serum' => 'SR', 'Moisturizer' => 'MS',
            'Sunscreen'    => 'SS', 'Cleanser' => 'MC', 'Mask' => 'SM', 'Lip Care' => 'LP',
            'Eye Care'     => 'EC', 'Face Mist' => 'FM', 'Treatment' => 'TM', default => 'PROD',
        };

        $customCode = $prefix . '–' . $product->batch_number;
        $statusCode = $customCode; 

        if (!DB::table('project_statuses')->where('code', $statusCode)->exists()) {
            DB::table('project_statuses')->insert([
                'code' => $statusCode,
                'name' => ucfirst($product->status ?? 'Active'),
                'description' => $product->benefits,
                'is_active' => ($product->status ?? 'Active') === 'Active',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}