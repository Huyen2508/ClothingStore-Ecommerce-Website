<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $tag = Tag::all();
            $i = 0;
            // return dd($product);
            return view('backend.tag.tag', compact('tag', 'i'));
        } else {
            return redirect('index');
        }
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->role == 0) {

            return view('backend.tag.tag_create');
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

        $request->validate([
            'name' => 'required'
        ]);

        $tag = new Tag();
        $tag->name = $request->get('name');
        $tag->save();

        return redirect()->route('manage-tag.index')->with('success', 'Thêm sản phẩm thành công!');
    }
    // return back()->with('error', 'Lỗi tạo sản phẩm, kiểm tra lại ');

    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $tag = Tag::where('id', $id)->first();
            
            return view('backend..tag.tag_edit', compact('tag'));
        } else {
            return redirect('index');
        }
    }

    public function update(Request $request, $id)
    {
        if (!(Auth::check() && Auth::user()->role == 0)) {
            return redirect('index');
        }

        $tag = Tag::find($id);
      
        $tag->name = $request->get('name');
        $tag->save();

        return redirect()->route('manage-tag.index')->with('success', 'Sửa thông tin ther tag thành công!');
    }

    public function destroy($id)
    {
        $product = Tag::find($id);
        $product->delete();
        return redirect('manage-tag')->with('success', 'Xóa sản phẩm thành công!');
    }
}
