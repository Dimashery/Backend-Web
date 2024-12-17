<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class ProductController extends BaseController
{
    // GET all products
    public function index()
    {
        return response()->json(Product::all()); // Mengambil semua produk
    }

    // POST create a new product
    public function store(Request $request)
    {
        // Validasi input data
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        // Membuat produk baru
        $product = Product::create($validated);

        // Mengembalikan respons dengan data produk
        return response()->json(['message' => 'Product created successfully', 'data' => $product]);
    }

    // GET a specific product by ID
    public function show($id)
    {
        // Mencari produk berdasarkan ID
        $product = Product::find($id);

        // Jika produk ditemukan, kirimkan data produk, jika tidak, kirimkan error
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    // PUT update an existing product
    public function update(Request $request, $id)
    {
        // Validasi input data
        $validated = $request->validate([
            'name' => 'string',
            'price' => 'integer',
            'description' => 'string',
            'quantity' => 'integer',
        ]);

        // Mencari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Update produk
        $product->update($validated);

        // Mengembalikan respons dengan data produk yang sudah diperbarui
        return response()->json(['message' => 'Product updated successfully', 'data' => $product]);
    }

    // DELETE a product by ID
    public function destroy($id)
    {
        // Mencari produk berdasarkan ID dan menghapusnya
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}