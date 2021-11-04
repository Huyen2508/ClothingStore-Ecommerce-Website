@extends('layouts.frontend.app')
@section('content')
@if (!empty($order))
<div class="card">
    <div class="row py-lg-3 px-lg-3 mx-lg-3 px-2 py-2" style="border-bottom: 1px solid rgb(236, 235, 235)">
        <div class="col-3 px-lg pr-0">
            <a href="#"><i class="fas fa-angle-double-left mr-1"></i>Danh sách đơn hàng</a>
        </div>
        <div class="text-center pl-lg pl-0 col-9 col-lg-6" id="details-order">

            <p><b>Chi tiết đơn hàng {{$order->code}}</b></p>
            <p><i style="color: rgb(172, 169, 169);">Ngày đặt hàng: {{$order->created_at}}</i></p>

        </div>
        <hr>
    </div>
    <div class="row py-2 mx-3">
        <div class="col-lg-6 col-12 pt-2 " style="background-color: #fffeee; border-right: 3px solid white;">
            <p style="border-left: 3px solid #f09819; padding-left: 5px;"><b>Thông tin người nhận</b></p>
            @if (Auth::check() && Auth::user()->id == $order->user_id)
                <pre>{{$order->order_info}}</pre>
            @else
                <p style="color: red">Bạn không được phép xem thông tin người nhận và thông tin sản phẩm khi không phải người đặt hàng <br>
                nếu bạn đặt hàng mà không dùng tài khoản - hãy kiểm tra thông tin đơn hàng qua gmail</p>
            @endif  b
        </div>
        <div class="col-lg-6 col-12 pt-2" style="background-color: #fffeee; ">
            <p style="border-left: 3px solid #f09819; padding-left: 5px;"><b>Thông tin thanh toán</b></p>
            <div class="row">
                <div class="col-5 text-right" id="grey-text-infor">
                    <p>Phương thức:</p>
                </div>
                <div class="col-7 px-0">
                    <?php $method = ($order->payment_method == 0) ? "Thanh toán qua chuyển khoản" : "Thanh toán tại nhà (COD)" ?>
                    <p>{{$method}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-5 text-right" id="grey-text-infor">
                    <p>Trạng thái:</p>
                </div>
                <div class="col-7 px-0">
                    <p>
                        <span style="color: #b9232e;">
                            @if ($order->status == 0)
                                {{"Đang xử lý"}}
                            @elseif ($order->status == 1)
                                {{"Đã xác nhận"}}
                            @elseif ($order->status == 2)
                                {{"Đã giao"}}
                            @endif
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive d-lg-block d-none">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center" style="background-color: #fffeee;">
                    <th colspan="2">Thông tin sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @if (Auth::check() && Auth::user()->id == $order->user_id)
                @foreach ($orderItems as $product)
                <tr class="text-center">
                    <th scope="row"><img src="{{asset('images/'.json_decode($product->productOrder->image)[0])}}" class="img-fluid" alt="..." width="80px" height="80px;"></th>
                    <td class="text-left">
                        <a href="{{ route('detail-product',$product->productOrder->slug) }}">
                            <p>{{$product->productOrder->name}}</p>
                        </a>
                    </td>
                    <td>
                        @if ($product->productOrder->promotion != null)
                        <h5 style="color:rgb(64, 64, 206) ;"> {{number_format( $product->productOrder->promotion*1000, 0, ',', '.' )}}đ </h5>
                        <span style="text-decoration:line-through; font-size: 12px;">{{number_format( $product->productOrder->price*1000, 0, ',', '.' )}}đ</span>
                        @else
                        <h5 style="color:rgb(64, 64, 206) ;"> {{number_format( $product->productOrder->price*1000, 0, ',', '.' )}}đ </h5>
                        @endif
                    </td>
                    <td class="text-center">
                        1
                    </td>
                    <td style="color: #f09819;">
                        @if ($product->productOrder->promotion != null)
                        <h5>{{number_format( $product->productOrder->promotion*1000*$product->quantity, 0, ',', '.' )}}đ</h5>
                        @else
                        <h5>{{number_format( $product->productOrder->price*1000*$product->quantity, 0, ',', '.' )}}đ</h5>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="px-4 table-responsive">
        <table class="table">
            <tr>
                <td style="text-align:right; font-weight: bold">Tổng tiền: </td>
                <td style="text-align: center;  font-weight: bold" id="fee">{{number_format($order->total_price*1000, 0, ',', '.' )}}đ</td>
            </tr>
        </table>
    </div>
    <div class="ml-4 mb-3" id="warning4">
        <p><b>Lưu ý:</b></p>
        <p><b><i>- Phí giao hàng trong nước:</i></b> Phí giao hàng từ TP.Hà Nội đến tay khách hàng</p>
    </div>
    <div>
        <p class="text-center"><b>Điều khoản giao dịch trên sàn thương mại điện tử</b></p>
        <p class="px-4">1. Trách nhiệm: Chính sách về trách nhiệm với hàng hóa thông qua các hoạt động giao dịch của được thực hiện dựa trên các điều khoản của các website quốc tế và theo luật pháp Việt Nam:</p>
    </div>
</div>
@else
   <p>không tồn tại đơn hàng</p>
@endif
@endsection
