<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;


// Home route
Route::get('/', function () {
    // Get featured products for homepage
    $featuredProducts = \App\Models\Product::featured()->active()->ordered()->limit(4)->get();
    $categories = \App\Models\Category::active()
        ->ordered()
        ->with(['products' => function($q) {
            $q->active()->ordered();
        }])->get();
    
    return view('home', compact('featuredProducts', 'categories'));
})->name('home');

// Static pages
Route::get('/home', function () {
    // Get featured products for homepage
    $featuredProducts = \App\Models\Product::featured()->active()->ordered()->limit(4)->get();
    $categories = \App\Models\Category::active()
        ->ordered()
        ->with(['products' => function($q) {
            $q->active()->ordered();
        }])->get();
    
    return view('home', compact('featuredProducts', 'categories'));
})->name('home.alt');

// Public routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route detail produk jika ingin (opsional)
// Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Route brand (hanya ini yang aktif untuk /produk/{brand})
Route::get('/produk/{brand}', [ProductController::class, 'brand'])->name('produk.brand');

// Specific product routes based on your navbar - Updated to use specific methods
Route::get('/produk/ebara', [ProductController::class, 'ebara'])->name('produk.ebara');
Route::get('/produk/grundfos', [ProductController::class, 'grundfos'])->name('produk.grundfos');
Route::get('/produk/koshin', [ProductController::class, 'koshin'])->name('produk.koshin');
Route::get('/produk/torishima', [ProductController::class, 'torishima'])->name('produk.torishima');
Route::get('/produk/titan', [ProductController::class, 'titan'])->name('produk.titan');
Route::get('/produk/siemens', [ProductController::class, 'siemens'])->name('produk.siemens');
Route::get('/produk/teco', [ProductController::class, 'teco'])->name('produk.teco');
Route::get('/produk/motology', [ProductController::class, 'motology'])->name('produk.motology');
Route::get('/produk/isuzu', [ProductController::class, 'isuzu'])->name('produk.isuzu');
Route::get('/produk/fawde', [ProductController::class, 'fawde'])->name('produk.fawde');
Route::get('/produk/futsu', [ProductController::class, 'futsu'])->name('produk.futsu');
Route::get('/produk/tival', [ProductController::class, 'tival'])->name('produk.tival');
Route::get('/produk/impeller', [ProductController::class, 'impeller'])->name('produk.impeller');
Route::get('/produk/seal-kit', [ProductController::class, 'seal-kit'])->name('produk.seal-kit');


Route::get('/about', function () {
    $allProducts = \App\Models\Product::active()->ordered()->get();
    $categories = \App\Models\Category::active()
        ->ordered()
        ->with(['products' => function($q) {
            $q->active()->ordered();
        }])->get();
    return view('about', compact('allProducts', 'categories'));
})->name('about');

Route::get('/project', function () {
    $categories = \App\Models\Category::active()
        ->ordered()
        ->with(['products' => function($q) {
            $q->active()->ordered();
        }])->get();
    return view('project', compact('categories'));
})->name('project');

Route::get('/contact', function () {
    $categories = \App\Models\Category::active()
        ->ordered()
        ->with(['products' => function($q) {
            $q->active()->ordered();
        }]) ->get();
    return view('contact', compact('categories'));
})->name('contact');

// Contact send to Gmail
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Welcome page
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/produk/{brand}/{type}', [ProductController::class, 'typeDetail'])->name('produk.type.detail');