<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Tag;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $product = Product::all();
            $i = 0;
            // return dd($product);
            return view('backend.product.product', compact('product', 'i'));
        } else {
            return redirect('index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $tag = Tag::all();
            $category = ProductCategory::all();
            return view('backend.product.product_create', compact('tag', 'category'));
        } else {
            return redirect('index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        if (!Auth::check() && Auth::user()->role == 1) {
            return redirect('index');
        }

        // validate product name
        $request->validate([
            'name' => 'required|unique:products'
        ]);

        $slugs = $this->convert_vi_to_en($request->get('name'));

        if ($request->hasfile('filename')) {
            foreach ($request->file('filename') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/', $name);
                $data[] = $name;
            }

            $form = new Product();
            $form->image = json_encode($data);
            $form->name = $request->get('name');
            $form->category_id = $request->get('category');
            $form->tag_id = $request->get('tag');
            $form->quantity = $request->get('quantity');
            $form->size = $request->get('size');
            $form->color =  $request->get('color');
            $form->price = $request->get('price');
            $form->promotion = $request->get('promotion');
            $form->description = $request->get('description');
            $form->detail = $request->get('detail');
            $form->slug = $slugs;
            $form->save();

            //store product_code
            $get = Product::latest('id')->first();
            $slug = $get->slug;

            return redirect()->route('manage-product.show', $slug)->with('success', 'Th??m s???n ph???m th??nh c??ng!');
        }
        return back()->with('error', 'S???n ph???m c???n c?? ??t nh???t m???t ???nh m?? t??? ho???c m???i ???nh dung l?????ng kh??ng qu?? 2MB ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (!Auth::check() && Auth::user()->role == 0) {
            return redirect('index');
        }

        $product = Product::where('slug', 'like', "$slug%")->first();
        $image = json_decode($product->image);
        return view('backend.product.product_detail', compact('product', 'image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $category= Category::all();
            $tag = Tag::all();
            $product = Product::where('id', $id)->first();
            $image = json_decode($product->image);
            return view('backend..product.product_edit', compact('product', 'image', 'category', 'tag'));
        } else {
            return redirect('index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!(Auth::check() && Auth::user()->role == 0)) {
            return redirect('index');
        }

        $product = Product::find($id);
        $slugs = ProductController::convert_vi_to_en($request->get('name'));

        if ($request->hasfile('filename')) {
            foreach ($request->file('filename') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/', $name);
                $data[] = $name;
            }
            $product->image = json_encode($data);
        }

        $product->name = $request->get('name');
        $product->category_id = $request->get('category');
        $product->tag_id = $request->get('tag');
        $product->quantity = $request->get('quantity');
        $product->size = $request->get('size');
        $product->color =  $request->get('color');
        $product->price = $request->get('price');
        $product->promotion = $request->get('promotion');
        $product->description = $request->get('description');
        $product->detail = $request->get('detail');
        $product->slug = $slugs;
        $product->save();

        return redirect()->route('manage-product.index')->with('success', 'S???a th??ng tin s???n ph???m th??nh c??ng!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('manage-product')->with('success', 'X??a s???n ph???m th??nh c??ng!');
    }

    function convert_vi_to_en($str)
    {
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'a', $str);
        $str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'e', $str);
        $str = preg_replace("/(??|??|???|???|??)/", 'i', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'o', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'u', $str);
        $str = preg_replace("/(???|??|???|???|???)/", 'y', $str);
        $str = preg_replace("/(??)/", 'd', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'A', $str);
        $str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'E', $str);
        $str = preg_replace("/(??|??|???|???|??)/", 'I', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'O', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'U', $str);
        $str = preg_replace("/(???|??|???|???|???)/", 'Y', $str);
        $str = preg_replace("/(??)/", 'D', $str);
        $str = preg_replace('/[^A-Za-z0-9 ]/', '', $str);
        $str = preg_split('/\s+/', $str);
        $str = implode('-', $str);
        return $str;
    }
}
