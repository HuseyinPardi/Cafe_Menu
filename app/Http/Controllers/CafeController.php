<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class CafeController extends Controller
{
    public function showCategories($cafe_slug): View
    {
        $user = User::where('cafe_slug', $cafe_slug)->first();
        $categories = $user->categories()->latest()->paginate(10);
        return view('dashboard.categories.index', compact('categories', 'user'));
    }

    public function showProducts($cafe_slug, $category_slug): View
    {
        $user = User::where('cafe_slug', $cafe_slug)->first();
        $category = Category::where('slug', $category_slug)->first();
        $products = $category->products;
        return view('dashboard.products.index', compact('products', 'user', 'category'));
    }

    public function showProductDetails($cafe_slug, $category_slug, $product_slug): View
    {
        $product = Product::where('slug', $product_slug)->first();
        return view('dashboard.products.show', compact('product'));
    }
}
