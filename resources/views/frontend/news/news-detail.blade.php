@extends('layouts.frontend.app')
@section('content')

<div class="post-new-details">
    <div class="title-post-news-detils">
        {{$detail->title}};
    </div>
    <div class="author-post row py-2 col">
        <div class="pr-3"><i class="fas fa-user pr-1" aria-hidden="true"></i>Mr Hà</div>
        <div>{{$detail->created_at}}</div>
    </div>
    <div class="text-post-detail-bold">
        <p>{{$detail->description}}</p>
    </div>
    <div>
        <p>{{$detail->content}}
        </p>
        <div class="text-center py-4">
            <img src="{{ asset('images/'.$detail->image) }}" alt="" style="height: 400px;" class="img-fluid">
        </div>
        
    </div>
</div>
<div class="text-post-detail-bold">
    
</div>
<div>
    </div>
@endsection