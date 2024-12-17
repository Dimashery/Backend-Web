<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\NewProductController;

// GET all new products
Route::get('/new_products', [NewProductController::class, 'index']);

// POST create a new product
Route::post('/new_products', [NewProductController::class, 'store']);

// GET a specific product by ID
Route::get('/new_products/{id}', [NewProductController::class, 'show']);

// PUT update an existing product
Route::put('/new_products/{id}', [NewProductController::class, 'update']);

// DELETE a product by ID
Route::delete('/new_products/{id}', [NewProductController::class, 'destroy']);


Route::get('/products', [ProductController::class, 'index']); // GET untuk mengambil semua produk
Route::post('/products', [ProductController::class, 'store']); // POST untuk menambah produk baru
Route::get('/products/{id}', [ProductController::class, 'show']); // GET untuk mengambil produk berdasarkan ID
Route::put('/products/{id}', [ProductController::class, 'update']); // PUT untuk memperbarui produk
Route::delete('/products/{id}', [ProductController::class, 'destroy']); // DELETE untuk menghapus produk


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
