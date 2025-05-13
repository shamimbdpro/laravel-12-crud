<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $updateProduct = false;
        return view('pages.products.createOrUpdate', compact('updateProduct'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Store the product
        $product = Product::create($request->validated());
        // Redirect to the product index page with a success message
        return redirect()->route('products')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the product by ID
        $updateProduct = Product::findOrFail($id);
        // Return the edit view with the product data
        return view('pages.products.createOrUpdate', compact('updateProduct'));
    }
    /**
     * Update the specified resource in storage.

     */
    public function update(UpdateProductRequest $request, $id)
    {

        // Find the product by ID
        $product = Product::findOrFail($id);
        // Update the product with validated data
        $product->update($request->validated());
        // Redirect to the product index page with a success message
        return redirect()->route('products')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);
        // Delete the product
        $product->delete();
        // Redirect to the product index page with a success message
        return redirect()->route('products')->with('success', 'Product deleted successfully.');
    }
}
