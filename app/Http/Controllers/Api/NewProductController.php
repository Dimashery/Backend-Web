<?php
namespace App\Http\Controllers\Api;

use App\Models\NewProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController; // Import Controller

class NewProductController extends BaseController
{
    // GET all products
    public function index()
    {
        return response()->json(NewProduct::all());
    }

    // POST create a new product
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string',
            'image' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
        ]);

        // Membuat produk baru
        $newProduct = NewProduct::create($validated);

        // Mengembalikan respons dengan data produk
        return response()->json(['message' => 'New product created successfully', 'data' => $newProduct]);
    }

    // GET a specific product by ID
    public function show($id)
    {
        $product = NewProduct::find($id);
        return response()->json($product);
    }

    // PUT update an existing product
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'string',
            'image' => 'string',
            'description' => 'string',
            'price' => 'string',
        ]);

        // Mencari produk berdasarkan ID
        $product = NewProduct::findOrFail($id);

        // Update produk
        $product->update($validated);

        // Mengembalikan respons dengan data produk yang sudah diperbarui
        return response()->json(['message' => 'Product updated successfully', 'data' => $product]);
    }

    // DELETE a product by ID
    public function destroy($id)
    {
        $product = NewProduct::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
