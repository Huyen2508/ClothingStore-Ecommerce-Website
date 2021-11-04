<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        
    }

    public function detail($id)
    {
        if (Auth::check()) {
            $posts = Post::all();
            $categories = Category::all();
            $address= Address::all();
            $user = User::findOrFail($id);
            $orders = Order::where('user_id',$user->id)->get();
            return view('frontend.user.userDetail', compact('user','categories','address','posts','orders'));
        } else {
            return route('index');
        }
    }

}
