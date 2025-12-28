<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        return Product::all();
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required',
        ]);

        return Product::create($data);
    }

    
    public function search(Request $request)
    {
        return Product::where('title', 'like', '%' . $request->name . '%')->get();
    }

    
    public function show($id)
    {
        return Product::find($id);
    }

    
    public function update(Request $request, $id) 
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($request->all());
            return response()->json([
                'message' => 'Product updated successfully',
                'product' => $product
            ]);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }

    public function destroy($id) 
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }
}