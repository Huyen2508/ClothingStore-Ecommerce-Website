@extends('layouts.frontend.app')
@section('content')
<div class="py-3">
    <h4>Kết quả tìm kiếm cho "{{$input}}": <span style="color: rgb(182, 177, 177);">{{count($result)}} kết quả</span></h4>
    <div class="nav-products">
        <div class="title-category py-1 my-5" style=" overflow: auto ; white-space: nowrap;">
        </div>
        <div class="product-show row">
            @foreach ($result as $product)
            <div class="col-md-3 col-6 pb-4 text-center">
                <a href="{{route('detail-product', $product->slug)}}">
                    <img src="{{ asset('images/'.json_decode($product->image)[0]) }}" alt="">
                </a> 
                <div class="title-product-show text-center pt-4">
                    <a href="{{route('detail-product', $product->slug)}}">{{ $product->name }}</a>
                </div>
                <div class="price-products">
                    @if ($product->promotion != null)
                    <div class="curent-price-product">
                        <h6><b>{{number_format($product->promotion*1000, 0, ',', '.' )}}đ</b></h6>
                    </div>
                    <div class="abondon-price-product">
                        {{number_format($product->price*1000, 0, ',', '.' )}}đ
                    </div>
                    @else
                    <div class="curent-price-product">
                        <h6><b>{{number_format($product->price*1000, 0, ',', '.' )}}đ</b></h6>
                    </div>
                    @endif
                </div>
                <form action="">
                    <input type="radio" name="productsize{{$product->id}}" value="{{explode(',',$product->size)[0]}}" hidden checked>
                    <input type="radio" name="productcolor{{$product->id}}" value="{{explode(',',$product->color)[0]}}" hidden checked>
                    <input type="text" name="productquantity" value="1" hidden>
                    <input type="button" value="Thêm vào giỏ hàng" class="cf-buy" onClick="cartAdd('{{$product->id}}')"/>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
