<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::active()->ordered()->with(['products' => function($q) {
            $q->active()->ordered();
        }])->get();

        $search = $request->input('search');
        $searchResults = [];
        if ($search) {
            $searchResults = Product::where('name', 'like', "%{$search}%")
                ->orWhere('brand', 'like', "%{$search}%")
                ->with('category')
                ->active()
                ->ordered()
                ->get();

            // Jika semua hasil berasal dari brand yang sama, redirect ke halaman brand
            if ($searchResults->count() > 0) {
                $brands = $searchResults->pluck('brand')->unique();
                if ($brands->count() === 1) {
                    return redirect()->route('produk.brand', [
                        'brand' => Str::slug($brands->first())
                    ]);
                }
            }
        }

        return view('home', compact('categories', 'searchResults', 'search'));
    }


    public function koshin()
    {
        $brand = 'Koshin';
        $products = Product::where('brand', $brand)
            ->active()
            ->ordered()
            ->with('category')
            ->paginate(12);

        return view('produk.koshin', compact('products', 'brand'));
    }

    public function brand($brand)
    {
        $products = Product::whereRaw('LOWER(REPLACE(brand, " ", "-")) = ?', [$brand])
            ->paginate(12);

        $brandDisplay = ucfirst(str_replace('-', ' ', $brand));

        $categories = Category::active()->ordered()->with(['products' => function($q) {
            $q->active()->ordered();
        }])->get();

        return view('produk.brand', compact('products', 'brandDisplay', 'categories'));
    }

    public function show($id)
    {
        $product = \App\Models\Product::with('category')->findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function type($type)
    {
        $products = Product::where('type', $type)->get();
        return view('type.show', compact('products', 'type'));
    }

    public function typeDetail($brand, $type)
    {
        $products = Product::whereRaw('LOWER(REPLACE(brand, " ", "-")) = ?', [$brand])
            ->where('type', $type)
            ->get();

        $product = $products->first();

        $categories = Category::active()->ordered()->with(['products' => function($q) {
            $q->active()->ordered();
        }])->get();

        // Pilih view sesuai brand/type
        if ($brand === 'ebara' && $type === 'fsa-series') {
            return view('produk.type-detail-ebara-fsa', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'ebara' && $type === 'gs-series') {
            return view('produk.type-detail-ebara-gs', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'ebara'&& $type === 'cdx-series') {
             return view('produk.type-detail-ebara-cdx', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'ebara' && $type === 'Dvs-Ds-Dl-Df') {
            return view('produk.type-detail-ebara-dseries', compact('product', 'brand', 'type', 'categories'));
        }
        // Ebara akhir product
        elseif($brand === 'grundfos' && $type === 'sp-series') {
            return view('produk.type-detail-grundfos-sp', compact('product', 'brand', 'type', 'categories'));
        }
        elseif ($brand === 'torishima' && $type === 'cen-series') {
            return view('produk.type-detail-torishima-cen', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'titan' && $type === 'electric-motor') {
            return view('produk.type-detail-titan-electric', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'siemens' && $type === '1LEO') {
            return view('produk.type-detail-siemens-electric', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'teco' && $type === 'AESV1S') {
            return view('produk.type-detail-teco-electric', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'tival' && $type === 'FF-4') {
            return view('produk.type-detail-tival-ff4', compact('product', 'brand', 'type', 'categories'));
        } else {
            // Default (misal: koshin)
            return view('produk.type-detail', compact('product', 'brand', 'type', 'categories'));
        }
    }
}