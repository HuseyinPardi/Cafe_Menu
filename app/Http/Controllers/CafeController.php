<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class CafeController extends Controller
{
    public function showCategories()
    {
        $categories = Category::latest()->paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function showProducts($user_slug, $category_slug)
    {
        $user = User::where('cafe_slug', $user_slug)->first();
        if (!$user) {
            dd('Böyle bir kullanıcı yok!');
        }

        $category = Category::where('slug', $category_slug)->first();
        if (!$category) {
            dd('Böyle bir kategori yok!');
        }

        $products = $category->products;

        return view('dashboard.products.index', compact('products', 'user', 'category'));
    }

    public function showProductDetails($user_slug, $category_slug, $product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        if (!$product) {
            dd('Böyle bir ürün yok!');
        }
        return view('dashboard.products.show', compact('product'));
    }
}
