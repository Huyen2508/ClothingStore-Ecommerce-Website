<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Banner;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Category;
use App\Models\FooterPost;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function addCart(Request $request)
    {
        $product_id = $request->get('product');
        $product_color = $request->get('product_color');
        $product_size = $request->get('product_size');
        $product_quantity = $request->get('product_quantity');

        $product = Product::where('id',$product_id)->first();

        if (!Auth::check()) {
            $productInfo = [
                // product info
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'quantity' => $product->quantity,
                'promotion' => $product->promotion,
                'price' => $product->price,
                'image' => $product->image,
            ];

            $productCart = [
                // product info in cart
                'id' => $product->id,
                'color' => $product_color,
                'size' => $product_size,
                'quantity' => $product_quantity,
                'productInCart' => (object) $productInfo
            ];

            Session::push('products', (object) $productCart);
        } else {
            $cart = Cart::create([
                'product_id' => $product->id,
                'user_id' => Auth::user()->id,
                'size' => $product_size,
                'color' => $product_color,
                'quantity' => $product_quantity
            ]);
        }
       
        return response()->json(['success'=>'Thêm sản phẩm vào giỏ hàng thành công!']);
    }
    
    public function showProduct(Request $request)
    {
        if (Auth::check()) {
            $productInCart = Cart::where('user_id',Auth::user()->id)->get();
            
        } else {
            $getProductInCart = Session::all();
            $productInCart = $getProductInCart['products'];
        }
        
        foreach ($productInCart as $product) {
            // print_r($product->productInCart->name);
            $price = 0;
            if ($product->productInCart->promotion != null) {
                $price = number_format($product->productInCart->promotion*1000, 0, ',', '.' );
            } else {
                $price = number_format($product->productInCart->price*1000, 0, ',', '.' );
            }
            echo '<tr>
            <th scope="col">
                <img src="'.asset('images/'.json_decode($product->productInCart->image)[0]).'" style="width: 80px; height: 80px;" alt="no photo" class="img-fluid">
            </th>
            <th scope="col" class="info-card">
                '. $product->productInCart->name . '<br>
                <span style="color: #ff7f0b;">'.$price.'đ</span>
            </th>
            <th scope="col">
                <button type="button" class="my-2 btn-btn-delete" onClick="removeProduct('.$product->productInCart->id.')">
                    <i class="mr-1 fas fa-trash-alt"></i> Xóa
                </button>
            </th>
        </tr>';
        }
    }

    public function detailCart(Request $request) {
        if (!Auth::check()) {
            session_start();
            $getProductInCart = Session::all();
            $productInCart = (object) $getProductInCart['products'];
        } else {
            $productInCart = Cart::where('user_id',Auth::user()->id)->get();
        }
        $posts = Post::all();
        $categories = Category::all();
        $address= Address::all();
        $count = 1;
        $sum = 0;
        foreach($productInCart as $product) {
            if ($product->productInCart->promotion != null) {
                $sum = $sum + $product->quantity*$product->productInCart->promotion;
            } else {
                $sum = $sum + $product->quantity*$product->productInCart->price;
            }
        }
        return view('frontend.cart.cart-detail',compact('productInCart','posts','categories','count','sum','address'));
    }

    public function delete(Request $request)
    {
        $productID = $request->get('product');
        if (Auth::check()) {
            $product = Cart::where([['user_id',Auth::user()->id],
                                    ['product_id',$productID]]);
            $product->delete();
        } else {
            $getProductInCart = Session::all();
            $productInCart = $getProductInCart['products'];
            foreach ($productInCart as $product) {
                $pro = (object) $product;
                if ($productID == $pro->productInCart->id) {
                    $string = "products.".array_search($product, $productInCart);
                    $request->session()->pull($string, 'default');
                }
            }
        }
    }
}   