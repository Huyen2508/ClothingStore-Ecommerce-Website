<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $category = ProductCategory::all();
            $i = 0;
            // return dd($product);
            return view('backend.category.category', compact('category', 'i'));
        } else {
            return redirect('index');
        }
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->role == 0) {

            return view('backend.category.category_create');
        } else {
            return redirect('index');
        }
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        if (!Auth::check() && Auth::user()->role == 1) {
            return redirect('index');
        }
        $slugs = CategoryController::convert_vi_to_en($request->get('name'));
        $request->validate([
            'name' => 'required'
        ]);

        $category = new ProductCategory();
        $category->name = $request->get('name');
        $category->slug = $slugs;
        $category->save();

        return redirect()->route('manage-category.index')->with('success', 'Thêm sản phẩm thành công!');
    }
    // return back()->with('error', 'Lỗi tạo sản phẩm, kiểm tra lại ');

    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $category = ProductCategory::where('id', $id)->first();
            
            return view('backend..category.category_edit', compact('category'));
        } else {
            return redirect('index');
        }
    }

    public function update(Request $request, $id)
    {
        if (!(Auth::check() && Auth::user()->role == 0)) {
            return redirect('index');
        }

        $category = ProductCategory::find($id);
        $slugs = CategoryController::convert_vi_to_en($request->get('name'));
        $category->name = $request->get('name');
        $category->slug = $slugs;
        $category->save();

        return redirect()->route('manage-category.index')->with('success', 'Sửa thông tin danh mục thành công!');
    }

    public function destroy($id)
    {
        $product = ProductCategory::find($id);
        $product->delete();
        return redirect('manage-category')->with('success', 'Xóa sản phẩm thành công!');
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
