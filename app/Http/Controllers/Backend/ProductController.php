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

            return redirect()->route('manage-product.show', $slug)->with('success', 'Thêm sản phẩm thành công!');
        }
        return back()->with('error', 'Sản phẩm cần có ít nhất một ảnh mô tả hoặc mỗi ảnh dung lượng không quá 2MB ');
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

        return redirect()->route('manage-product.index')->with('success', 'Sửa thông tin sản phẩm thành công!');
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
        return redirect('manage-product')->with('success', 'Xóa sản phẩm thành công!');
    }

    function convert_vi_to_en($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace('/[^A-Za-z0-9 ]/', '', $str);
        $str = preg_split('/\s+/', $str);
        $str = implode('-', $str);
        return $str;
    }
}
