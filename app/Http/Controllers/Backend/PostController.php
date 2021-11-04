<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $post = Post::all();
            // $categories = PostCategory::where('parent_id', '=', 0)->orderBy('order','asc')->get();
            $i = 1;
            // dd($post);
            return view('backend.post.post', compact('post', 'i'));
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
        //
        if ((Auth::check() && Auth::user()->role == 0)) {
            return view('backend.post.post_create');
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
        //
        if (!Auth::check() && Auth::user()->role == 0) {
            return redirect('index');
            exit();
        }

        // validate title post
        $rules = ([
            'title' => ['unique:posts']
        ]);
        $this->validate($request, $rules);

        $slugs = PostController::convert_vi_to_en($request->get('title'));
        if ($request->hasfile('filename')) {
            $name = $request->file('filename')->getClientOriginalName();
            $request->file('filename')->move(public_path() . '/images/', $name);
            $form = new Post([
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'content' => $request->get('content'),
                'slug' => $slugs,
                'image' => $name
            ]);
            $form->save();
            return back()->with('success', 'Thêm mới bài viết thành công!');
        } else {
            return back()->with('error', 'Bài viết cần có ảnh đại diện');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (!Auth::check() && Auth::user()->role == 0) {
            return redirect('index');
            exit();
        }
        $post = Post::where('slug', 'like', "$slug%")->first();
        return view('backend.post.post_detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('backend.post.post_edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        if (!(Auth::check() && Auth::user()->role == 0)) {
            return redirect('index');
            exit();
        }

        $slugs = PostController::convert_vi_to_en($request->get('title'));
        $post = Post::find($id);

        if ($request->hasfile('filename')) {
            $name = $request->file('filename')->getClientOriginalName();
            $request->file('filename')->move(public_path() . '/images/', $name);
            $post->image = $name;
        }

        $post->title =  $request->input('title');
        $post->description = $request->input('description');
        $post->content = $request->get('content');
        $post->slug = $slugs;
        $post->save();

        return redirect()->route('manage-post.index')->with('success', 'Sửa thông tin bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        return redirect('manage-post')->with('success', 'Xóa bài viết thành công!');
    }

    //create slug
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
