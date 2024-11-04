<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('addproduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|unique:products|max:255',
            'product_name' => 'required|max:255',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:0|max:100',
            'stock_status' => 'required|in:in_stock,out_of_stock',
        ]);

        // Store the uploaded image
        $imagePath = $request->file('product_image')->store('product_images', 'public');

        // Create a new product record
        Product::create([
            'invoice_number' => $request->invoice_number,
            'product_name' => $request->product_name,
            'product_image' => $imagePath,
            'product_price' => $request->product_price,
            'discount' => $request->discount,
            'stock_status' => $request->stock_status,
        ]);

        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }
    public function index()
{
    $products = Product::all(); // Retrieve all products from the database
    return view('addproduct', compact('products')); // Adjust the view name if needed
}
public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'invoice_number' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:0|max:100',
            'stock_status' => 'required|string',
        ]);

        $product = Product::findOrFail($id);
        $product->invoice_number = $request->invoice_number;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->discount = $request->discount;
        $product->stock_status = $request->stock_status;

        // Handle image upload if a new image is provided
        if ($request->hasFile('product_image')) {
            // Delete the old image if it exists
            if ($products->product_image) {
                Storage::delete($product->product_image);
                \Log::info('Deleted old image: ' . $product->product_image);
            }
            // Store the new image
            $product->product_image = $request->file('product_image')->store('product_image');
            \Log::info('New image stored: ' . $product->product_image);
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }
}
