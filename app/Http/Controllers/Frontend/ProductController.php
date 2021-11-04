<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($slug) {
        if (!Auth::check()) {
            session_start();
        }
        $categories = Category::take(5)->get();
        $product = Product::where('slug', '=', $slug)->first();
        $sameCate = Product::where('category_id', '=', $product->category_id)->get();
        $posts = Post::all();
        $count = 1;
        $address= Address::all();
        return view('frontend.product.product-detail', compact('address','product', 'categories', 'count', 'posts', 'sameCate'));
    }
}
