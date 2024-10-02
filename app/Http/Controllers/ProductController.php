<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Ürün bulunamadı'], 404);
        }

        return response()->json($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price
        ]);
        $product->categories()->attach($request->category_id);
        return response()->json($product, 201);
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Ürün bulunamadı'], 404);
        }

        $name = $request->input('name');
        $product->name = $name;
        $product->slug = Str::slug($name);
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        $product->save();

        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Ürün bulunamadı'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Ürün başarıyla silindi.']);
    }
}
