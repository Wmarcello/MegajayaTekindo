<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

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
        $allProducts = Product::get()->filter(function($p) use ($brand) {
            return \Illuminate\Support\Str::slug(trim($p->brand)) === trim($brand);
        })->values();

        if ($allProducts->count() == 0) {
            // Debug info jika tidak ada produk ditemukan
            return response()->view('produk.brand', [
                'products' => collect([]),
                'brandDisplay' => ucfirst(str_replace('-', ' ', $brand)),
                'categories' => Category::active()->ordered()->with(['products' => function($q) {
                    $q->active()->ordered();
                }])->get(),
                'errorMsg' => 'Tidak ada produk ditemukan untuk brand: ' . $brand . '. Data brand di database: ' . Product::pluck('brand')->join(', ')
            ]);
        }

        $page = request('page', 1);
        $perPage = 12;
        $products = new \Illuminate\Pagination\LengthAwarePaginator(
            $allProducts->forPage($page, $perPage),
            $allProducts->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

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

        // Ebara Product
        if ($brand === 'ebara' && $type === 'fsa-series') {
            return view('produk.type-detail-ebara-fsa', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'ebara' && $type === 'gs-series') {
            return view('produk.type-detail-ebara-gs', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'ebara'&& $type === 'cdx-series') {
             return view('produk.type-detail-ebara-cdx', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'ebara' && $type === 'Dvs-Ds-Dl-Df') {
            return view('produk.type-detail-ebara-dseries', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'ebara' && $type === 'sqpb-series') {
            return view('produk.type-detail-ebara-sqpb', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'ebara' && $type === '2cdx-series') {
            return view('produk.type-detail-ebara-2cdx', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'ebara' && $type === 'evms(L)(G)-series') {
            return view('produk.type-detail-ebara-evms', compact('product', 'brand', 'type', 'categories'));
        }
        // Ebara akhir product

        // Fu-tsu (Bowler)
        elseif ($brand === 'futsu' && $type === 'ts-series') {
            return view('produk.type-detail-fu-tsu-ts', compact('product', 'brand', 'type', 'categories'));
        }
        // Fu-tsu akhir product

        //  Grundfos Product
        elseif($brand === 'grundfos' && $type === 'sp-series') {
            return view('produk.type-detail-grundfos-sp', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'grundfos' && $type === 'cr-crn-series') {
            return view('produk.type-detail-grundfos-cr', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'grundfos' && $type === 'cm-cme-series') {
            return view('produk.type-detail-grundfos-cm', compact('product', 'brand', 'type', 'categories'));
        }
        // Grundfos akhir product

        // Torishima Product
        elseif ($brand === 'torishima' && $type === 'cen-series') {
            return view('produk.type-detail-torishima-cen', compact('product', 'brand', 'type', 'categories'));

            // Electric Motor
        } elseif ($brand === 'titan' && $type === 'electric-motor') {
            return view('produk.type-detail-titan-electric', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'siemens' && $type === '1LEO') {
            return view('produk.type-detail-siemens-electric', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'teco' && $type === 'AESV1S') {
            return view('produk.type-detail-teco-electric', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'motology' && $type === '3-phase') {
            return view('produk.type-detail-motology-electric-3phase', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'motology' && $type === '1-phase') {
            return view('produk.type-detail-motology-electric-1phase', compact('product', 'brand', 'type', 'categories'));

            // Diesel Motor
        } elseif ($brand === 'isuzu' && $type === '4JB1T') {
            return view('produk.type-detail-isuzu-diesel', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'fawde' && $type === '4DX23') {
            return view('produk.type-detail-fawde-diesel', compact('product', 'brand', 'type', 'categories'));

            // Tival Product
        } elseif ($brand === 'tival' && $type === 'FF-4') {
            return view('produk.type-detail-tival-ff4', compact('product', 'brand', 'type', 'categories'));
        } elseif ($brand === 'ebara' && $type === 'impeller Ebara') {
            return view('produk.type-detail-impeller-ebara', compact('product', 'brand', 'type', 'categories'));
            // Koshin Product
        } elseif ($brand === 'ebara' && $type === 'seal-kit Ebara') {
            return view('produk.type-detail-seal-kit-ebara', compact('product', 'brand', 'type', 'categories'));
        }
        
        else {
            // Default (misal: koshin)
            return view('produk.type-detail', compact('product', 'brand', 'type', 'categories'));
        }
    }
}