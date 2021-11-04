@extends('layouts.frontend.app')
@section('content')
<h3 style="text-align: center">Danh mục bài viết</h3>
<div class="col-md-12 col-12">
    <div class="post-news py-4">
        @foreach($posts as $post)
        <div class="row">
            <div class="col-3 img-news" >
                <img src="{{ asset('images/'.$post->image) }}" alt="" class="img-fluid">
            </div>
            <div class="col-9 text-news">
            <div class="title-post">{{$post->title}}</div>
                <div class="author-post row py-2 col">
                    <div class="pr-3"><i class="fas fa-user pr-1" aria-hidden="true"></i>Mr Hà</div>
                    <div>{{$post->created_at}}</div>
                </div>
                <div class="content-post">
                <p>{{$post->description}}</p>
                <a href="{{route('detail-post', $post->slug)}}"> <p1>[Đọc tiếp...]<p1></p1></a>   
                </div>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
</div>

<!-- logo -->
@endsection