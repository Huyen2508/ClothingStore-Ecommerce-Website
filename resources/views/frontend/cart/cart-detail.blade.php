@extends('layouts.frontend.app')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="mr-2 fas fa-cart-arrow-down" style="color: #f09819;"></i>
        <b>Giỏ hàng của quý khách</b>
        {{-- <span style="color: rgb(185, 184, 184);"><b> [1 Sản phẩm]</b></span> --}}
    </div>
    <div class="table-responsive d-lg-block d-none" style="font-size: 14px;">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center" style="background-color: #fffeee;">
                    <th colspan="2">Thông tin sản phẩm</th>
                    <th>Thuộc tính</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productInCart as $product)
                <tr class="text-center">
                    <th scope="row">
                        <img src="{{asset('images/'.json_decode($product->productInCart->image)[0])}}" style="width: 80px; height: 80px;" alt="" class="img-fluid">
                    </th>
                    <td class="text-left" width="30%"> 
                        <a href="{{ route('detail-product',$product->productInCart->slug) }}"><p>{{$product->productInCart->name}}</p></a>
                        <p></p>
                        <hr>
                        Còn lại: {{$product->productInCart->quantity}} sản phẩm
                    </td>
                    <td> 
                        Đã chọn màu: <b>{{$product->color}}</b>
                        <br>
                        Đã chọn size: <b>{{$product->size}}</b>
                    </td>
                    <td>  
                        @if ($product->productInCart->promotion != null)
                        <h6 style="color:rgb(64, 64, 206);"> {{number_format( $product->productInCart->promotion*1000, 0, ',', '.' )}}đ </h6> 
                        <span style="text-decoration:line-through; font-size: 12px;">{{number_format( $product->productInCart->promotion*1000, 0, ',', ' ' )}}đ</span>
                        @else
                        <h6 style="color:rgb(64, 64, 206);"> {{number_format( $product->productInCart->price*1000, 0, ',', '.' )}}đ </h6> 
                        @endif
                    </td>
                    <td width="10%" class="text-center">
                        {{$product->quantity}}
                    </td>
                    <td style="color: #f09819;">
                        <h6>
                            <span>
                               @if ($product->productInCart->promotion != null)
                               {{number_format( $product->productInCart->promotion*1000*$product->quantity, 0, ',', '.' )}}
                               @else
                               {{number_format( $product->productInCart->price*1000*$product->quantity, 0, ',', '.' )}}
                               @endif
                            </span>đ
                        </h6>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- moblie frontend --}}
    {{-- <div class="pt-2">
        <div class="col-12 px-0 d-lg-none d-block" id="table-mobile">
            <h4><b>Danh sách sản phẩm</b></h4>
            <div class="card py-2 px-2">
                <div>
                    Mã sản phẩm: <b></b>
                </div>
                <div class="row py-2">
                    <div class="col-2 pr-0">
                        <img src="#" class="img-fluid" alt="..." width="60px" height="60px;">
                    </div>
                    <div class="col-6 pr-0">
                        <a href="#"><p>Bộ Quần Áo Thun Nam Tay Ngắn Quần Dài SUM 41 Thời Trang Sành Điệu Nam Phong MEN QA 038</p></a>
                    </div>
                    <div class="col-4 pl-0 text-center">
                        <button type="button" onclick="openFormMobile100()" class="btn-btn-delete"><i class="mr-1 fas fa-edit"></i>Chỉnh sửa</button>
                        <div class="form-popup-mobile" id="myFormMobile100">
                            <form action="#" method="POST">
                                <input type="hidden" name="_method" value="PATCH">                                        <input type="hidden" name="_token" value="V9vk2lm7Gv482uQhxlArrQEYEOHgm6WI17rRQpNz">                                        <div class="text-center"><h2>Thay đổi thông tin đơn hàng</h2></div>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="img-fluid" style="width: 55px;" src="#" alt="Chania">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <a href="#">Bộ Quần Áo Thun Nam Tay Ngắn Quần Dài SUM 41 Thời Trang Sành Điệu Nam Phong MEN QA 038</a>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-4 text-left">
                                        <b>Số lượng:</b>
                                    </div>
                                    <div class="col text-left">
                                        <input type="number" class="form-control" name="quantity" value="1" required="" min="1" max="100">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-4 text-left">
                                        <b>Màu:</b>
                                    </div>
                                    <div class="col radio-toolbar text-left">
                                        <input type="radio" id="Trắng100Mobile" name="color" value="Trắng" checked="">
                                        <label for="Trắng100Mobile">Trắng</label>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-4 text-left">
                                        <b>Size:</b>
                                    </div>
                                    <div class="col radio-toolbar text-left">
                                        <input type="radio" id="S100Mobile" name="size" value="S" checked="">
                                        <label for="S100Mobile">S</label>
                                        <input type="radio" id=" X100Mobile" name="size" value=" X">
                                        <label for=" X100Mobile"> X</label> 
                                        <input type="radio" id=" XL100Mobile" name="size" value=" XL">
                                        <label for=" XL100Mobile"> XL</label> 
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn-confirm">Xác nhận</button>
                                    <button type="button" class="btn-cancel" onclick="closeFormMobile100()">Hủy</button>
                                </div>
                            </form>
                        </div>
                        <div class="py-2">
                            <form action="" method="post">
                                <input type="hidden" name="_token" value="V9vk2lm7Gv482uQhxlArrQEYEOHgm6WI17rRQpNz">                                        <input type="hidden" name="_method" value="DELETE">                                        <button type="submit" class="my-2 btn-btn-delete">
                                    <i class="mr-1 fas fa-trash-alt"></i> Xóa
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" id="category-title">
                        <p>Số lượng: 1</p>
                        Đã chọn màu: <b>Trắng</b>
                        <br>
                        Đã chọn size: <b>S</b>
                    </div>
                    
                    <div class="col-4 pt-3 text-right">
                        <h3 style="color:rgb(64, 64, 206);"> 45.000đ </h3> 
                        <span style="text-decoration:line-through; font-size: 12px;">59.000đ</span>
                    </div>
                </div>
            </div>
            <script>
                function openFormMobile100() {
                    document.getElementById("myFormMobile100").style.display = "block";
                }
                
                function closeFormMobile100() {
                    document.getElementById("myFormMobile100").style.display = "none";
                }
            </script>
        </div>
    </div> --}}

    <div class="px-4">
        <div class="text-right" id="warning5">
            <p>Miễn phí giao hàng trong nước cho đơn hàng từ 1,000,000 đ</p>
        </div>
        <div class="text-right py-4">
            <b>Tổng tiền: </b>
            <span style="color: #f09819; font-size: 20px;">
                <b>
                    {{number_format( $sum*1000, 0, ',', '.' )}}
                </b>
            </span>
            <b style="color: #f09819; font-size: 20px;">đ</b>
        </div>
        <div class="pb-3 text-right">
            <a href="{{ route('index') }}" class="btn-gradient16" style="width: 500x; margin-left:60px;">
                Tiếp tục mua hàng
            </a>
            <a href="{{ route('orderinfo') }}" class="btn-gradient19" style="width: 500x; margin-left:60px;">
                Tiến hành đặt hàng <i class="fas fa-angle-double-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection