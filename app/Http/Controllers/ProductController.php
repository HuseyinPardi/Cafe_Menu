<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function show(Product $product): JsonResponse
    {
        $product->load('images');
        return response()->json($product);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        $product = Product::create($validated);

        $product->categories()->attach($request->category_id);
        $product->images()->create(['image_path' => $validated['image_path']]);

        return response()->json($product, 201);
    }


    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        $existingImages = $product->images()->pluck('image_path')->toArray();
        foreach ($request->input('image_paths') as $imagePath) {
            if (!in_array($imagePath, $existingImages)) {
                $product->images()->create(['image_path' => $imagePath]);
            }
        }
        $product->fill($validated);
        $product->save();

        return response()->json($product);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json(['message' => 'Ürün başarıyla silindi.']);
    }
}
