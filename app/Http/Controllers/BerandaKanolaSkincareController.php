<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaKanolaSkincareController extends Controller
{
    public function index()
    {
        return view('frontend.v_beranda.beranda');
    }

    public function about()
    {
        return view('frontend.v_about.about');
    }

    public function products()
    {
        $products = Product::with('category')
            ->where('status', 'active')
            ->get();

        return view('frontend.v_products.products', compact('products'));
    }

    public function ingredients()
    {
        return view('frontend.v_ingredients.ingredients');
    }

    public function results()
    {
        return view('frontend.v_results.results');
    }

    public function blog()
    {
        return view('frontend.v_blog.blog');
    }

    public function contact()
    {
        return view('frontend.v_contact.contact');
    }

    public function search()
    {
        return view('frontend.v_search.search'); 
    }

    public function cart()
    {
        return view('frontend.v_cart.cart'); 
    }

    public function checkout()
    {
        return view('frontend.v_checkout.checkout');
    }

    public function showLogin()
    {
        return view('frontend.v_login.login');
    }

    public function showSignup()
    {
        return view('frontend.v_signup.signup');
    }

    public function processCheckout(Request $request) 
    {
        $request->validate([
            'customer_name' => 'required',
            'payment_method' => 'required',
            'shipping_method' => 'required',
            'total' => 'required',
        ]);

        $productsData = is_string($request->products) ? json_decode($request->products, true) : $request->products;

        try {
            DB::transaction(function () use ($request, $productsData) {
                if (!is_array($productsData)) {
                    throw new \Exception('Struktur data keranjang belanja Anda tidak valid.');
                }

                foreach ($productsData as $item) {
                    if (isset($item['name']) && isset($item['qty'])) {
                        $product = Product::where('name', $item['name'])
                            ->lockForUpdate()
                            ->first();
                        
                        if (!$product) {
                            throw new \Exception('Produk ' . $item['name'] . ' tidak ditemukan di sistem.');
                        }

                        if ($product->stock < (int)$item['qty']) {
                            throw new \Exception('Maaf, stok untuk produk ' . $product->name . ' tidak mencukupi.');
                        }

                        $product->decrement('stock', (int)$item['qty']);
                    }
                }

                Order::create([
                    'customer_name' => $request->customer_name,
                    'payment_method' => $request->payment_method,
                    'shipping_method' => $request->shipping_method,
                    'total_price' => $request->total,
                    'status' => 'pending',
                    'products' => $productsData
                ]);
            });

            return response()->json([
                'success' => true
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        }
    }
}