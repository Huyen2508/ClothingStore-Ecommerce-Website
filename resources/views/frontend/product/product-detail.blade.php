@extends('layouts.frontend.app')
@section('content')
<div class="product-details-info row">
    <div class="col-5">
        <img src="{{ asset('images/'.json_decode($product->image)[0]) }}" alt="" class="img-fluid">
    </div>
    <div class="col-7">
        <p><b>{{$product->name}}</b></p>
        
        <div class="price-products">
            @if ($product->promotion != null)
            <div class="origin-products-price">
                <h5><b>{{number_format($product->promotion*1000, 0, ',', '.' )}}đ</b></h5>
            </div>
            <div class="abondon-products-price pt-1">
                {{number_format($product->price*1000, 0, ',', '.' )}}đ
            </div>
            @else
            <div class="origin-products-price">
                <h5><b>{{number_format($product->price*1000, 0, ',', '.' )}}đ</b></h5>
            </div>
            @endif
            
        </div>
        <p class="small-text-product">
            <b>Mô tả:</b>
        </p>
        <p class="small-text-product">
            {{$product->description}}
        </p>
        <hr>
        
        <form action="">
            <div class="row pt-4">
                <div class="col-3"><b>Màu sắc:</b></div>
                <div class="col-9 pl-0">
                    <div class="radio-toolbar">
                        @foreach (explode(',',$product->color) as $color)
                        <input type="radio" id="{{$color}}" name="productcolor{{$product->id}}" value="{{$color}}" checked>
                        <label for="{{$color}}">{{$color}}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="row py-3">
                <div class="col-3"><b>Kích thước:</b></div>
                <div class="col-9 pl-0">
                    <div class="radio-toolbar">
                        @foreach (explode(',',$product->size) as $size)
                        <input type="radio" id="{{$size}}" name="productsize{{$product->id}}" value="{{$size}}" checked>
                        <label for="{{$size}}">{{$size}}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="px-3 py-1">
                <div class="row">
                    <div class="mr-5 pt-2">
                        <b>Số lượng :</b>
                    </div>
                    <div class="number-spinner">
                        <span class="ns-btn">
                            <a data-dir="dwn"><span class="icon-minus"></span></a>
                        </span>
                        <input type="text" class="pl-ns-value" name="productquantity" value="1" maxlength=2>
                        <span class="ns-btn">
                            <a data-dir="up"><span class="icon-plus"></span></a>
                        </span>
                    </div>
                    
                </div>
            </div>

            <div >
                <p><strong> Tag:</strong> <a href="{{route('pt', $product->categories->id )}}">{{$product->tags->name}}</a> </p> 
                <p><strong>Danh mục sản phẩm:</strong> <a href="{{route('pc', $product->categories->slug )}}">{{$product->categories->name}}</a></p> 
            </div>
            <div class="pt-4 px-0" id="row-pay"> 
                <div class="row">
                    <button type="button" class="btn-cart" id="product{{$product->id}}" onClick="cartAdd('{{$product->id}}')">
                        <i class="fas fa-cart-plus" style="margin-right: 7px;"></i>THÊM VÀO GIỎ HÀNG
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="content-pr-product">
    <div class="nav-products">
        <div class="title-category py-1 my-5" style=" overflow: auto ; white-space: nowrap;">
            <h5>Sản phẩm cùng danh mục</b></h5>
        </div>
        
        <div class="product-show row">
            @foreach($sameCate as $same)
            <div class="col-md-3 col-6 pb-4 text-center">
                <a href="{{route('detail-product', $same->slug)}}"><img src="{{ asset('images/'.json_decode($same->image)[0]) }}" alt=""></a> 
                <div class="title-product-show text-center pt-4">
                    <a href="{{route('detail-product', $same->slug)}}">{{ $same->name }}</a>
                </div>
                <div class="curent-price-product text-center">
                    <h6><b>{{number_format($same->price*1000, 0, ',', '.' )}}đ</b></h6>
                </div>
                <div class="abondon-price-product text-center">
                    {{number_format($same->promotion*1000, 0, ',', '.' )}}đ
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
<!-- logo -->
@section('js')
<script>
    var numberSpinner = (function() {
        $('.number-spinner>.ns-btn>a').click(function() {
            var btn = $(this),
            oldValue = btn.closest('.number-spinner').find('input').val().trim(),
            newVal = 0;
            
            if (btn.attr('data-dir') === 'up') {
                newVal = parseInt(oldValue) + 1;
            } else {
                if (oldValue > 1) {
                    newVal = parseInt(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            btn.closest('.number-spinner').find('input').val(newVal);
        });
        $('.number-spinner>input').keypress(function(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        });
    })();
</script>
@endsection
