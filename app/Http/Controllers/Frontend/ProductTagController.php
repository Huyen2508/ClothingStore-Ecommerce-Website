<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public function index($id){
        $posts = Post::all();
        $categories = Category::all();
        $name1 = Tag::where('id', '=', $id)->first();
        $name= $name1->name;
        $address= Address::all();
        $count = 1;
        $product = Product::where('tag_id', '=', $id)->get();
        return view('frontend.productByTag.product', compact('name','product', 'posts','categories','count', 'address'));
    }
}
