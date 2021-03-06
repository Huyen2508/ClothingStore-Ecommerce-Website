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
            return back()->with('success', 'Th??m m???i b??i vi???t th??nh c??ng!');
        } else {
            return back()->with('error', 'B??i vi???t c???n c?? ???nh ?????i di???n');
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

        return redirect()->route('manage-post.index')->with('success', 'S???a th??ng tin b??i vi???t th??nh c??ng!');
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
        return redirect('manage-post')->with('success', 'X??a b??i vi???t th??nh c??ng!');
    }

    //create slug
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
